<?php
$servername="localhost";
$username="root";
$password="";
$database="myshop";
//create connection
$connection=new mysqli($servername,$username,$password,$database);
$id="";
$name="";
$email="";
$phone="";
$adress="";
 
$errorMessage="";
$successMessage="";

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    # Get method show the data of the client

    if (!isset($_GET["id"])) {
        header("location:/myshop/index.php");
        exit;
        # code...
    }
    $id=$_GET["id"];
$sql="SELECT * FROM clients WHERE id=$id";
$result=$connection->query($sql);
$row=$result->fetch_assoc();

if (!$row) {
    header("location:/myshop/index.php");
    exit;

    # code...
}
$name=$row["name"];
$name=$row["email"];
$name=$row["phone"];
$name=$row["adress"];
}
else {
    $name=$_POST["name"];
    $email=$_POST["email"];
    $phone=$_POST["phone"];
    $adress=$_POST["adress"];

    do {
        # code...
        if (empty($id) || empty($name) || empty($email) || empty($phone) || empty($adress)) {
            $errorMessage="ALL THE Field are Required";
            break;

            # code...
        }
        $sql= "UPDATE clients" . 
        "SET name='$name',email='$email',phone='$phone',adress='$adress' " . 
        "WHERE id=$id";

        $result=$connection->query($sql);

        if (!$result) {
            $errorMessage="Invalid Query:" . $connection->error;
            break;

            # code...
        }
        $successMessage="CLIENT Updated correctly";
        header("location:/myshop/index.php");
        exit;
    } while (true);

    # code...
}
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <title>My shop</title>
</head>
<body>

    <div class="container my-5">
        <h2>New Client</h2>
        <?php
        if (!empty($errorMessage)) {
            echo"
            <div class='alert alert-warning alert-dismissible fade show'role='alert'>
            <strong>$errorMessage</strong>
            <button type='button' class='btn-close'data-bs-dismiss='alert'aria-label='close></div>
            ";
            # code...
        }
        ?>
        <form method="post">
            <input type="hiden" value="<?php echo $id; ?>">
        
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Name</label>
                <div class="col-sm-6">
                
                    <input type="text" class="form-control" name="name" value="<?php echo $name; ?>" > 
                </div>

            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Email</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="email" value="<?php echo $email; ?>" ">
                </div>

            </div>
            
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Phone</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="phone" value="<?php echo $phone; ?>" ">
                </div>

            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Address</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="adress" value="<?php echo $adress; ?>" ">
                </div>

            </div>

            <?php
if (!empty($successMessage)) {
    # code...
}

?>
            <div class="row mb-2">
</div class="offset-sm-3 col-sm-3 d-grid">
<button type="submit" class="btn btn-primaary">Submit</button>
            </div>
            <div class="row mb-3">
</div class="offset-sm-3 col-sm-3 d-grid">
<a type="submit" class="btn btn-primary" href="/myshop/index.php" role="button">Cancel</a>
            
                
    
            
        </form>
    </div>
    
</body>
</html>