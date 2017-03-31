<?php
namespace nl\mondriaan\ict\ao\trainingfactory\models\db;
class Person 
{
    private $id;
    private $loginname;
    private $password;
    private $preprovision;
    private $lastname;
    private $dateofbirth;
    private $gender;
    private $emailaddress;
    private $hiring_date;
    private $salary;
    private $street;
    private $postal_code;
    private $place;
    private $role;
    
    public function __construct()
    {
        $this->id = filter_var($this->id,FILTER_VALIDATE_INT);
//        $this->afdelings_id = filter_var($this->afdelings_id,FILTER_VALIDATE_INT);
    }
    
    public function getId()
    {
        return $this->id;
    }
    
    public function getLoginname() {
        return $this->loginname;
    }
    
    public function getPassword() {
        return $this->password;
    }
   
    public function getPreprovision() {
        return $this->preprovision;
    }
    
    public function getLastname() {
        return $this->lastname;
    }
    
    public function getDateofbirth() {
        return $this->dateofbirth;
    }
    
    public function getGender() {
        return $this->gender;
    }
    
    public function getEmailaddress() {
        return $this->emailaddress;
    }
    
    public function getHiringDate() {
        return $this->hiring_date;
    }
    
    public function getSalary() {
        return $this->salary;
    }
    
    public function getStreet() {
        return $this->street;
    }
    
    public function getPostalCode() {
        return $this->postal_code;
    }
    
    public function getPlace() {
        return $this->place;
    }
    
    public function getRole() {
        return $this->role;
    }
}
