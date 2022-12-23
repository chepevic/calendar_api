<?php
require_once("config/parameters.php");
require_once("config/autoload.php");
require_once("models/conexion.php");
$params = ""; //* SAVE IF THE URL COMES WITH PARAMETERS


if (isset($_GET["url"])) {
    $url = $_GET["url"];
    $url = explode("/", $url);
 
}
//* SAVE WHAT WE GET IN THE URL
function error()
{
    //autoload.php add controller
    $error = new errorController();
    $error->index();
}
//* RUN WHEN THE CONTROLLER OR METHOD DON'T EXIST
if (!empty($url[0])) {
    $controller_name = $url[0] . "Controller";
} else {
    $controller_name = CONTROLLER_DEFAULT;
}
//* END ADD CONTROLLER
if (!empty($url[1])) {
    $method = $url[1];
} else {
    $method = METHOD_DEFAULT;
}
//* END ADD METHOD

if (!empty($url[2])) {

    for ($i = 2; $i < count($url); $i++) {
        $params .= $url[$i] . ",";
    }
    $params = trim($params, ",");
}
//* END ADD PARAMETERS

//* VERIFY IF THE CONTROLLER EXITS
$controller_path = "controllers/" . $controller_name . ".php";
if (file_exists($controller_path)) {
    //* autoload.php ADD CONTROLLER
    $controller = new $controller_name();
    //* ADD METHOD AND PARAMETERS
    if (method_exists($controller, $method)) {
        $controller->{$method}($params);
    } else {
        error();
    }
} else {
    error();
}
