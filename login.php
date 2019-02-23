<?php
//error_reporting(0);
require "db.php";
session_start();
print_r( $_SESSION );
if( $_SESSION ) return header( "Location: /home.php" );
    if( $_POST ) {
        $uname = $_POST[ "username" ];
        $pass = $_POST[ "userpass" ];

        $query = "select * from users where username=\"$uname\"";
        $res = $con->query( $query )->fetch_assoc();        
        $redr = "/login.php";
        if( $res ) {
            $data = $res;
            if( $data[ "userpass" ] == $pass ) {
                $_SESSION[ "user_id" ] = $data[ "user_id" ];
                $_SESSION[ "username" ] = $data[ "username" ];
                $redr = "/home.php";
            }
        }

        header( "Location: $redr" );
    }
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FCPC - HRIS</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:300,400,700">
    <link rel="stylesheet" href="assets/fonts/ionicons.min.css">
</head>

<body>
    <nav class="navbar navbar-dark navbar-expand-lg fixed-top bg-white portfolio-navbar gradient">
        <div class="container"><a class="navbar-brand logo" href="login.php">HRIS</a><button class="navbar-toggler" data-toggle="collapse" data-target="#navbarNav"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse"
                id="navbarNav">
                <ul class="nav navbar-nav ml-auto">
                </ul>
            </div>
        </div>
    </nav>
    <main class="page contact-page">
        <section class="portfolio-block contact">
            <div class="container">
                <div class="heading">
                    <h2>FCPC IRIS</h2>
                    <p><small>
						</small></p>
                </div>
                <form method="POST" enctype="multipart/form-data">
                    <input type="hidden" value="Meow" name="login">
                    <div class="form-group">
                        <label for="Username">Username</label>
                        <input class="form-control item" type="text" id="username" name="username" placeholder ="Username">
                    </div>
					<div class="form-group">
                        <label for="Username">Password</label>
                        <input class="form-control item" type="password" id="userpass" name="userpass" placeholder ="Password">
                    </div>
                    <div class="form-group"><input type="submit" class="btn btn-primary btn-block btn-lg" value="Login"></div>
                </form>
            </div>
        </section>
    </main>
    <footer class="page-footer">
        <div class="container">
            <div class="links"><p>Copyright &copy; 2018. FCPC Human Resource Information System</p></div>
        </div>
    </footer>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/theme.js"></script>
</body>

</html>