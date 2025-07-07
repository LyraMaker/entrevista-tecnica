<?php

namespace LyraMaker\Entrevista\Misc;

class View
{
    static $data = [];

    static function addData(string $key, mixed $value)
    {
        self::$data[$key] = $value;
    }

    static function render(string $path): string|false
    {
        ob_start();

        extract(self::$data);

        include __DIR__ . "/../View/" . $path . ".php";

        $content = ob_get_contents();

        if (isset(self::$data)) {
            self::$data = [];
        }
        ob_end_clean();
        return $content;
    }
}
