<?php
require_once 'functions/connect.php';
?>
<!doctype html>
<html lang="en">
  <head>
    <title>loginpage</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/solid.css" integrity="sha384-ioUrHig76ITq4aEJ67dHzTvqjsAP/7IzgwE7lgJcg2r7BRNGYSK0LwSmROzYtgzs" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/fontawesome.css" integrity="sha384-sri+NftO+0hcisDKgr287Y/1LVnInHJ1l+XC7+FOabmTTIK0HnE2ID+xxvJ21c5J" crossorigin="anonymous" />
    <link rel="stylesheet" href="plugins/fontawesome/css/all.min.css" />
    <link href="https://fonts.googleapis.com/css?family=Abel&display=swap" rel="stylesheet" />
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
      <nav class="navbar navbar-expand-sm navbar-dark bg-primary">
          <a class="navbar-brand" href="#">GCTTA</a>
          <!--button-- class=""></!--button-->
              <i class="fa fa-bars navbar-toggler d-lg-none bg-dark" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId"
              aria-expanded="false" aria-label="Toggle navigation"></i>
          <div class="collapse navbar-collapse" id="collapsibleNavId">
              <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                  <!--li class="nav-item active">
                      <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                  </li>
                  <!--li class="nav-item">
                      <a class="nav-link" href="#">Link</a>
                  </li>
                  <!--li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle" href="#" id="dropdownId" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dropdown</a>
                      <div class="dropdown-menu" aria-labelledby="dropdownId">
                          <a class="dropdown-item" href="#">Action 1</a>
                          <a class="dropdown-item" href="#">Action 2</a>
                      </div>
                  </li-->
              </ul>
              <form class="form-inline my-2 my-lg-0">
                  <!--input class="form-control mr-sm-2" type="text" placeholder="Search"-->
                  <a href="#" data-toggle="dropdown" id="navbarDropdownMenuLink">
                    <i class="fa fa-user my-2 mr-2 my-sm-0 text-light"></i>
                    </a>
                  <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="#"><i class="fas fa-user-cog"></i> Profile</a>
                        <a class="dropdown-item" href="#"><i class="fas fa-cog"></i> Settings</a>
                        <a class="dropdown-item" href="#"><i class="fas fa-sign-out-alt"></i> Logout</a>
                  </div>
                  
              </form>
          </div>
      </nav>
        <section class="app-form">
            <div class="container-fluid">
                <div class="row justify-content-center align-items-center text-center">
                    <div class="col-md-6">
                        <div class="form mt-5">
                            <div class="form-group">
                              <label for=""></label>
                              <input type="email" name="email" id="" class="form-control" placeholder="Email" aria-describedby="helpId">
                              <small id="helpId" class="text-muted"></small>
                            </div>
                            <div class="form-group">
                                <label for=""></label>
                                <input type="password" name="password" id="" class="form-control" placeholder="Password" aria-describedby="helpId">
                                <small id="helpId" class="text-muted"></small>
                              </div>
                              <div class="form-group">
                                <botton class="btn btn-primary btn-lg" name="login"><i class="fa fa-user"></i> Login</button>
                              </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </section>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>