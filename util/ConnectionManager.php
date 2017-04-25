<?php
/**
 * Created by PhpStorm.
 * User: MainW8
 * Date: 4/24/2017
 * Time: 11:08 AM
 */

namespace util;


class ConnectionManager implements IConnectionManager
{

    /** @var \PDO*/
    private static $connection = null;
    /** @var string*/
    private $filePath = null;

    public function __construct()
    {
    }


    public function getConnection($filePath)

    {
        $this->checkFilePath($filePath);
        $config = $this->parseConfigJSON($filePath);
        $dsn = $this->prepareDSN($config);

        if (empty(static::$connection) || $this->filePathChanged($filePath)) {
            static::$connection = $this->newConnect($dsn, $config);
        }
        return static::$connection;
    }

    private function newConnect($dsn, $config)
    {
        return new \PDO($dsn, $config['username'], $config['password']);
    }

    private function prepareDSN($config)
    {
        $driver = null;
        $host = null;
        $port = null;
        $dbname = null;
        $charset = null;
        extract($config, EXTR_IF_EXISTS);
        $dsn = sprintf("%s:host=%s;port=%s;dbname=%s;charset=%s", $driver, $host, $port, $dbname, $charset);
        return $dsn;
    }

    private function filePathChanged($filePath)
    {
        if ($filePath == $this->filePath) {
            return false;
        } else {
            return true;
        }
    }


    /**
     * @param $filePath
     * @throws \Exception
     */
    private function checkFilePath($filePath)
    {
        if (!file_exists($filePath)) {
            $message = "File {$filePath} doesn't exists line: " . __LINE__ . " \tmethod: " . __METHOD__ . " \tclass: " . __CLASS__;
            throw new \Exception($message);
        }
    }

    /**
     * @param $filePath
     * @return array|mixed
     * @throws \Exception
     */
    private function parseConfigJSON($filePath)
    {
        $configJson = file_get_contents($filePath);
        $err = '';
        $config = json_decode($configJson);
        $err = json_last_error_msg();
        if ('No error' != $err) {
            $message = "Json encode error: $err";
            throw new \Exception($message);
        }
        $config = get_object_vars($config);
        return $config;
    }

}