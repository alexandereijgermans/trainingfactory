<?php
namespace nl\mondriaan\ict\ao\trainingfactory\models\db;
class Registration 
{
    private $id;
    
    public function __construct()
    {
        $this->id = filter_var($this->id,FILTER_VALIDATE_INT);
//        $this->afdelings_id = filter_var($this->afdelings_id,FILTER_VALIDATE_INT);
    }
    
    public function getId()
    {
        return $this->id;
    }
}