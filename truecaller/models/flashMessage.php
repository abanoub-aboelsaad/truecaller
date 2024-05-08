<?php 

class flashMessage
{
   private $id;
   private $callerNumber;
   private $callerName;



public function setId($id)
{
    $this->id=$id;
}





public function setCallerNumber($callerNumber)
{
    $this->callerNumber=$callerNumber;
}



public function setCallerName($callerName)
{
    $this->callerName=$callerName;
}




public function getId()
{
return $this->id;
}


public function getCallerNumber()
{
return $this->callerNumber;
}


public function getCallerName()
{
return $this->callerName;
}




}


?>