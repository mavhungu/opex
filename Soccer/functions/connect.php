<?php
$con = mysqli_connect("localhost","root","","gctta");
if(!$con){
    echo "Error in connection";
};

session_start();
ob_start();

function login(){

    if(isset($_POST['submit'])){

        $email = strtolower($_POST['username']);
        $password = strtolower($_POST['password']);
        global $con;

        $query = ("SELECT * FROM users WHERE user_name='$email' AND user_pass='$password'");
        $result = mysqli_query($con,$query);

        $count = mysqli_num_rows($result);
        if($count == 0){
            echo "Nothing has been found";
        }

        while($row = mysqli_fetch_assoc($result)){
            $id = $row['user_id'];
            $role = $row['role'];
            $username = $row['user_name'];
            $email = $row['user_pass'];

            echo $role;

            switch ($role){

                case 0:
                    $_SESSION['user_id'] = $id;
                    $_SESSION['user_name'] = $username;
                    $_SESSION['role'] = $role;
                    $_SESSION['user_pass'] = $email;
                    header('Location:admin_pages/index.php');
                    ob_end_flush();
                    break;
                case 1:
                    $_SESSION['user_id'] = $id;
                    $_SESSION['user_name'] = $username;
                    $_SESSION['role'] = $role;
                    $_SESSION['user_pass'] = $email;
                    header('Location:users_pages/index-2.php');
                    ob_end_flush();
            }
        }
        $con->close();
    }
};

function logout(){
    if(isset($_POST['logout'])) {
        if (isset($_SESSION['user_name'])) {
            destroySession();
        }
    }
};

function destroySession(){

    $_SESSION=array();

    if (session_id() != "" || isset($_COOKIE[session_name()]))
        setcookie(session_name(), '', time()-2592000, '/');

    session_destroy();

    header('Location:../index.php');

};
function junior_adding(){
    if(isset($_POST['junior_submit'])){

        $junior_ac_number = $_POST['acc'];
        $junior_name = $_POST['name'];
        $junior_surname = $_POST['surname'];
        $junior_assoc = $_POST['assoc'];
        $junior_club = $_POST['club'];
        $junior_id_number = $_POST['id_number'];
        $junior_under = $_POST['under'];
        $junior_double = $_POST['double'];
        $junior_paring = $_POST['paring'];
        $junior_fee = $_POST['fees'];

        //echo $junior_paring;

        global $con;

        $q = mysqli_query($con,"INSERT INTO junior(junior_ac_number,junior_name,junior_surname,junior_assoc,junior_club,junior_id_number,junior_under,junior_double,junior_paring,junior_fee)
         VALUES('$junior_ac_number','$junior_name','$junior_surname','$junior_assoc',' $junior_club','$junior_id_number','$junior_under','$junior_double','$junior_paring','$junior_fee')");
         if($q){
            header("Location:index-2.php");
            ob_flush();
         }
    }
};



function senior_double(){
    global $con;
    $q = mysqli_query($con, "select * from junior");
    while($row = mysqli_fetch_assoc($q)){
        $r = $row['juniour_paring'];
        $rq = $row['juniour_paring'];
        $re = $row['juniour_paring'];
        $ra= $row['juniour_paring'];
        $rs = $row['juniour_paring'];

        echo <<<_END
        <tr><td> $r </td></tr>
_END;
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