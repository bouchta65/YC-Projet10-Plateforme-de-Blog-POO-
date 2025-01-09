<?php 
include "../db/config.php";
class tag{
    private int $id_Tag;
    private String $title;
    private String $description;
    private PDO $conn;

    public function __construct(PDO $conn,int $id_Tag,String $title,String $description){
        $this->id_Tag = $id_Tag;
        $this->title = $title;
        $this->description = $description;
        $this->conn = $conn;
    }
    public function getIdTag(): int {
        return $this->id_Tag;
    }

    public function setIdTag(int $id_Tag): void {
        $this->id_Tag = $id_Tag;
    }

    public function getTitle(): string {
        return $this->title;
    }

    public function setTitle(string $title): void {
        $this->title = $title;
    }

    public function getDescription(): string {
        return $this->description;
    }

    public function setDescription(string $description): void {
        $this->description = $description;
    }

    public function getConn(): PDO {
        return $this->conn;
    }

    public function setConn(PDO $conn): void {
        $this->conn = $conn;
    }

    public function getAllObjects(){
        $sql = "SELECT * from tags";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_NUM);
        return $result;
    }

}
?>