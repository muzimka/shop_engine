<?php
/**
 * Created by PhpStorm.
 * User: MainW8
 * Date: 4/23/2017
 * Time: 7:29 PM
 */
namespace util;


class QueryHandler
{
    const DEFAULT_FILE = 'assets/queries/q.json';

    private $queryFilePath;
    private $allQueries;
    private $parseErorr = null;


    public function __construct($queryFile = self::DEFAULT_FILE)
    {
        $this->queryFilePath = ROOT_DIR . $queryFile;
        $json = $this->readFile();
        $this->parseJson($json);
    }

    public function getQuery($queryKey, $params = [])
    {
        $res = $this->allQueries->{$queryKey};
        if (empty($res)) {
            $message = "SQL query {$queryKey} can't read from file {$this->queryFilePath} or does not exists";
            throw new \Exception($message);
        }

        $res = $this->replacePlaceHolders($params, $res);

        return $res;
    }

    private function checkAtrSetConsistence($curr_value,$params){

        foreach ($curr_value as $key => $val ){
            if(!array_key_exists($val,$params)){
                $message = 'Error in atr_set and params consistence';
                throw new \Exception($message);
            }
        }


    }
    private function parseJson($json)
    {
        $this->allQueries = json_decode($json);
        if ('No error' != $this->parseErorr = json_last_error_msg()) {
            throw new \Exception($this->parseErorr);
        }
    }

    private function readFile()
    {
        $res = '';
        if (!file_exists($this->queryFilePath)) {
            $message = "File for SQL querying {$this->queryFilePath} doesn't exists";
            throw new \Exception($message);
        } else {
            $res = file_get_contents($this->queryFilePath);
        }
        return $res;
    }

    /**
     * @param array $params
     * @param string $res
     * @return string
     */
    private function replacePlaceHolders($params, $res)
    {
        foreach ($params as $key => $curr_value) {

            if (is_array($curr_value)) {
                $curr_value = array_values($curr_value);
                $curr_value = implode(', ', $curr_value);
            }
            $res = str_replace('{$' . $key . '}', $curr_value, $res);
        }
        return $res;
    }
}