<?php
error_reporting(0);
$servername = "127.0.0.1";
$username = "root";
$password = "";
try{
    $conn = new PDO("mysql:host=$servername;dbname=fcpc_iris", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e){
    echo "Connection failed: " . $e->getMessage();
}

function isLoggedIn(){
        session_start();
        if( $_SESSION['___username_'] != NULL && $_SESSION['___userpass_'] != NULL ) return true;
        else return false;
    }
	
function isAdmin(){
        session_start();
        if($_SESSION['___usertype_'] == 30) return true;
        return false;
    }
?>

<?php if(isLoggedIn()){ ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FCPC - HRIS</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:300,400,700">
    <link rel="stylesheet" href="assets/fonts/ionicons.min.css">
    <link rel="stylesheet" href="assets/jquery.dataTables.min.css">
</head>

<body>
    <nav class="navbar navbar-dark navbar-expand-lg fixed-top bg-white portfolio-navbar gradient">
        <div class="container"><a class="navbar-brand logo" href="index.php">HRIS</a><button class="navbar-toggler" data-toggle="collapse" data-target="#navbarNav"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse"
                id="navbarNav">
                <ul class="nav navbar-nav ml-auto">
                    <li class="nav-item" role="presentation"><a class="nav-link active" href="index.php">Import</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link active" href="view1.php">View</a></li>
					<li class="nav-item" role="presentation"><a class="nav-link active" href="logout.php">Logout</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <main class="page contact-page">
        <section class="portfolio-block contact">
            <div class="container">
                <div class="heading">
                    <h2>Human Resource Information System</h2>
                    <h3>View Employees</h3>
                </div>
                <?php if(!isset($_GET['view'])){ ?>
                    <?php
                    function doGetEmployeeList(){
                        global $conn;
                        $stmt = $conn->prepare("SELECT * FROM employees ORDER by id DESC");
                        $stmt->execute();
                        return $stmt->fetchAll();
                    }
                    $employeeList = doGetEmployeeList(); 
                    
                    echo "
                        <table class='table table-striped' id='bwahaha'>
                        <thead>
                            <th>ID</td>
                            <th>First Name</th>
                            <th>Middle Name</th>
                            <th>Last Name</th>
                            <th>Action</th>
                        </thead><tbody>
                    ";
                    for($i=0;$i<count($employeeList);$i++){ ?>
                        <tr>
                            <td><?=$employeeList[$i]['id']?></td>
                            <td><?=$employeeList[$i]['first_name']?></td>
                            <td><?=$employeeList[$i]['middle_name']?></td>
                            <td><?=$employeeList[$i]['last_name']?></td>
                            <td><a href="view1.php?view=<?=$employeeList[$i]['id'];?>">View Data</a></td>
                        </tr>
                    


                    <?php }
                    echo "</tbody></table>";
                    ?>

                <?php }else{ ?>
                    <?php
                        function doGetEmployeeData($id){
                            global $conn;
                            $stmt = $conn->prepare("SELECT * FROM employees WHERE id=:id");
                            $stmt->BindParam(":id",$id);
                            $stmt->execute();
                            return $stmt->fetch();
                        }

                        $employeeData = doGetEmployeeData($_GET['view']);
						
						/*function UpdateEmployeeData
							global $conn;
							$stmt = $conn->prepare("UPDATE FROM employees");
							
						if(isset($_POST['action']))
						{
							if($_POST['action'] == "editemployee")
							{
								
							}
						}*/
                        if( $employeeData ){ ?>
                        <center> 
                            <h4>Viewing <?=$employeeData['first_name']?>'s Data</h4>
                            <small>
                                <a href="view1.php">< Back</a>
                            </small>
                        </center>
                        <BR>
						<?php if(isAdmin()){ ?>
                        <form method="POST" enctype="multipart/form-data">
						<input type = "hidden" name = "employeeid" value = "1" >
						<input type = "hidden" name = "action" value = "editemployee">
                            <div class="form-group">
                                <label for="first_name">First Name</label>
                                <input class="form-control item" type="text" id="first_name" name="first_name" value="<?=$employeeData['first_name']?>">
                            </div>
                            <div class="form-group">
                                <label for="middle_name">Middle Name</label>
                                <input class="form-control item" type="text" id="middle_name" name="middle_name" value="<?=$employeeData['middle_name']?>">
                            </div>
                            <div class="form-group">
                                <label for="last_name">Last Name</label>
                                <input class="form-control item" type="text" id="last_name" name="last_name" value="<?=$employeeData['last_name']?>">
                            </div>
                            <div class="form-group">
                                <label for="email_address">Email Address</label>
                                <input class="form-control item" type="text" id="email_address" name="email_address" value="<?=$employeeData['email_address']?>">
                            </div>
                            <div class="form-group">
                                <label for="birthday">Birthday</label>
                                <input class="form-control item" type="text" id="birthday" name="birthday" value="<?=$employeeData['birthday']?>">
                            </div>
                            <div class="form-group">
                                <label for="nationality">Nationality</label>
                                <input class="form-control item" type="text" id="nationality" name="nationality" value="<?=$employeeData['nationality']?>">
                            </div>
                            <div class="form-group">
                                <label for="civil_status">Civil Status</label>
                                <input class="form-control item" type="text" id="civil_status" name="civil_status" value="<?=$employeeData['civil_status']?>">
                            </div>
                            <div class="form-group">
                                <label for="gender">Gender</label>
                                <input class="form-control item" type="text" id="gender" name="gender" value="<?=$employeeData['gender']?>">
                            </div>
                            <div class="form-group">
                                <label for="mobile_number">Mobile Number</label>
                                <input class="form-control item" type="text" id="mobile_number" name="mobile_number" value="<?=$employeeData['mobile_number']?>">
                            </div>
                            <div class="form-group">
                                <label for="address">Address</label>
                                <textarea class="form-control item">
                                    <?=$employeeData['address']?>
                                </textarea>
							</div>
							<div class="form-group"><input type="submit" class="btn btn-primary btn-block btn-lg" value="Update"></div>
						<?php }
							else {
							?>
						<form method="POST" enctype="multipart/form-data">
						<input type = "hidden" name = "employeeid" value = "1" >
						<input type = "hidden" name = "action" value = "editemployee">
                            <div class="form-group">
                                <label for="first_name">First Name</label>
                                <input class="form-control item" type="text" id="first_name" name="first_name" value="<?=$employeeData['first_name']?>" readonly>
                            </div>
                            <div class="form-group">
                                <label for="middle_name">Middle Name</label>
                                <input class="form-control item" type="text" id="middle_name" name="middle_name" value="<?=$employeeData['middle_name']?>" readonly>
                            </div>
                            <div class="form-group">
                                <label for="last_name">Last Name</label>
                                <input class="form-control item" type="text" id="last_name" name="last_name" value="<?=$employeeData['last_name']?>" readonly>
                            </div>
                            <div class="form-group">
                                <label for="email_address">Email Address</label>
                                <input class="form-control item" type="text" id="email_address" name="email_address" value="<?=$employeeData['email_address']?>" readonly>
                            </div>
                            <div class="form-group">
                                <label for="birthday">Birthday</label>
                                <input class="form-control item" type="text" id="birthday" name="birthday" value="<?=$employeeData['birthday']?>" readonly>
                            </div>
                            <div class="form-group">
                                <label for="nationality">Nationality</label>
                                <input class="form-control item" type="text" id="nationality" name="nationality" value="<?=$employeeData['nationality']?>" readonly>
                            </div>
                            <div class="form-group">
                                <label for="civil_status">Civil Status</label>
                                <input class="form-control item" type="text" id="civil_status" name="civil_status" value="<?=$employeeData['civil_status']?>" readonly>
                            </div>
                            <div class="form-group">
                                <label for="gender">Gender</label>
                                <input class="form-control item" type="text" id="gender" name="gender" value="<?=$employeeData['gender']?>" readonly>
                            </div>
                            <div class="form-group">
                                <label for="mobile_number">Mobile Number</label>
                                <input class="form-control item" type="text" id="mobile_number" name="mobile_number" value="<?=$employeeData['mobile_number']?>" readonly>
                            </div>
                            <div class="form-group">
                                <label for="address">Address</label>
                                <textarea readonly class="form-control item">
                                    <?=$employeeData['address']?>
                                </textarea>
								
                            </div>
                        </form>
                        <?php } ?>
                    
                <?php }?>
			<?php }?>	
            </div>
        </section>
    </main>
    <footer class="page-footer">
        <div class="container">
            <div class="links"><p>Copyright &copy; 2018. FCPC Human Resource Information System</p></div>
        </div>
    </footer>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready( function () {
            $('#bwahaha').DataTable();
        } );
    </script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/theme.js"></script>
</body>

</html>

<?php } ?>
