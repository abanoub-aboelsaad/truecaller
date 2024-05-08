<?php


require_once '../controller/DBController.php' ;



class contact 
{
     private $userid;
     protected $db ;
    //  public function getAllContacts()
    //  {
    //       $this->db=new DBController;
    //       if($this->db->openConnection())
    //       {
    //          $query="select contact.id,contactName,contactNumber,isBlocked,isFavorite from contact where contact.id=contact.user_id ;";
    //          return $this->db->select($query);
    //       }
    //       else
    //       {
    //          echo "Error in Database Connection";
    //          return false; 
    //       }
    //  }
    // public function addContact(Contact $contact)

    // {
    //      $this->db=new DBController;
    //      if($this->db->openConnection())
    //      {
    //         $query="insert into contact values ('',$contact-> contactName','$contact-> contactNumber','$contact-> contactNickName','$contact-> isBlocked','$contact-> isFavorite')";
    //          $this->db->insert($query);
    //      }
    
    //      else
    //      {
    //         echo "Error in Database Connection";
    //         return false; 
    //      }

    // }
public function importContacts($cid){
    $this->db=new DBController;
    if($this->db->openConnection()){
        $query="insert into contactlist (user_id,mobile_number,name)
        SELECT user_id,contactNumber,contactName
        FROM contact
        WHERE user_id=$cid;" ;

        
        $this->db->insert($query);

     
    }
    else 
    {
        echo"error in databse connection" ;
        return false ;

    }
}

//     public function insertuser(){
//         $this->db=new DBController;
//         if($this->db->openConnection()){
//             $sql = "INSERT INTO user(firstName, lastName,nickName,phoneNumber,verificationCode)
//             VALUES ('bbbb', 'mmmm', 'ggg',01284980936,123)";
//             echo 'inserted succesfully';
//            $this->db->insert($sql);
            
            
//         }
      
//         else 
//         {
//             echo"error in databse connection" ;
//             return false ;
    
//         }



    

// }
public function addContact($name,$number,$isfavourite,$isblock,$user_id)
    {
       


       

         $this->db=new DBController;
         if($this->db->openConnection())
         
         {
            $query="insert into contact(contactName,contactNumber,isBlocked,isFavorite,user_id) 
             values ('$name','$number',$isfavourite,$isblock,$user_id)";
              $this->db->insert($query);
         }
    
         else
         {
            echo "Error in Database Connection";
            return false; 
         }

    }
    
    


public function searchByNumber($number)
    {
       


       

         $this->db=new DBController;
         if($this->db->openConnection())
         
         {
            $query = "SELECT name FROM contactlist WHERE mobile_number LIKE '%" . $number . "%'";
              
             return $this->db->selectOne($query); 
         }
    
         else
         {
            echo "Error in Database Connection";
            return false; 
         }

    }
  
    public function retrieveContacts($id)
    {
         $this->db=new DBController;
         if($this->db->openConnection())
         {
            $query="SELECT contactName,id,contactNumber FROM contact WHERE user_id ='   $id '    ";

             $contacts=$this->db->select($query);

             return $contacts ;
             
         }
         else
         {
            echo "Error in Database Connection";
            return false; 
         }
    }
    public function retrieveBlockedContacts($user_id)
    {
         $this->db=new DBController;
         if($this->db->openConnection())
         {
            $query="SELECT contactName FROM contact WHERE user_id ='$user_id' and isBlocked='1'    ";

             $contacts=$this->db->select($query);

             return $contacts ;
             
         }
         else
         {
            echo "Error in Database Connection";
            return false; 
         }
    }
    public function makefavorite($contactid,$user_id)
    {
         $this->db=new DBController;
         if($this->db->openConnection())
         {
            $query="UPDATE contact SET isFavorite = '1' WHERE id = '$contactid' and user_id= '$user_id '  ";
             $this->db->update($query);
             echo'done' ;
         }
         else
         {
            echo "Error in Database Connection";
            return false; 
         }
    }
    public function block($contactid,$user_id)
    {
         $this->db=new DBController;
         if($this->db->openConnection())
         {
            $query="UPDATE contact SET isBlocked = '1' WHERE id = '$contactid' and user_id= '$user_id ' ";
             $this->db->update($query);
             
         }
         else
         {
            echo "Error in Database Connection";
            return false; 
         }
    } 
    public function unBlock($contactid,$user_id)
    {
         $this->db=new DBController;
         if($this->db->openConnection())
         {
            $query="UPDATE contact SET isBlocked = '0' WHERE id = '$contactid' and user_id= '$user_id ' ";
             $this->db->update($query);
             
         }
         else
         {
            echo "Error in Database Connection";
            return false; 
         }
    }
    public function checkBlock($contactid,$user_id)
    {
         $this->db=new DBController;
         if($this->db->openConnection())
         {
            $query="select isBlocked from contact  WHERE id = $contactid and user_id= $user_id ";
            return $this->db->selectOne($query);
             
         }
         else
         {
            echo "Error in Database Connection";
            return false; 
         }
    } 



    

    public function unfavorite()
    {
         $this->db=new DBController;
         if($this->db->openConnection())
         {
            $query= "UPDATE contact SET isFavorite = '0' WHERE id =id;";
             $this->db->insert($query);
         }
         else
         {
            echo "Error in Database Connection";
            return false; 
         }
    }

}
   
    








?>