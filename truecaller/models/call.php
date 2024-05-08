<?php 

class call 
{
   private $id;
   private $startTime;
   private $endTime;
   private $isRecord;
   private $recordedFile;


public function setId($id)
{
    $this->id=$id;
}




public function setStartTime($startTime)
{
    $this->startTime=$startTime;
}



public function setEndTime($endTime)
{
    $this->endTime=$endTime;
}


public function setIsRecord($isRecord)
{
    $this->isRecord=$isRecord;
}


public function setRecordedFile($recordedFile)
{
    $this->recordedFile=$recordedFile;
}







public function getId()
{
return $this->id;
}




public function getStartTime()
{
return $this->startTime;
}




public function getEndTime()
{
return $this->endTime;
}


public function getIsRecord()
{
return $this->isRecord;
}


public function getRecordedFile()
{
return $this->recordedFile;
}





}


?>