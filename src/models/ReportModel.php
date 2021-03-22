<?php

class ReportModel
{
    private $conn;

    public function __construct()
    {
        $this->conn = new mysqli("127.0.0.1", "root", "1234", "carry");
    }

    public function getAllReports(){
        $sql = "SELECT * FROM report";
        return $this->conn->query($sql);
    }

    public function getReportById(string $id){
        $sql = "SELECT * FROM report WHERE report_id = " . $id;
        return $this->conn->query($sql);
    }
}