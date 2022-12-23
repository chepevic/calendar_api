<?php

class errorController
{
    public function index()
    {
        $title = "Calendar | 404";
        $h2 = "Error 404";
        $message = "Page not Found";
        http_response_code(404);
        require_once("views/404/index.php");
    }
}
