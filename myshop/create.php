<?php
//call database field
$name="";
$email="";
$phone="";
$adress="";

$errorMessage="";
$successMessage="";

if ($_SERVER['REQUEST_METHOD'] == 'POST' ) {


    $name=$_POST["name"];
    $email=$_POST["email"];
    $phone=$_POST["phone"];
    $adress=$_POST["adress"];


    do {

        if (empty($name) || empty($phone) || empty($adress)) {
            $php_errormsg="AL THE FIELDS ARE REQUIRED!";
            break;

            # code...
        }
        // add new client to database

        $name="";
        $email="";
        $phone="";
        $adress="";

        $successMessage="CLIENT ADDED SUCCESSFULL!";
    } while (false);

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