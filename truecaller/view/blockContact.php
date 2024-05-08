<?php
require_once '../controller/contactController.php' ;
$con=new contact ;
session_start();
$id=$_SESSION['user_id'] ;
$contactName = $_SESSION['contactName'];
$contactId=$_SESSION['contactId'];

$con->block($contactId,$id['id']);
// // Check if the code has already been executed
// if (!isset($_SESSION['code_executed'])) {
//     // Code to be executed once goes here
//     $con->block($contactId,$id['id']);

//     // Set the session variable to indicate that the code has been executed
//     $_SESSION['code_executed'] = true;
// }
//  $isBlocked=$con->checkBlock($contactId,$id['id']);
//  $isBlocked2=$con->checkBlock($id['id'],$contactId);







?>
<!DOCTYPE html>
<html>

<head>
    <title>Contact Blocked</title>
    <style>
    body {
        background-color: #f2f2f2;
        font-family: Arial, Helvetica, sans-serif;
        font-size: 16px;
    }

    .container {
        margin: 50px auto;
        max-width: 600px;
        padding: 20px;
        background-color: #fff;
        border-radius: 5px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, .1);
    }

    h1 {
        font-size: 24px;
        margin-top: 0;
    }

    p {
        margin: 20px 0;
    }

    .alert {
        background-color: #f8d7da;
        border: 1px solid #f5c6cb;
        color: #721c24;
        padding: 10px;
        border-radius: 5px;
        font-weight: bold;
    }

    .button {
        background-color: #4CAF50;
        border: none;
        color: white;
        padding: 15px 32px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        border-radius: 5px;
        cursor: pointer;
    }

    .button:hover {
        background-color: #3e8e41;
    }
    </style>
</head>

<body>
    <div class="container">
        <h1><?php echo $contactName ?> Contact Blocked</h1>
        <p class="alert">This contact has been blocked.</p>
        <p>If you would like to unblock this contact, please contact support.</p>

        <form method="post" action="
        <?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $con->unBlock($contactId,$id['id']);
    header("location:profile.php") ;
}



?>
        
        
        
        ">
            <button type="submit" class="button">Tap to Unblock</button>
        </form>
    </div>
</body>

</html>