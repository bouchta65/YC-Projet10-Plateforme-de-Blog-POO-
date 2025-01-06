<?php
include 'User.php';

class Admin extends User{

    public function __Construct($conn,$email, $password, $role){
        parent::__construct($conn, $email, $password, $role);
    }
}
?>