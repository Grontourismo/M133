<?php


class UserModel
{
    private $conn;

    public function __construct()
    {
        $this->conn = new mysqli("127.0.0.1", "root", "1234", "carry");
    }

    public function getUsers(){
        $sql = "SELECT User_name, User_lastname, User_email, User_id FROM users";
        return $this->conn->query($sql);
    }

    public function getUsersForLogin(){
        $sql = "SELECT * FROM users";
        return $this->conn->query($sql);
    }

    public function getUserByEmail(string $email){
        $sql = "SELECT User_name, User_lastname, User_email, User_id FROM users WHERE User_email='" . $email . "'";
        return $this->conn->query($sql);
    }

    public function getUserById($id){
        $sql = "SELECT User_name, User_lastname, User_email, User_id FROM users WHERE User_id='" . $id . "'";
        return $this->conn->query($sql);
    }
}