<?php
namespace nl\mondriaan\ict\ao\trainingfactory\models\db;
class Lesson 
{
    private $id;
    private $time;
    private $date;
    private $location;
    private $max_persons;
    private $person_id;
    private $training_id;
    
    
    public function __construct()
    {
        $this->id = filter_var($this->id,FILTER_VALIDATE_INT);
        $this->person_id = filter_var($this->person_id,FILTER_VALIDATE_INT);
        $this->training_id = filter_var($this->training_id,FILTER_VALIDATE_INT);
    }
    
    public function getId()
    {
        return $this->id;
    }
    
    public function getTime()
    {
        return $this->time;
    }
    
    public function getDate()
    {
        return $this->date;
    }
    
    public function getLocation()
    {
        return $this->location;
    }
    
    public function getMaxPersons()
    {
        return $this->max_persons;
    }
    
    public function getPersonId()
    {
        return $this->person_id;
    }
    
    public function getTrainingId()
    {
        return $this->training_id;
    }
}