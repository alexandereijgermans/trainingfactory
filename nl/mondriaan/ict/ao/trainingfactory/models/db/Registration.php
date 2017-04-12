<?php
namespace nl\mondriaan\ict\ao\trainingfactory\models\db;
class Registration 
{
    private $id;
    public $payment;
    private $person_id;
    private $lesson_id;
    
    public function __construct()
    {
        $this->id = filter_var($this->id,FILTER_VALIDATE_INT);
        $this->person_id = filter_var($this->person_id,FILTER_VALIDATE_INT);
        $this->lesson_id = filter_var($this->lesson_id,FILTER_VALIDATE_INT);
    }
    
    public function getId()
    {
        return $this->id;
    }

    public function  getPayment() {
        return $this->payment;
    }

    public function getPersonId() {
        return $this->person_id;
    }

    public function getLessonId() {
        return $this->lesson_id;
    }
}