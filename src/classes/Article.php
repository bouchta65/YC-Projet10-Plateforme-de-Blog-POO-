<?php

class Article {
    private int $id_Article;
    private string $titre_Article;
    private string $contenu_Article;
    private string $image_Article;
    private string $date_Partage;
    private bool $article_Confirmer;
    private PDO $conn;
    private array $likes = []; 
    private array $comments = []; 

    public function __construct(PDO $conn,int $id_Article, string $titre_Article, string $contenu_Article, string $image_Article, string $date_Partage, bool $article_Confirmer) {
        $this->conn = $conn;
        $this->id_Article = $id_Article;
        $this->titre_Article = $titre_Article;
        $this->contenu_Article = $contenu_Article;
        $this->image_Article = $image_Article;
        $this->date_Partage = $date_Partage;
        $this->article_Confirmer = $article_Confirmer;
    }

    public function getTitreArticle(): string {
        return $this->titre_Article;
    }

    public function getIdArticle(): string {
        return $this->id_Article;
    }

    public function setTitreArticle(string $titre): void {
        $this->titre_Article = $titre;
    }

    public function getContenuArticle(): string {
        return $this->contenu_Article;
    }

    public function setContenuArticle(string $contenu): void {
        $this->contenu_Article = $contenu;
    }

    public function getImageArticle(): string {
        return $this->image_Article;
    }

    public function setImageArticle(string $image): void {
        $this->image_Article = $image;
    }

    public function getDatePartage(): string {
        return $this->date_Partage;
    }

    public function setDatePartage(string $date): void {
        $this->date_Partage = $date;
    }

    public function isArticleConfirmer(): bool {
        return $this->article_Confirmer;
    }

    public function setArticleConfirmer(bool $confirmer): void {
        $this->article_Confirmer = $confirmer;
    }

    public function getLikes(): array {
        return $this->likes;
    }

    public function setLikes(array $likes): void {
        $this->likes = $likes;
    }

    public function getComments(): array {
        return $this->comments;
    }

    public function setComments(array $comments): void {
        $this->comments = $comments;
    }

    public function getConn(): PDO {
        return $this->conn;
    }

    public function setConn(PDO $conn): void {
        $this->conn = $conn;
    }

    



    public function loadObjects(string $tableName, int $id_Article): void
    {
    $sql = "SELECT * FROM {$tableName} WHERE Id_Article = ?";
    $stmt = $this->conn->prepare($sql);
    $stmt->bindValue(1, $id_Article, PDO::PARAM_INT);
    $stmt->execute();
    $results = $stmt->fetchAll(PDO::FETCH_NUM); 

    foreach ($results as $row) {
        $this->Articles[] = new Article($this->conn, $row[0], $row[1], $row[2], $row[3], $row[4], $row[5]);
    }
    }

    public function addObject(int $id_User): void
        {
            try {
                $sql = "INSERT INTO Article (Titre_Article, Contenu_Article, Image_Article, Article_Confirme, Id_User) 
                        VALUES (?, ?, ?, ?, ?)";
                $stmt = $this->conn->prepare($sql);
                $stmt->bindValue(1, $this->titre_Article, PDO::PARAM_STR);
                $stmt->bindValue(2, $this->Contenu_Article, PDO::PARAM_STR);
                $stmt->bindValue(3, $this->Image_Article, PDO::PARAM_STR);
                $stmt->bindValue(4, $this->Article_Confirme, PDO::PARAM_STR);
                $stmt->bindValue(5, $id_User, PDO::PARAM_INT); 
        
                $stmt->execute();
                echo "Article successfully added!";

            } catch (PDOException $e) {
                echo "Error adding article: " . $e->getMessage();
            }
    }
    public function getAllObjects(): array{
        $sql = "SELECT * FROM Article a left join Archive r on a.Id_Article = r.Id_Article where a.Id_User='$idUser' and r.Id_Article is null";
        $stmt = $this->conn->prepar($sql);
        $stmt->execute();
        $result = $tstmt->fetch(PDO::FETCH_NUM);
        return $result;
    }

    public function getOneObject(int $id_User): array{
        $sql = "SELECT * from Article where id_User=?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue(1,$this->id_User,PDO::FETCH_INT);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_NUM);
        return $result;
    }
        


    // public function deleteArticle(){
    //     $sql = "DELETE from Article where Id_Article = ?";
    //     $stmt = $this->conn->prepare($sql);
    //     $stmt->bindValue(1,$this->id_Article,PDO::PARAM_NUM);
    //     $stmt->execute();
    // }

    // public function updateArticle(){
    //     $sql = "UPDATE "
    // }

}
?>