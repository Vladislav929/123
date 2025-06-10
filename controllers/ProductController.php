<?php
require_once __DIR__ . '/../models/ProductModel.php';

class ProductController {
    private $model;
    
    public function __construct() {
        $this->model = new ProductModel();
    }
    
    public function showCatalog() {
        $products = $this->model->getAllProducts();
        require_once __DIR__ . '/../views/products/catalog.php';
    }
    
    public function listProducts() {
        $products = $this->model->getAllProducts();
        require_once __DIR__ . '/../views/admin/products/list.php';
    }
    
    public function addProduct() {
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = [
                'name' => trim($_POST['name']),
                'description' => trim($_POST['description']),
                'price' => trim($_POST['price']),
                'category' => trim($_POST['category']),
                'image' => $this->uploadImage()
            ];
            
            if($this->model->addProduct($data)) {
                header('Location: /meubelny-salon/admin/products');
            } else {
                die('Something went wrong');
            }
        } else {
            require_once __DIR__ . '/../views/admin/products/add.php';
        }
    }
    
    public function editProduct() {
        echo '<pre>GET: '; print_r($_GET); echo '</pre>';
        echo '<pre>POST: '; print_r($_POST); echo '</pre>';
        echo '<pre>FILES: '; print_r($_FILES); echo '</pre>';
        // Проверяем ID товара
        if(!isset($_GET['id'])) {
            header('Location: /meubelny-salon/admin/products');
            exit();
        }
    
        $productId = (int)$_GET['id'];
        $product = $this->model->getProductById($productId);
    
        if(!$product) {
            header('Location: /meubelny-salon/admin/products');
            exit();
        }
    
        // Обработка формы
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = [
                'id' => $productId,
                'name' => trim($_POST['name']),
                'description' => trim($_POST['description']),
                'price' => (float)trim($_POST['price']),
                'category' => trim($_POST['category']),
                'image' => !empty($_FILES['image']['name']) ? $this->uploadImage() : $_POST['existing_image']
            ];
    
            // Валидация данных
            if(empty($data['name']) || empty($data['description']) || empty($data['price'])) {
                die('Пожалуйста, заполните все обязательные поля');
            }
            // Отладочная информация
            error_log(print_r($data, true));
            $result = $this->model->updateProduct($data);
            error_log('Результат обновления: ' . ($result ? 'успешно' : 'ошибка'));
    
            // Обновляем товар
            if($this->model->updateProduct($data)) {
                header('Location: /meubelny-salon/admin/products');
                exit();
            } else {
                die('Ошибка при обновлении товара');
            }
        }
    
        // Передаем товар в представление
        require_once __DIR__ . '/../views/admin/products/edit.php';
    }
    public function deleteProduct() {
        // Проверка авторизации и прав
        if (!isset($_SESSION['user_id']) || $_SESSION['user_role'] !== 'admin') {
            header('Location: /meubelny-salon/login');
            exit();
        }
    
        // Проверка ID
        if (!isset($_GET['id'])) {
            $_SESSION['error'] = 'Не указан ID товара';
            header('Location: /meubelny-salon/admin/products');
            exit();
        }
    
        $productId = (int)$_GET['id'];
        
        // Удаление изображения если есть
        $product = $this->model->getProductById($productId);
        if ($product && !empty($product->image)) {
            $imagePath = __DIR__ . '/../assets/images/' . $product->image;
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }
    
        // Удаление из БД
        if ($this->model->deleteProduct($productId)) {
            $_SESSION['success'] = 'Товар успешно удалён';
        } else {
            $_SESSION['error'] = 'Ошибка при удалении товара';
        }
    
        header('Location: /meubelny-salon/admin/products');
        exit();
    }
    
    private function uploadImage() {
        if(isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
            $target_dir = "../assets/images/";
            $target_file = $target_dir . basename($_FILES["image"]["name"]);
            move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
            return basename($_FILES["image"]["name"]);
        }
        return null;
    }
}
?>
