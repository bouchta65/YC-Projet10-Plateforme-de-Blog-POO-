<?php
include '../db/config.php';
class User{
    protected $nom_User;
    protected $email_User;
    protected $age_User;
    protected $password;
    protected $role;

    public function __construct($conn, $nom_User, $email_User,$age_User, $password, $role) {
        $this->conn = $conn;
        $this->nom_User = $nom_User;
        $this->age_User = $age_User;
        $this->email_User = $email_User;
        $this->password = $password;
        $this->role = $role;
        session_start(); 

    }

    public function getConn() {
        return $this->conn;
    }


    public function getNomUser() {
        return $this->nom_User;
    }

    public function getEmailUser() {
        return $this->email_User;
    }

    public function getAgeUser() {
        return $this->age_User;
    }

    public function getPassword() {
        return $this->password;
    }

    public function getRole() {
        return $this->role;
    }

    public function setConn($conn) {
        $this->conn = $conn;
    }

    public function setNomUser($nom_User) {
        $this->nom_User = $nom_User;
    }

    public function setEmailUser($email_User) {
        $this->email_User = $email_User;
    }

    public function setAgeUser($age_User) {
        $this->age_User = $age_User;
    }

    public function setPassword($password) {
        $this->password = $password;
    }

    public function setRole($role) {
        $this->role = $role;
    }

    public function login($email_User,$password){
        $sql = "SELECT * FROM user WHERE Email_User = :email";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue(':email', $email_User, PDO::PARAM_STR);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user) {
        
            if (password_verify($password, $user['Password_User'])) {
                $_SESSION["user"] = $user['Email_User'];
                $_SESSION["role"] = $user['Role_User'];
                if($_SESSION["role"]=="User"){
                    header("Location: ../views/userBlog.php");
                }else{
                    header("Location: ../views/login.php");
                }
                
            } else {
                echo "<script>alert('Mot de passe incorrect');</script>";
            }
        } else {
            echo "<script>alert('Email non trouvé');</script>";
        }
    }

    public function logout(){
        session_start();
        session_unset();
        session_destroy();
        header("Location: ../../index.php");
        exit();
    }




}

?>