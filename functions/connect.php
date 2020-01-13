<?php
$con = mysqli_connect("localhost","root","","gctta");
if(!$con){
    echo "Error in connection";
}

function Users_login(){

    if(isset($_Post['login'])){
        $email = $_Post['email'];
        $password = $_Post['password'];

        if($email && $password == ""){
            echo "Email and username can not be empty";
        }elseif($email && $password != ""){
            $q = mysqli_query($con,"select * from users where email='$password' && password='$password'");
            if($g){
                echo "user is there";
            }
        }
    }

};


?>