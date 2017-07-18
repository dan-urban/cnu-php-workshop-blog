<?php

/**
 * Class Database
 */
class Database
{
    /**
     * @var string
     */
    private $host;

    /**
     * @var string
     */
    private $db;

    /**
     * @var string
     */
    private $user;

    /**
     * @var string
     */
    private $pass;

    /**
     * @var string
     */
    private $charset;

    /**
     * Database constructor.
     * @param $host
     * @param $db
     * @param $user
     * @param $pass
     * @param $charset
     */
    public function __construct($host, $db, $user, $pass, $charset)
    {
        $this->host = $host;
        $this->db = $db;
        $this->user = $user;
        $this->pass = $pass;
        $this->charset = $charset;
    }

    /**
     * @return PDO
     */
    public function getDatabaseConnection()
    {
        $dsn = "mysql:host=$this->host;dbname=$this->db;charset=$this->charset";

        $opt = [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => false,
        ];

        $pdo = new PDO($dsn, $this->user, $this->pass, $opt);

        return $pdo;
    }
}
