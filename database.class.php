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
        }

        return self::$instance;
    }

    public function closeConnection()
    {
        if (self::$instance != null) {
            parent::close();
            self::$instance = null;
        }
    }
}
