<?php

$con = mysqli_connect("localhost","root","","gctta");
if(!$con){
    echo "Error in connection";
};
/*function Users_login(){

    if(isset($_Post['login'])){
        global $con;
        $email = $_Post['email'];
        $password = $_Post['password'];

        if($email && $password == ""){
            echo "Email and username can not be empty";
        }elseif($email && $password != ""){
            $q = mysqli_query($con,"select * from users where email='$password' && password='$password'");
            if($q){
                echo "user is there";
            }
        }
    }

};*/

function login(){

    if(isset($_Post['login'])){
        global $con;
        $email = $_Post['email'];
        $password = $_Post['password'];

        if($email && $password == ""){
            echo "Email and username can not be empty";
        }elseif($email && $password != ""){
            $q = mysqli_query($con,"select * from users where use_name='$email' && user_pass='$password'");
            $rr = mysqli_num_row($q);
            if($rr == 0){
                echo "Nothing has been found";
            }
            if($q){
                echo "user is there";
            }
        }
    }

};

function users(){

    global $con;

    $q = mysqli_query($con,"select * from users");

    while($row = mysqli_fetch_assoc($q)){
        $name = $row['user_name'];
        echo $name;
    }


};


?>