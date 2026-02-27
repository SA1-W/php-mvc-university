<?php



class View
{
    public static function render($content, $data = [])
    {
        extract($data);
        $content = __DIR__ . "/../../views/$content";
        require __DIR__ . '/../../views/layouts/dashboard.php';
        // return $content;
    }
}
