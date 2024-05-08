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







// $sender_id=$id['id'] ;


$messages=$mess->retrieveMessages($id['id'],$contactID);

// $firstName = $_SESSION['firstName'];


// echo $id['id'];
// $contacts=$con->retrieveContacts($id['id']);
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdn.tutorialjinni.com/intl-tel-input/17.0.8/css/intlTelInput.css" />
    <script src="https://cdn.tutorialjinni.com/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter&display=swap" rel="stylesheet">

    <script src="https://kit.fontawesome.com/6b20b1c14d.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" type="text/css" href="chat.css">
</head>

<body>
    <div class="page-content page-container" id="page-content">
        <div class="padding">
            <div class="row container d-flex justify-content-center">
                <div class="col-md-6">
                    <div class="card card-bordered">
                        <div class="card-header">
                            <a href="profile.php">
                                <i class="fas fa-chevron-circle-left back-btn" aria-hidden="true"></i>
                            </a>
                            <h4 class="caller name"><strong><?php 
                            echo $contactName ;
                            // echo $data['id'] ;
                            // echo $contactNumber ;
                            ?>
                                </strong></h4>
                        </div>
                        <div class="ps-container ps-theme-default ps-active-y" id="chat-content"
                            style="overflow-y: scroll !important; height:400px !important;">
                            <?php foreach ($messages as $row) : ?>
                            <div class="media-body">
                                <p>

                                    <?php 
                                    echo $row['text']; 
                                    ?>
                                </p>
                            </div>
                            <?php endforeach; ?>
                        </div>
                        <div class="ps-scrollbar-x-rail" style="left: 0px; bottom: 0px;">
                            <div class="ps-scrollbar-x" tabindex="0" style="left: 0px; width: 0px;"></div>
                        </div>
                        <div class="ps-scrollbar-y-rail" style="top: 0px; height: 0px; right: 2px;">
                            <div class="ps-scrollbar-y" tabindex="0" style="top: 0px; height: 2px;"></div>
                        </div>
                    </div>
                    <form method="post" action="<?php
                        require_once '../controller/DBController.php';
                        require_once '../controller/chatController.php';

                        $db = new DBController;
                        $mess = new message;
                       
                        $voice = "ttt";
                        $isVoice = 0;

                        if ($_SERVER["REQUEST_METHOD"] == "POST") {
                            $text = $_POST['txt'];
                            $mess->sendMessage($id['id'],$data['id'],$text,$voice,$isVoice);
                        }
                    ?>">
                        <div class="publisher bt-1 border-light">
                            <input class="publisher-input" type="text" name="txt" placeholder="message">
                            <a class="publisher-btn" href="#" data-abc="true"><i class="fa fa-microphone"></i></a>
                            <button type='submit' class="publisher-btn text-info" href="#" data-abc="true"><i
                                    class="fa fa-paper-plane"></i></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- el function de java 3'irha nta b2a lE php good luck from BOBA😘-->
    <!-- <script>
        const chatContent = document.getElementById('chat-content');
        const input = document.querySelector('.publisher-input');
        const sendBtn = document.querySelector('.publisher-btn.text-info');

        sendBtn.addEventListener('click', () => {
            const message = input.value.trim();
            if (message) {
                const p = document.createElement('p');
                p.textContent = message;
                chatContent.appendChild(p);
                input.value = '';
                chatContent.scrollTop = chatContent.scrollHeight;
            }
        });
    </script> -->
</body>

</html>