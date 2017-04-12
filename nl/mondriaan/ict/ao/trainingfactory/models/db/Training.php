<?php
namespace nl\mondriaan\ict\ao\trainingfactory\models\db;
class Training 
{
    private $id;
    private $description;
    private $duration;
    private $extra_costs;
    private $deleted;
    
    public function __construct()
    {
        $this->id = filter_var($this->id,FILTER_VALIDATE_INT);
    }
    
    public function getId()
    {
        return $this->id;
    }
    
    public function getDescription()
    {
        return $this->description;
    }
    
    public function getDuration()
    {
        return $this->duration;
    }
    
    public function getExtraCosts()
    {
        return $this->extra_costs;
    }

    public function getDeleted() {
        return $this->deleted;
    }
}