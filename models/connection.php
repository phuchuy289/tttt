<?php

class Connection
{
    private static $instance = NULL;

    public static function getInstance()
    {
        if (!isset(self::$instance)) {
            try {
                self::$instance = new PDO(
                    'mysql:host=localhost;dbname=dodientu;charset=utf8',
                    'root', // username
                    ''      // password nếu XAMPP bạn để trống, nếu có sửa ở đây
                );
                self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                die("Database Connection failed: " . $e->getMessage());
            }
        }
        return self::$instance;
    }
}