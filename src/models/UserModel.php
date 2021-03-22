<?php


class UserModel
{
    private $conn;

    public function __construct()
    {
        $this->conn = new mysqli("127.0.0.1", "root", "1234", "carry");
    }

    public function getReportByLogin(string $email, string $password){
        $sql = "SELECT * FROM report WHERE user_email = " . $email . " AND user_password = " . $password;
        return $this->conn->query($sql);
    }
}