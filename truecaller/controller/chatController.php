<?php

require_once '../controller/DBController.php' ;


class message
{
   //  private $userid;
     protected $db ;



     public function sendMessage($sender_id, $reciever_id, $text, $voice, $isVoice)
     {
         $this->db = new DBController;
         if ($this->db->openConnection()) {
             $query = "INSERT INTO chat (sender_id, reciever_id, text, voice, isVoice)
              VALUES ($sender_id, $reciever_id, '$text', '$voice', $isVoice)";
             $this->db->insert($query);
         } else {
             echo "Error in Database Connection";
             return false;
         }
     }
     public function sendCall($sender_id,$reciever_id)
     {
         $this->db = new DBController;
         if ($this->db->openConnection()) {
            $query = "INSERT INTO `call` (`sender_id`, `reciever_id`,`called`) VALUES ('$sender_id', '$reciever_id',1)";
             
             $this->db->insert($query);
         } else {
             echo "Error in Database Connection";
             return false;
         }
     }



// public function getLastestMessage()
//     {
             
//          $this->db=new DBController;
//          if($this->db->openConnection())
         
//          {
//             $query="SELECT text FROM message ORDER BY id DESC LIMIT 1";
//               $this->db->displayOne($query);

//          }

//          else
//          {
//             echo "Error in Database Connection";
//             return false; 
// }
// }
public function retrieveMessages($sender,$reciever)
    {
         $this->db=new DBController;
         if($this->db->openConnection())
         {
            $query="SELECT text 
            FROM chat 
            WHERE (reciever_id = $reciever AND sender_id = $sender) 
                OR (reciever_id = $sender AND sender_id = $reciever)   ";

             $contacts=$this->db->select($query);

             return $contacts ;
             
         }
         else
         {
            echo "Error in Database Connection";
            return false; 
         }
    }
    public function retrieveCall($myid)
    {
         $this->db=new DBController;
         if($this->db->openConnection())
         {
            $query = "SELECT sender_id
            FROM `call`
            WHERE (reciever_id = '$myid'  AND called=1) ";

             $contacts=$this->db->select($query);

             return $contacts ;
             
         }
         else
         {
            echo "Error in Database Connection";
            return false; 
         }
    }










// function startRecording() {
//    // Create a new MediaRecorder instance
//    $recorder = new MediaRecorder($_POST['stream'], array('mimeType' => 'audio/webm'));
 
//    // Start recording
//    $recorder->start();
 
//    // Save the recorder instance in the session
//    $_SESSION['recorder'] = $recorder;
//  }







}



?>