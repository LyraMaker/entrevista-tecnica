<?php

namespace LyraMaker\Entrevista\Database;

class Database extends \PDO{
    public function __construct()
    {
        return parent::__construct("{$_ENV['DB_DRIVER']}:host={$_ENV['DB_HOSTNAME']};dbname={$_ENV['DB_DATABASE']}",$_ENV['DB_USERNAME'],$_ENV['DB_PASSWORD']); 
    }
}