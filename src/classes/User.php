<?php
include '../db/config.php';
include 'Article.php';
class User {
    protected int $id_User ;
    protected String $nom_User;
    protected String $email_User;
    protected int $age_User;
    protected String $password;
    protected String $role;
    protected PDO $conn;
    protected array $Articles = [];

    public function __construct(PDO $conn,int $id_User, string $nom_User, string $email_User, int $age_User, string $password, string $role) {
        $this->conn = $conn;
        $this->id_User = $id_User;
        $this->nom_User = $nom_User;
        $this->age_User = $age_User;
        $this->email_User = $email_User;
        $this->password = $password;
        $this->role = $role;
    }

    public function getConn(): PDO {
        return $this->conn;
    }

    public function getNomUser(): string {
        return $this->nom_User;
    }

    public function getIdUser(): string {
        return $this->id_User;
    }

    public function getEmailUser(): string {
        return $this->email_User;
    }

    public function getAgeUser(): int {
        return $this->age_User;
    }

    public function getPassword(): string {
        return $this->password;
    }

    public function getRole(): string {
        return $this->role;
    }

    public function setConn(PDO $conn): void {
        $this->conn = $conn;
    }

    public function setNomUser(string $nom_User): void {
        $this->nom_User = $nom_User;
    }

    public function setEmailUser(string $email_User): void {
        $this->email_User = $email_User;
    }

    public function setAgeUser(int $age_User): void {
        $this->age_User = $age_User;
    }

    public function setPassword(string $password): void {
        $this->password = $password;
    }

    public function setRole(string $role): void {
        $this->role = $role;
    }

    public function getArticles(): array {
        return $this->Articles;
    }

    public function login($email_User, $password): void {
        $sql = "SELECT * FROM user WHERE Email_User = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue(1, $email_User, PDO::PARAM_STR);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
    
        if ($user) {
            if (password_verify($password, $user['Password_User'])) {
                $this->id_User = $user['Id_User'];
                $this->nom_User = $user['Full_Name_User'];
                $this->email_User = $user['Email_User'];
                $this->age_User = (int)$user['Age_User'];
                $this->password = $user['Password_User'];
                $this->role = $user['Role_User'];
                $_SESSION['user_obj'] = serialize($this); 
    
                header("Location: ../views/blog.php");
            } else {
                echo "<script>alert('Mot de passe incorrect');</script>";
            }
        } else {
            echo "<script>alert('Email non trouvé');</script>";
        }
    }
    
    public function logout(): void{
        session_start();
        unset($_SESSION['user_obj']);
        session_unset();
        session_destroy();
        header("Location: ../../index.php");
        exit();
    }
    public function __sleep(): array {
        return ['id_User', 'nom_User', 'email_User', 'age_User', 'password', 'role'];
    }

    public function __wakeup(): void {
        $this->conn = new PDO('mysql:host=localhost;dbname=blog_projet', 'Bouchta', '0000'); 
    }

    public function loadArticles(): void {
        if ($this->conn === null) {
            throw new Exception("Database connection not initialized.");
        }
        $sql = "SELECT * FROM Article a left join Archive r on a.Id_Article = r.Id_Article where r.Id_Article is null and a.id_User = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue(1, $this->id_User, PDO::PARAM_INT);
        $stmt->execute();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $article = new Article($this->conn, $row[0], $row[1], $row[2], $row[3], $row[4], $row[5], $row[6]);
            $this->Articles[] = $article;
        }
    }

    public function addArticle(string $titre_Article, string $contenu_Article, string $image_Article, string $date_Partage, bool $article_Confirmer){
        $article = new Article($this->conn,null,  $titre_Article,  $contenu_Article,  $image_Article,  $date_Partage,  $article_Confirmer);
        $article->addObject($this->id_User);
        $this->Articles[] = $article;
    }

    // public function deleteoneArticle(){

    // }

    // public function addArticle(string $titre, string $contenu): bool {
    //     $article = new Article($this->conn, 0, $titre, $contenu, $this->id);
    //     if ($article->add()) {
    //         $this->articles[] = $article;
    //         return true;
    //     }
    //     return false;
    // }

}


?>