<?php

namespace LyraMaker\Entrevista\Repository;

use LyraMaker\Entrevista\Database\Database;
use PDO;

class Repository{
    use Hydrate;
    protected PDO $pdo;

    public function __construct()
    {
        $this->pdo = new Database();
    }
}