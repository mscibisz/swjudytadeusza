<?php

require_once __DIR__ . '/vendor/sentry/sentry/lib/Raven/Autoloader.php';
Raven_Autoloader::register();

/**
 * Class ErrorHandler
 */
class ErrorHandler
{
    private const PROD_SENTRY_ERROR_ENTRY_POINT = SENTRY_URL;

    /**
     * @var \Raven_Client
     */
    private static $client;

    private static $developClient;

    /**
     * @throws \InvalidArgumentException
     */
    public static function make(): void
    {

        try {
            self::$client = new \Raven_Client(self::PROD_SENTRY_ERROR_ENTRY_POINT, ['curl_method' => 'async']);
            self::$client->setEnvironment(WP_ENV_VERSION);
            self::$client->tags_context(
                [
                    'php_version' => PHP_VERSION,
                    'partition' => 'WP',
                    'origin' => self::getOrigin()
                ]
            );
            self::$client->install();
        } catch (\Raven_Exception $e) {
            // error handler should not fail
        }

        if ('develop' === WP_ENV_VERSION) {
            require_once __DIR__ . '/vendor/autoload.php';
            self::$developClient = (new \Whoops\Run())->pushHandler(new \Whoops\Handler\PrettyPageHandler())->register();
        }
    }

    /**
     * @param \Throwable|\Exception $exception
     */
    public static function captureException($exception): void
    {
        if ('develop' === WP_ENV_VERSION) {
            self::$developClient->handleException($exception);
        }

        self::$client->captureException($exception);
    }

    /**
     * @return string
     */
    private static function getOrigin(): string
    {
        $origin = 'web';
        if ('cli' === PHP_SAPI) {
            $origin = 'cron';
        }

        return $origin;
    }

}