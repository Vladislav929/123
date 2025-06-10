<?php
require_once 'Database.php';

class ProductModel {
    private $db;
    
    public function __construct() {
        $this->db = new Database();
    }
    
    public function getAllProducts() {
        $this->db->query('SELECT * FROM products');
        return $this->db->resultSet();
    }
    
    public function getProductById($id) {
        $this->db->query('SELECT * FROM products WHERE id = :id');
        $this->db->bind(':id', $id);
        return $this->db->single();
    }
    
    public function addProduct($data) {
        $this->db->query('INSERT INTO products (name, description, price, category, image) VALUES (:name, :description, :price, :category, :image)');
        $this->db->bind(':name', $data['name']);
        $this->db->bind(':description', $data['description']);
        $this->db->bind(':price', $data['price']);
        $this->db->bind(':category', $data['category']);
        $this->db->bind(':image', $data['image']);
        
        return $this->db->execute();
    }
    
    public function updateProduct($data) {
        $sql = 'UPDATE products SET 
            name = :name, 
            description = :description, 
            price = :price, 
            category = :category, 
            image = :image 
            WHERE id = :id';
        
        error_log("SQL: ".$sql);
        error_log("Data: ".print_r($data, true));
        
        $this->db->query($sql);
        $this->db->bind(':id', $data['id']);
        $this->db->bind(':name', $data['name']);
        $this->db->bind(':description', $data['description']);
        $this->db->bind(':price', $data['price']);
        $this->db->bind(':category', $data['category']);
        $this->db->bind(':image', $data['image']);
        
        $result = $this->db->execute();
        error_log("Result: ".($result ? 'true' : 'false'));
        return $result;
        try {
            return $this->db->execute();
        } catch(PDOException $e) {
            error_log('Ошибка обновления товара: ' . $e->getMessage());
            return false;
        }
    }
    
    public function deleteProduct($id) {
        $this->db->query('DELETE FROM products WHERE id = :id');
        $this->db->bind(':id', $id);
        
        try {
            $this->db->execute();
            return $this->db->rowCount() > 0;
        } catch (PDOException $e) {
            error_log('Ошибка удаления товара: ' . $e->getMessage());
            return false;
        }
    }
}
?>
