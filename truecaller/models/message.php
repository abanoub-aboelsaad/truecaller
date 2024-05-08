<?php 

class message
{
   private $id;
   private $text;
   private $voice;
   private $isVoice;


public function setId($id)
{
    $this->id=$id;
}



public function setText($text)
{
    $this->text=$text;
}



public function setVoice($voice)
{
    $this->voice=$voice;
}



public function setIsVoice($isVoice)
{
    $this->isVoice=$isVoice;
}





public function getId()
{
return $this->id;
}


public function getText()
{
return $this->text;
}


public function getVoice()
{
return $this->voice;
}


public function getIsVoice()
{
return $this->isVoice;
}



}


?>