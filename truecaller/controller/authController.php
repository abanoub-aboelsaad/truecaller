<?php


require_once '../controller/DBController.php' ;
// require_once '../view/functions.php' ;



class register 
{
    protected $db ;

public function makeProfile($phone,$firstName,$lastName,$email,$country,$gender){
    $this->db=new DBController;
            if($this->db->openConnection()){
                $sql = "INSERT INTO user (firstName,lastName,phoneNumber,verificationCode, email, country, gender) 
                VALUES ('$firstName','$lastName','$phone',1234 ,'$email', '$country', '$gender')" ;
                echo 'inserted succesfully';
               $this->db->insert($sql);
                
                
            }
          
            else 
            {
                echo"error in databse connection" ;
                return false ;
        
            }


    

}
public function getUser_id($firstName,$lastName,$phone){
    $this->db=new DBController;
            if($this->db->openConnection()){
                $sql = "SELECT id FROM user WHERE firstName = '$firstName' and lastNAme= '$lastName' and phoneNumber=$phone"; 
               
                echo 'inserted succesfully';
              return $this->db->selectOne($sql);
                
                
            }
          
            else 
            {
                echo"error in databse connection" ;
                return false ;
        
            }


    

}
public function getDataByPhone($phone){
    $this->db=new DBController;
            if($this->db->openConnection()){
                $sql = "SELECT id,firstName,lastName,phoneNumber,email,country,gender FROM user Where phoneNumber=$phone"; 
               
                echo 'inserted succesfully';
              return $this->db->selectOne($sql);
                
                
            }
          
            else 
            {
                echo"error in databse connection" ;
                return false ;
        
            }


    

}
public function getDataById($id){
    $this->db=new DBController;
            if($this->db->openConnection()){
                $sql = "SELECT id,firstName,lastName,phoneNumber,email,country,gender FROM user Where id=$id"; 
               
                echo 'inserted succesfully';
              return $this->db->selectOne($sql);
                
                
            }
          
            else 
            {
                echo"error in databse connection" ;
                return false ;
        
            }


    

}
// public function searchByNumberInUser($number)
//     {
       


       

//          $this->db=new DBController;
//          if($this->db->openConnection())
         
//          {
//             $query = "SELECT name FROM user WHERE phoneNumber= '$number' ";
              
//              return $this->db->selectOne($query); 
//          }
    
//          else
//          {
//             echo "Error in Database Connection";
//             return false; 
//          }

//     }






}

?>