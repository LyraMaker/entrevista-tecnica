<?php

namespace LyraMaker\Entrevista\Repository;

trait Hydrate
{
    
    private string $class;

    public function setClassName(string $className)
    {
        $this->class = 'LyraMaker\Entrevista\Model'.'\\'.$className;
    }

    public function once(array $value)
    {

        $obj = new $this->class(...$value);

        return $obj;
    }
    public function all(array $values): array
    {
        return array_map(fn($value) => new $this->class(...$value), $values);
    }
}
