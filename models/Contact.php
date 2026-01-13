<?php
require_once 'models/connection.php';

class Contact
{
    public static function create($name, $email, $product_id, $message)
    {
        $db = Connection::getInstance();
        $query = "INSERT INTO contacts (name, email, product_id, message) VALUES (?, ?, ?, ?)";
        $stmt = $db->prepare($query);
        $stmt->execute([$name, $email, $product_id, $message]);
    }

    public static function getProducts()
    {
        $db = Connection::getInstance();
        $stmt = $db->query("SELECT id, name FROM products");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function getAll()
    {
        $db = Connection::getInstance();
        $stmt = $db->query("SELECT c.*, p.name AS product 
                            FROM contacts c 
                            LEFT JOIN products p ON c.product_id = p.id
                            ORDER BY c.created_at DESC");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function delete($id)
    {
        $db = Connection::getInstance();
        $stmt = $db->prepare("DELETE FROM contacts WHERE id = ?");
        return $stmt->execute([$id]);
    }
}