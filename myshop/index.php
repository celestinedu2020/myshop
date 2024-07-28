<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My shop</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">

</head>
<body style="background-color:dimgrey;">
    <div class="container my-5">
<h2>List of Clients</h2>
<a class="btn btn-primary" href="/myshop/create.php" role="button">New Client</a>
<br>
<table class="table">
    <thead>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Address</th>
        <th>Created At</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>
        
        <?php

use LDAP\Result;

        $servername="localhost";
        $username="root";
        $password="";
        $database="myshop";
        //create connection
        $connection= new mysqli($servername,$username,$password,$database);
        // check connection
        if ($connection->connect_error) {
            die("connection failed:".$connection->connect_error);
            # code...
        }
        //read all rows from databasee table
        $sql="SELECT * FROM clients";
        $result=$connection->query($sql);

        if (!$result) {
            # code...
            die("invalid query:" . $connection->error);
        }
        while($row=$result->fetch_assoc())
        {
            echo "
            <tr>
        <td>$row[id]</td>
        <td>$row[name]</td>
        <td>$row[email]</td>
        <td>$row[phone]</td>
        <td>$row[adress]</td>
        <td>$row[create_at]</td>
        <td>
            <a class='btn btn-primary btn-sm' href='/myshop/edit.php?id=$row[id]'>Edit</a>
            <a class='btn btn-primary btn-sm' href='/myshop/delet.php?id=$row[id]'>Delet</a>
        </td>
        </tr>
        ";
        }



        ?>
        
    </tbody>
</table>
    </div>
    
</body>
</html>