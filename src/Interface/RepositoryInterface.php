<?php

namespace LyraMaker\Entrevista\Interface;

interface RepositoryInterface{
    public function listAll():array;
    public function findById($id):?object;
    public function create(object $data):void;
    public function update($id, object $data):void;
    public function delete($id):void;
}