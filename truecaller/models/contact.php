<?php 

class contact 
{
   private $contactName;
   private $contactNumber;
   private $contactNickName;
   private $isFavorite;
   private $isBlocked;



public function setContactName($contactName)
{
    $this->contactName=$contactName;
}



public function setContactNumber($contactNumber)
{
    $this->contactNumber=$contactNumber;
}



public function setContactNickName($contactNickName)
{
    $this->contactNickName=$contactNickName;
}



public function setisFavorite($isFavorite)
{
    $this->isFavorite=$isFavorite;
}



public function setisBlocked($isBlocked)
{
    $this->isBlocked=$isBlocked;
}




public function getContactName()
{
return $this->contactName;
}


public function getContactNumber()
{
return $this->contactNumber;
}


public function getContactNickName()
{
return $this->contactNickName;
}


public function getIsFavorite()
{
return $this->isFavorite;
}


public function getIsBlocked()
{
return $this->isBlocked;
}




}


?>