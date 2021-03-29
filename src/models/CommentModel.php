<?php


class CommentModel
{
    private $conn;

    public function __construct()
    {
        $this->conn = new mysqli("127.0.0.1", "root", "1234", "carry");
    }

    public function getCommentByReportID(int $report_ID){
        $sql = "SELECT * FROM report WHERE report_fk = " . $report_ID;
        return $this->conn->query($sql);
    }
}