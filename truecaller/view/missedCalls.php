<?php
require_once '../controller/DBController.php';
require_once '../controller/chatController.php';
require_once '../controller/authController.php' ;
// $con=new contact ;
$mess = new message;
$reg=new register ;

session_start();
$id = $_SESSION['user_id'];








// $sender_id=$id['id'] ;


$messages=$mess->retrieveCall($id['id']);
$callerId=$messages[0]['sender_id'] ;
$data=$reg->getDataById($callerId);





?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>You have missed a call from <?php echo $contactName; ?></title>
    <style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f0f0f0;
    }

    h1 {
        font-size: 2em;
        margin-top: 50px;
        text-align: center;
        color: #333333;
        text-shadow: 1px 1px #cccccc;
    }
    </style>
</head>

<body>

    <div class="media-body">

        <h1>You have missed a call from<?php 
        if($data['firstName']!=null)
        echo " ".$data['firstName'] ; 
        else
        echo 'no missed calls' ;
                                    ?>
        </h1>

    </div>



    <!-- Rest of your page content goes here -->
</body>

</html>