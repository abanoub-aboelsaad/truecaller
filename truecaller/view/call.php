<?php
require_once '../controller/DBController.php';
require_once '../controller/chatController.php';
require_once '../controller/authController.php' ;
// $con=new contact ;
$mess = new message;
$reg=new register ;

session_start();
$id = $_SESSION['user_id'];
$reciever_id=$_SESSION['reciever_id'];
$contactName=$_SESSION['contactName'];
$contactNumber=$_SESSION['contactNumber'];
$data=$reg->getDataByPhone($contactNumber);
$contactID=$data['id'];
$mess->sendCall($id['id'],$contactID);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter&display=swap" rel="stylesheet">

    <script src="https://kit.fontawesome.com/6b20b1c14d.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="call.css">
</head>

<body>
    <div class="call-container">
        <div class="call-info">
            <h2><?php
echo $contactName ;
            ?>
            </h2>
            <p><?php
echo $contactNumber ;
            ?></p>
        </div>
        <div class="call-buttons">
            <button class="green"><i class="fas fa-microphone"></i></button>
            <button type="submit" onclick="window.location.href = 'profile.php';" class="red"><i
                    class="fas fa-phone"></i></button>

        </div>
    </div>
</body>

</html>