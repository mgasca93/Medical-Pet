<?php

namespace Horus\Config;

/**
 * Application configuration
 *
 * PHP version 7.0
 */
class Env
{

    /**
     * Database host
     * @var string
     */
    const DB_HOST = 'localhost';

    /**
     * Database name
     * @var string
     */
    const DB_NAME = 'pet_clinical';

    /**
     * Database user
     * @var string
     */
    const DB_USER = 'mgasca93';

    /**
     * Database password
     * @var string
     */
    const DB_PASSWORD = 'DbPL259#';

     /**
     * Database driver
     * @var string
     */
    const DB_DRIVER = 'mysql';

     /**
     * Database driver
     * @var string
     */
    const DB_CHARSET = 'utf8mb4';

    /**
     * Show or hide error messages on screen
     * @var boolean
     */
    const SHOW_ERRORS = true;

    /**
     * API KEY mailchimp
     * @var boolean
     */
    const MAIL_API_KEY = '';
}
