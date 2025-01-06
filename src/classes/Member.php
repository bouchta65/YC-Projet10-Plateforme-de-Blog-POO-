<?php
include 'User.php';

class Member extends User{

    public function __Construct($conn, $nom_User, $email_User,$age_User, $password, $role){
        $role = "User";
        parent::__construct($conn, $nom_User, $email_User,$age_User, $password, $role);
    }

    public function registre(){
        $conn = $this->getConn();
        $email = $this->getEmailUser();
        $password = $this->getPassword();
        $name = $this->getNomUser();
        $age = $this->getAgeUser();
        $role = $this->getRole();
        $sql = "SELECT Email_User FROM user WHERE Email_User = :email";
        $stmt = $conn->prepare($sql);
        $stmt->bindValue(':email', $email, PDO::PARAM_STR);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_NUM);

        if ($result) {
            echo "<script>alert('Lemail est déjà utilisé.');</script>";
        } else {
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

            $sql = "INSERT INTO user (Full_Name_User, Email_User, Age_User, Role_User, Password_User) VALUES (?, ?, ?, 'user', ?)";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindValue(1, $name, PDO::PARAM_STR); 
            $stmt->bindValue(2, $email, PDO::PARAM_STR); 
            $stmt->bindValue(3, $age, PDO::PARAM_INT); 
            $stmt->bindValue(4, $hashedPassword, PDO::PARAM_STR); 
                
            if ($stmt->execute()) {
                echo "<script>alert('Inscription réussie.');</script>";
            } else {
                echo "<script>alert('Erreur lors de linscription.');</script>";
            }
        }
    }
}
?>