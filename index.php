<?php
require_once 'config/database.php';
require_once 'models/Database.php';

// Получаем URL
$request = isset($_GET['url']) ? $_GET['url'] : 'home';
$request = rtrim($request, '/');

// Маршрутизация
switch ($request) {
    case '':
    case 'home':
        require __DIR__ . '/views/home.php';
        break;
    case 'login':
        require __DIR__ . '/controllers/AuthController.php';
        $controller = new AuthController();
        $controller->login();
        break;
    case 'register':
        require __DIR__ . '/controllers/AuthController.php';
        $controller = new AuthController();
        $controller->register();
        break;
    case 'admin':
        require __DIR__ . '/controllers/AdminController.php';
        $controller = new AdminController();
        $controller->dashboard();
        break;
    case 'admin/products':
        require __DIR__ . '/controllers/ProductController.php';
        $controller = new ProductController();
        $controller->listProducts();
        break;
    case 'admin/products/add':
        require __DIR__ . '/controllers/ProductController.php';
        $controller = new ProductController();
        $controller->addProduct();
        break;
    case 'admin/products/edit':
        require __DIR__ . '/controllers/ProductController.php';
        $controller = new ProductController();
        $controller->editProduct();
        break;
    case 'admin/users':
        require __DIR__ . '/controllers/UserController.php';
        $controller = new UserController();
        $controller->listUsers();
        break;
    case 'admin/users/add':
        require __DIR__ . '/controllers/UserController.php';
        $controller = new UserController();
        $controller->addUser();
        break;
    case 'admin/users/edit':
        require __DIR__ . '/controllers/UserController.php';
        $controller = new UserController();
        $controller->editUser();
        break;
    case 'catalog':
        require __DIR__ . '/controllers/ProductController.php';
        $controller = new ProductController();
        $controller->showCatalog();
        break;
    case preg_match('%^admin/products/edit(?:\?id=(\d+))?$%', $request, $matches) ? $request : !$request:
        $_GET['id'] = $matches[1] ?? null;
        require __DIR__ . '/controllers/ProductController.php';
        $controller = new ProductController();
        $controller->editProduct();
        break;
    case 'admin/products/delete':
        require __DIR__ . '/controllers/ProductController.php';
        $controller = new ProductController();
        $controller->deleteProduct();
        break;
}
?>
