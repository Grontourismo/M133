<?php


class CommentModel
{
    private $conn;

    public function __construct()
    {
        $this->conn = new mysqli("127.0.0.1", "root", "1234", "carry");
    }

    public function getCommentByReportID(int $report_ID){
        $sql = "SELECT * FROM comments WHERE Report_fk='" . $report_ID . "'";
        return $this->conn->query($sql);
    }

    public function addCommentToDB(string $comment, int $user_fk, int $report_fk){
        $sql = "INSERT INTO comments(Comment, User_fk, Report_fk) values ('$comment', '$user_fk', '$report_fk');";
        $this->conn->query($sql);
    }
}