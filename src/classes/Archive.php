<?php


class Archive {
    private int $id_Archive;
    private int $id_User;
    private int $id_Article;
    private PDO $conn;

    public function __construct(PDO $conn, int $id_User, int $id_Article) {
        $this->conn = $conn;
        $this->id_User = $id_User;
        $this->id_Article = $id_Article;
    }

    public function getIdArchive(): int {
        return $this->id_Archive;
    }

    public function setIdArchive(int $id_Archive): void {
        $this->id_Archive = $id_Archive;
    }

    public function getIdUser(): int {
        return $this->id_User;
    }

    public function setIdUser(int $id_User): void {
        $this->id_User = $id_User;
    }

    public function getIdArticle(): int {
        return $this->id_Article;
    }

    public function setIdArticle(int $id_Article): void {
        $this->id_Article = $id_Article;
    }

    public static function getArchivesByUser(PDO $conn, int $id_User): array {
            $sql = "SELECT a.id_Archive, a.id_User, a.id_Article, aa.titre_Article,aa.Date_Posting, aa.contenu_Article, aa.image_Article FROM Archive a JOIN article aa ON a.id_Article = aa.id_Article WHERE a.id_User = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(1, $id_User, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        
    }
    


    public function ArchiveArticle() : void {
        $sql = "INSERT INTO Archive(id_User, id_Article) VALUES(?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue(1, $this->id_User, PDO::PARAM_INT);
        $stmt->bindValue(2, $this->id_Article, PDO::PARAM_INT);
        $stmt->execute();
    }

    public function returnArticle(PDO $conn, int $id_Article) : void {
        $sql = "DELETE FROM Archive WHERE Id_Article = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bindValue(1, $id_Article, PDO::PARAM_INT);
        $stmt->execute();
    }

    public function deleteArticle(PDO $conn, int $id_Article) : void {
        $sql = "DELETE FROM Article WHERE Id_Article = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bindValue(1, $id_Article, PDO::PARAM_INT);
        $stmt->execute();
    }

    public function deletteAllArticles(PDO $conn,int $id_User) : array{
        $sql = "DELETE FROM Article WHERE Id_Article IN (SELECT Id_Article FROM Archive where id_User = ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bindValue(1,$id_User,PDO::FETCH_INT);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_NUM);
        return $result;  
    }


    // public function archiveArticle(): bool {
    //     $sql = "INSERT INTO Archive (id_User, id_Article) VALUES (:id_User, :id_Article)";
    //     $stmt = $this->conn->prepare($sql);
    //     $stmt->bindParam(':id_User', $this->id_User, PDO::PARAM_INT);
    //     $stmt->bindParam(':id_Article', $this->id_Article, PDO::PARAM_INT);
        
    //     return $stmt->execute();
    // }

    // public function deleteArchive(): bool {
    //     $sql = "DELETE FROM Archive WHERE id_Archive = :id_Archive";
    //     $stmt = $this->conn->prepare($sql);
    //     $stmt->bindParam(':id_Archive', $this->id_Archive, PDO::PARAM_INT);
        
    //     return $stmt->execute();
    // }



    // public static function getArchivesByArticle(PDO $conn, int $id_Article): array {
    //     $sql = "SELECT * FROM Archive WHERE id_Article = :id_Article";
    //     $stmt = $conn->prepare($sql);
    //     $stmt->bindParam(':id_Article', $id_Article, PDO::PARAM_INT);
    //     $stmt->execute();
        
    //     return $stmt->fetchAll(PDO::FETCH_ASSOC);
    // }
}


?>