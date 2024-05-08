<?php
require_once'../controller/DBController.php' ;
require_once'../controller/contactController.php' ;
require_once '../controller/authController.php' ;
require_once '../controller/settingController.php' ;
require_once '../controller/chatController.php' ;


session_start() ;
$db=new DBController ;
$con=new contact ;
$us=new register ;
$profile=new myprofile ;

// $phone=1276736746 ;
// $id=$con->checkBlock(16,51) ;

// echo 'user id :' .$id['isBlocked'];

// $con=new contact ;
$mess=new message ;
$mess->retrieveMessages(1);
session_start();
$id=$_SESSION['user_id'] ;
echo $id['id'];
?>

<!-- // if($con->searchByNumber($phone)!=null){

// $_SESSION['user_id']= $us->getIDByPhone($phone) ;
// $id=$_SESSION['user_id'] ;

// echo 'user id:'.$id['id'];
// }
// else
// echo 'error' ;


// $id=$_SESSION['user_id'] ;


// $phone = $_SESSION['phone'];
// $firstName = $_SESSION['firstName'];
// $lastName = $_SESSION['lastName'];
// $email = $_SESSION['email'];
// $country = $_SESSION['country'];
// $gender = $_SESSION['gender'];







// echo $firstName ; -->
<!-- <div class="col-md-6">

    <div class="card card-bordered">

        <div class="card-header">
            <a href="home.html">
                <i class="fas fa-chevron-circle-left back-btn" aria-hidden="true"></i> </a>

            <h4 class="caller name"><strong>Thomas Maurice</strong></h4>
        </div>

       

            </div>
        </div>
    </div>
    <div class="ps-scrollbar-x-rail" style="left: 0px; bottom: 0px;">
        <div class="ps-scrollbar-x" tabindex="0" style="left: 0px; width: 0px;"></div>
    </div>
    <div class="ps-scrollbar-y-rail" style="top: 0px; height: 0px; right: 2px;">
        <div class="ps-scrollbar-y" tabindex="0" style="top: 0px; height: 2px;"></div>
    </div>
</div>
 -->


<section class="contacts-library">
    <?php foreach($mess as $row): ?>

    <ul class="contacts-list">






        <div class="contact-section">
            <li class="list__item">
                <p class="contact-name"><?php  
                                
                                echo $row['text'] ;
                                ?></p>
            </li>

            <li class="list__item">
                <a href="edit.html"><i class="fas fa-minus-circle add"></i></a>
            </li>
        </div>

        <hr>
    </ul>
    <?php endforeach; ?>
</section>