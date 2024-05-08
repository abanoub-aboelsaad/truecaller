<?php

require_once '../controller/authController.php' ;




session_start();

$us= new register ;

$phone = $_SESSION['phone'];
    if (isset($_POST['submit'])) {
        $inputValue = $_POST['code'];
        $acceptedValues = array("1234", "5678", "0258");
        if (strlen($inputValue) === 4 && in_array($inputValue, $acceptedValues)) {
          if($us->getDataByPhone($phone)!=null){
           
           
            $data = $us->getDataByPhone($phone) ;
            
            $_SESSION['user_id'] = $data ;
            $_SESSION['firstName'] = $data['firstName'];
            $_SESSION['lastName'] = $data['lastName'];
            $_SESSION['email'] = $data['email'];
            $_SESSION['country'] = $data['country'];
            $_SESSION['gender'] =$data['gender'];
           

            
                 header("Location:home.php");
                 exit() ;
        }
          else
          {  
            header("Location:user.php");
            exit();
          }
        }
    }
?>
<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="styles.verify.css">
</head>

<body>
    <div class="wrapper">
        <div class="logo">
            <img src="truecaller.png" alt="">
        </div>
        <div class="text-center mt-4 name">
            verification
        </div>
        <form class="p-3 mt-3" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

            <div class="form-field d-flex align-items-center">
                <span class="fas fa-key"></span>
                <input name="code" type="text" id="code" placeholder="write the code" required>
                <title>VERIFY</title>
            </div>
            <button class="btn mt-3" type="submit" name="submit"> Verify </button>
            <button class="btn mt-3" type="button" onclick="window.location.href = 'index.login.html';">
                resend </button>
        </form>
    </div>



</body>

</html>