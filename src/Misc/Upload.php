<?php

namespace LyraMaker\Entrevista\Misc;

use Exception;

class Upload
{
    private string $name;
    private string $temp;
    private string $type;
    private string $size;
    private string $error;

    public function __construct()
    {
        $this->setName($_FILES['profile_photo']['name'] ?? '')
            ->setTemp($_FILES['profile_photo']['tmp_name'] ?? '')
            ->setType($_FILES['profile_photo']['type'] ?? '')
            ->setSize($_FILES['profile_photo']['size'] ?? '')
            ->setError($_FILES['profile_photo']['error'] ?? '');
    }

    public function getError()
    {
        return $this->error;
    }

    public function setError($error)
    {
        $this->error = $error;
        return $this;
    }

    public function getSize()
    {
        return $this->size;
    }

    public function setSize($size)
    {
        $this->size = $size;
        return $this;
    }

    public function getType()
    {
        return $this->type;
    }

    public function setType($type)
    {
        $this->type = $type;
        return $this;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    public function getTemp()
    {
        return $this->temp;
    }

    public function setTemp($temp)
    {
        $this->temp = $temp;
        return $this;
    }

    public function realocate()
    {
        try {
            if ($this->getError() == 0) {
                $destination = __DIR__ . "/../../{$_ENV['folder_upload']}/" . $this->getName();
                if (move_uploaded_file($this->getTemp(), $destination)) {
                    return true;
                }
                throw new Exception('Erro ao mover o arquivo!');
            }
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
        return false;
    }
}
