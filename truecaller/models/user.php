<?php 

class user 
{
   public $id;
   public $phoneNumber;
   public $firstName;
   public $lastName;



public function setId($id)
{
    $this->id=$id;
}



public function setphoneNumber($phoneNumber)
{
    $this->id=$phoneNumber;
}



public function setFirstName($firstName)
{
    $this->id=$firstName;
}



public function setLastName($lastName)
{
    $this->id=$lastName;
}



public function setNickName($nickName)
{
    $this->id=$nickName;
}




public function getId()
{
return $this->id;
}


public function getFirstName()
{
return $this->firstName;
}


public function getLastName()
{
return $this->lastName;
}





public function getPhoneNumber()
{
return $this->phoneNumber;
}




}


?>