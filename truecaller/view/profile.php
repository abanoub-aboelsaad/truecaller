<?php
require_once '../controller/contactController.php' ;
$con=new contact ;
session_start();
$id=$_SESSION['user_id'] ;
$contactName = $_GET['contactName'];
 $contactId=$_GET['contactId'];
   $contactNumber=$_GET['contactNumber'];
   $_SESSION['contactNumber']=$contactNumber ;
 $isBlocked=$con->checkBlock($contactId,$id['id']);
 $isBlocked2=$con->checkBlock($id['id'],$contactId);




?>
<script>
function showAlert() {
    var message = "Contact has been blocked!";
    alert(message);
}
</script>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="profile.css">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter&display=swap" rel="stylesheet">

    <script src="https://kit.fontawesome.com/6b20b1c14d.js" crossorigin="anonymous"></script>
    <title>Contact Profile</title>
</head>

<body>
    <div class="container">
        <header class="hero">
            <a href="home.php">
                <i class="fas fa-chevron-circle-left back-btn"></i>
            </a>
            <div class="hero-info">
                <h1 class="name"><?php echo $contactName;  
                ?></h1>

            </div>
        </header>

        <section class="contact-info">

            <div class="info-line">
                <form method="post" action="<?php
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['makecall'])) {
            if ($isBlocked['isBlocked'] == 1 || $isBlocked2['isBlocked'] == 1) {
                header("location:ifblocked.php");
            } else {
                $_SESSION['sender_id'] = $id['id'];
                $_SESSION['reciever_id'] = $contactId;
                $_SESSION['contactName'] = $contactName;
                header("location:call.php");
            }
        }
    ?>">
                    <i class="fas fa-phone icon-gradient"></i>
                    <button class="button" type="submit" name="makecall">Call</button>
                </form>
            </div>

            <div class="info-line">
                <form method="post" action="<?php
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['makechat'])) {
            if ($isBlocked['isBlocked'] == 1 || $isBlocked2['isBlocked'] == 1) {
                header("location:ifblocked.php");
            } else {
                $_SESSION['sender_id'] = $id['id'];
                $_SESSION['reciever_id'] = $contactId;
                header("location:chat.php");
            }
        }
    ?>">
                    <i class="fas fa-sms icon-gradient"></i>
                    <button class="button" type="submit" name="makechat">Chat</button>
                </form>
            </div>


            <div class="info-line">
                <a
                    href="blockContact.php?contactId=<?php echo urlencode($contactId); ?>&contactName=<?php echo urlencode($contactName);  ?>">
                    <i class="fas fa-ban icon-gradient"></i>
                    <button class="button" type="submit" name="block_btn">Block</button>

                </a>
            </div>

            <div class="info-line">
                <a
                    href="blockContact.php?contactId=<?php echo urlencode($contactId); ?>&contactName=<?php echo urlencode($contactName);  ?>">
                    <i class="fas fa-ban icon-gradient"></i>
                    <button class="button" type="submit" name="block_btn">favourite</button>

                </a>
            </div>





            <!-- <section class="info-line">
                <a href="profile.php">
                    <i class="fas fa-heart icon-gradient"></i>
                    <button class="button"
                        onclick=" //<?php //$con->makefavorite($contactId,$id['id']); ?>">favorite</button>
                </a>
            </section> -->

</body>

</html>