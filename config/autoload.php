<?php
function autoload($class)
{
   require_once "controllers/" . $class . ".php";
}
spl_autoload_register('autoload');

// *** I CANNOT USE THE SPL_AUTOLOAD FUNCTION IN HERE BECAUSE IT GET A CONFLICT WITH THE SPL_AUTOLOAD FILE FROM DOMP PDF LIBRARY WHICH IS IN THE PATH VIEWS/PDF/DOMPDF

// require_once "controllers/errorController.php";
// require_once "controllers/homeController.php";
// require_once "controllers/buyerController.php";
// require_once "controllers/sellerController.php";
// require_once "controllers/userController.php";
// require_once "controllers/productsController.php";
// require_once "controllers/locationsController.php";
// require_once "controllers/adminController.php";
// require_once "controllers/productsController.php";
// require_once "controllers/storesController.php";
// require_once "controllers/eventsController.php";
// require_once "controllers/pruebasController.php";
// require_once "controllers/cartController.php";
// require_once "controllers/ordersController.php";
// require_once "controllers/stripeController.php";
// require_once "controllers/becomesellerController.php";
// require_once 'controllers/categoryController.php';
// require_once 'controllers/subcategoryController.php';
// require_once 'controllers/sponsorsController.php';
// require_once 'controllers/councilController.php';