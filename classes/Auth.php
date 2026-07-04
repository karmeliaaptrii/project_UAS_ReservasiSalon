<?php

require_once __DIR__ . '/../config/Database.php';

class Auth
{
    private $conn;

    public function __construct()
    {
        $database = new Database();
        $this->conn = $database->connect();
    }

    public function register($nama, $email, $password, $no_hp)
{
    $query = "SELECT id FROM users WHERE email = :email";
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(":email", $email);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        return "Email sudah terdaftar!";
    }

    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    $query = "INSERT INTO users (nama, email, password, no_hp, role)
              VALUES (:nama, :email, :password, :no_hp, 'customer')";

    $stmt = $this->conn->prepare($query);

    $stmt->bindParam(":nama", $nama);
    $stmt->bindParam(":email", $email);
    $stmt->bindParam(":password", $hashedPassword);
    $stmt->bindParam(":no_hp", $no_hp);

    if ($stmt->execute()) {
        return true;
    } else {
        return false;
    }
}

    public function login($email, $password)
    {

    }

    public function logout()
    {

    }

    public function isLoggedIn()
    {

    }

    public function hasRole($role)
    {

    }
}