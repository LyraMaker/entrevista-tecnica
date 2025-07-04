<?php

namespace LyraMaker\Entrevista\Repository;

use Error;
use Exception;
use LyraMaker\Entrevista\Interface\RepositoryInterface;
use LyraMaker\Entrevista\Model\User;

class UserRepository extends Repository implements RepositoryInterface
{
    public function __construct()
    {
        parent::__construct();
        $this->setClassName('User');
    }

    public function listAll(): array
    {
        $sql = "SELECT * FROM user";

        $stmt = ($this->pdo)->prepare($sql);
        $stmt->execute();
        return $this->all($stmt->fetchAll(\PDO::FETCH_ASSOC));
    }

    public function findById($id): ?object
    {
        try {
            $sql = "SELECT * FROM user WHERE user_code = :uc";

            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue("uc", $id, \PDO::PARAM_INT);
            $stmt->execute();

            $result = $stmt->fetch(\PDO::FETCH_ASSOC);

            if (!$result) {
                throw new Exception("User not found!");
            }

            return $this->once($result);
            
        } catch (Exception $e) {
            echo $e->getMessage();
            return null;
        }
    }

    /**
     * 
     * @param User $data 
     * @return void 
     */
    public function create(object $data): void
    {
        $sql =  "INSERT INTO user (first_name, second_name, date_birth, street, city, neighborhood, state, description) 
                            VALUE (:fn, :sn, :db, :st, :ct,:ng, :sta, :ds)";

        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue("fn", htmlentities($data->getFirst_name()));
        $stmt->bindValue("sn", htmlentities($data->getSecond_name()));
        $stmt->bindValue("db", htmlentities($data->getDate_birth()));
        $stmt->bindValue("st", htmlentities($data->getStreet()));
        $stmt->bindValue("ct", htmlentities($data->getCity()));
        $stmt->bindValue("ng", htmlentities($data->getNeighborhood()));
        $stmt->bindValue("sta", htmlentities($data->getState()));
        $stmt->bindValue("ds", htmlentities($data->getDescription()));

        $stmt->execute();
    }


    /**
     * 
     * @param User $data 
     * @return void 
     */
    public function update($id, object $data): void
    {
        if (is_null($this->findById($id))) {
            return;
        }

        $sql = "UPDATE user SET 
                        first_name = :fn, 
                        second_name = :sn, 
                        date_birth = :db, 
                        street = :st, 
                        city = :ct, 
                        neighborhood = :ng, 
                        state = :sta, 
                        description = :ds 
                    WHERE user_code = :uc";

        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue("fn", htmlentities($data->getFirst_name()));
        $stmt->bindValue("sn", htmlentities($data->getSecond_name()));
        $stmt->bindValue("db", htmlentities($data->getDate_birth()));
        $stmt->bindValue("st", htmlentities($data->getStreet()));
        $stmt->bindValue("ct", htmlentities($data->getCity()));
        $stmt->bindValue("ng", htmlentities($data->getNeighborhood()));
        $stmt->bindValue("sta", htmlentities($data->getState()));
        $stmt->bindValue("ds", htmlentities($data->getDescription()));
        $stmt->bindValue("uc", htmlentities($id));

        $stmt->execute();
    }

    public function delete($id): void
    {
        $sql = "DELETE FROM user WHERE user_code = :uc";

        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue("uc", $id, \PDO::PARAM_INT);

        $stmt->execute();
    }
}
