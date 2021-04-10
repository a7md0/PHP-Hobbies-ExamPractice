<?php
class Database extends MySQLi
{
    /**
     * Singleton instance of MySQLi
     *
     * @var self
     */
    private static $instance = null;

    private function __construct($host, $user, $password, $database)
    {
        parent::__construct($host, $user, $password, $database);
    }

    /**
     * Instance of MySQLi
     *
     * @return self
     */
    public static function getInstance()
    {
        if (self::$instance == null) {
            self::$instance = new self("localhost", "u201700099", "u201700099", "db201700099");
            
            if (self::$instance->connect_errno) {

                printf("connection failed: %s\n", self::$instance->connect_error);
                exit();
            }
        }

        return self::$instance;
    }

    public static function closeConnection()
    {
        if (self::$instance != null) {
            self::$instance->close();
            self::$instance = null;
        }
    }
}
