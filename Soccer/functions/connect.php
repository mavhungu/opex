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

    if(isset($_Post['submit'])){
        $email = strtolower($_Post['username']);
        $password = $_Post['password'];
        if($email =="" || $password ==""){
            echo "Email and username can not be empty";
        }
        if($email !="" && $password !=""){
            global $con;
            $q = mysqli_query($con,"select * from users where use_name='$email'");
            /*$rr = mysqli_num_row($q);
            if($rr == 0){
                echo "Nothing has been found";
            }*/
           while($row = mysqli_fetch_assoc($q)){
                $db_id = $row['user_id'];
                $db_password = $row['user_pass'];
                $db_name = $row['user_name'];
           }
           if($email != $db_name && $password != $db_password){
               header("Location:index.php");
           }
           elseif($email === $db_name && $password === $db_password){
               $_SESSION['user_id'] = $db_id;
               $_SESSION['user_name'] = $db_name;
               $_SESSION['user_pass'] = $db_pass;
            header("Location:users_pages/index-2.html");
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

function tournament(){
    global $con;

    $q = mysqli_query($con, "select * from upcoming");
    while($row = mysqli_fetch_assoc($q)){
        $tour_name = $row['tour_name'];
        $tour_date = $row['tour_date'];

        echo <<<_END
        <div class="swiper-slide">
            <div class="tg-match">
                <div class="tg-matchdetail mt-2">
                    <div class="tg-box">
                        
                        <h3>$tour_name</h3>
                    </div>
                    
                    <div class="tg-box">
                    
                        <h3>$tour_date</h3>
                    </div>
                </div>
                
            </div>
        </div>
_END;
    }
}


?>