<?php

class ReportModel
{
    private $conn;

    public function __construct()
    {
        $this->conn = new mysqli("127.0.0.1", "root", "1234", "carry");
    }

    public function getAllReports(){
        $sql = "SELECT * FROM reports";
        return $this->conn->query($sql);
    }

    public function getReportById(string $id){
        $sql = "SELECT * FROM reports WHERE Report_id='" . $id . "'";
        return $this->conn->query($sql);
    }

    public function addReportToDB(string $title, string $comment, string $lat, string $lng, string $img, int $user_fk){
        $sql = "INSERT INTO reports(Report_Image, Report_Comment, Report_Title, Report_Location, Report_Status, User_fk) values ('$img', '$comment', '$title', '$lat / $lng', 'eingeschrieben', $user_fk);";
        $this->conn->query($sql);
    }
}