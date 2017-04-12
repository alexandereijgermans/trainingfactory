<?php
namespace nl\mondriaan\ict\ao\trainingfactory\models;

class BezoekerModel extends \ao\php\framework\models\AbstractModel
{
    public function controleerInloggen()
    {
        $gn=  filter_input(INPUT_POST, 'gn');
        $ww=  filter_input(INPUT_POST, 'ww');
        
        if ( ($gn!==null) && ($ww!==null) )
        {
             $sql = 'SELECT * FROM `person` WHERE `loginname` = :gn AND `password` = :ww';
             $sth = $this->dbh->prepare($sql);
             $sth->bindParam(':gn',$gn);
             $sth->bindParam(':ww',$ww);
             $sth->execute();
             
             $result = $sth->fetchAll(\PDO::FETCH_CLASS,__NAMESPACE__.'\db\Person');

             if(count($result) === 1)
             {   
                 $this->startSession();   
                 $_SESSION['gebruiker']=$result[0];
                 return REQUEST_SUCCESS;
             }
             return REQUEST_FAILURE_DATA_INVALID;
        }
        return REQUEST_FAILURE_DATA_INCOMPLETE;
    }
    
    public function getLessen()
    {
       $sql = 'SELECT * FROM `lesson`';
       $stmnt = $this->dbh->prepare($sql);
       $stmnt->execute();
       $lessen = $stmnt->fetchAll(\PDO::FETCH_CLASS,__NAMESPACE__.'\db\Lesson');    
       return $lessen;
    }
    
    public function getTraining()
    {
       $sql = 'SELECT * FROM `training` WHERE deleted = 0';
       $stmnt = $this->dbh->prepare($sql);
       $stmnt->execute();
       $training = $stmnt->fetchAll(\PDO::FETCH_CLASS,__NAMESPACE__.'\db\Training');    
       return $training;
    }
    
    public function registreren()
    {
        $firstname = filter_input(INPUT_POST, 'firstname');
        $preprovision = filter_input(INPUT_POST, 'preprovision');
        $lastname = filter_input(INPUT_POST, 'lastname');
        $loginname = filter_input(INPUT_POST, 'loginname');
        $password = filter_input(INPUT_POST, 'password');
        $repeatpassword = filter_input(INPUT_POST, 'repeatpassword');
        $dateofbirth= filter_input(INPUT_POST, 'dateofbirth');
        $gender = filter_input(INPUT_POST, 'gender');
        $emailaddress = filter_input(INPUT_POST, 'emailaddress');
        $street = filter_input(INPUT_POST, 'street');
        $postal_code = filter_input(INPUT_POST, 'postal_code');
        $place = filter_input(INPUT_POST, 'place');
        
         if($password!==$repeatpassword)
        {
             return REQUEST_FAILURE_DATA_INVALID;
        }


        if($firstname === null || $lastname === null || $loginname === null || $dateofbirth === null || $gender === null || $emailaddress === null) {
            return REQUEST_FAILURE_DATA_INCOMPLETE;
        }
        


        if(empty($password)) {
            $password = 'qwerty';
        }

        $sql="INSERT INTO `person` ( loginname, password, firstname, preprovision, lastname, dateofbirth, gender, emailaddress, street, postal_code, place, role) VALUES( :loginname, :password, :firstname, :preprovision, :lastname, :dateofbirth, :gender, :emailaddress, :street, :postal_code, :place, 'member')";

        $stmnt = $this->dbh->prepare($sql);
        $stmnt->bindParam(':loginname', $loginname);
        $stmnt->bindParam(':password', $password);
        $stmnt->bindParam(':firstname', $firstname);
        $stmnt->bindParam(':preprovision', $preprovision);
        $stmnt->bindParam(':lastname', $lastname);
        $stmnt->bindParam(':dateofbirth', $dateofbirth);
        $stmnt->bindParam(':gender', $gender);
        $stmnt->bindParam(':emailaddress', $emailaddress);
        $stmnt->bindParam(':street', $street);
        $stmnt->bindParam(':postal_code', $postal_code);
        $stmnt->bindParam(':place', $place);

        try {
            $stmnt->execute();
        } catch (\PDOException $e) {
            return REQUEST_FAILURE_DATA_INVALID;
        }

        if($stmnt->rowCount() === 1) {

            return REQUEST_SUCCESS;
        }
        return REQUEST_FAILURE_DATA_INVALID;
    }
}