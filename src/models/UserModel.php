<?php


class UserModel
{
    private $conn;

    public function __construct()
    {
        $this->conn = new PDO('mysql:host=localhost;dbname=carry', "root", "n0310000");
    }

    public function getUsers(){
        $sql = "SELECT * FROM users;";
        return $this->conn->query($sql);
    }

    public function getUserByLogin(string $email, string $password){
        $sql = "SELECT * FROM users;";// WHERE user_email = " . $email . " AND user_password = " . $password;
        return $this->conn->query($sql);
    }

    public function getUserByEmail(string $email){
        $sql = "SELECT * FROM users WHERE user_email = " . $email;
        return $this->conn->query($sql);
    }
}