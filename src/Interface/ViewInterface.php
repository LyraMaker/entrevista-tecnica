<?php

namespace LyraMaker\Entrevista\Interface;

interface ViewInterface
{
    public function render(string $template, array $data = []): void;
    public function setLayout(string $layout): void;
}
