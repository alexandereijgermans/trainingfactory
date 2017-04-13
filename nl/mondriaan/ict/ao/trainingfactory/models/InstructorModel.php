<?php
namespace nl\mondriaan\ict\ao\trainingfactory\models;


class InstructorModel extends \ao\php\framework\models\AbstractModel
{
    
    public function isGerechtigd()
    {
        //controleer of er ingelogd is. Ja, kijk of de gebuiker deze controller mag gebruiken 
        if(isset($_SESSION['gebruiker'])&&!empty($_SESSION['gebruiker']))
        {
            $gebruiker=$_SESSION['gebruiker'];
            if ($gebruiker->getRecht() == "instructor")
            {
                return true;
            }
            else
            {
                return false;
            }
        }
        return false;     
   }
   
   public function uitloggen()
   {
       $_SESSION = array();
       session_destroy();
   }

   public function getLessen()
   {
       $sql = 'SELECT `lesson`.id, `lesson`.time, `lesson`.date, `lesson`.location, `lesson`.max_persons, `lesson`.person_id, `lesson`.training_id, `training`.id AS "trainingID", `training`.description FROM `lesson` JOIN `training` ON lesson.training_id = training.id';
       $stmnt = $this->dbh->prepare($sql);
       $stmnt->execute();
       $lessen = $stmnt->fetchAll(\PDO::FETCH_CLASS,__NAMESPACE__.'\db\Lesson');    
       return $lessen;
   }
   
   public function getLes() {
       $id = $_GET['id'];
       $sql = 'SELECT * FROM `lesson` INNER JOIN `training` ON lesson.training_id = training.id WHERE `lesson`.id = :id';
       $stmnt = $this->dbh->prepare($sql);
       $stmnt->bindParam(':id', $id);
       $stmnt->execute();
       $lessen = $stmnt->fetchAll(\PDO::FETCH_CLASS,__NAMESPACE__.'\db\Lesson');    
       return $lessen[0];
   }
   

    public function getDeelnemers()
    {
        $id= filter_input(INPUT_GET,'id',FILTER_VALIDATE_INT);
       
        if($id===null)
        {
            return REQUEST_FAILURE_DATA_INCOMPLETE;
        }
        if($id===false)
        {
            return REQUEST_FAILURE_DATA_INVALID;
        }
        
        $sql='SELECT *
           FROM `registration`          
           WHERE `registration`.`lesson_id`=:id';
       $stmnt = $this->dbh->prepare($sql);
       $stmnt->bindParam(':id',$id );
       $stmnt->execute();
       $deelnemers = $stmnt->fetchAll(\PDO::FETCH_CLASS,__NAMESPACE__.'\db\Registration');    
       return $deelnemers;
    }
    
    public function GetPersonen() {
        $sql = 'SELECT * FROM `person`';
        $stmnt = $this->dbh->prepare($sql);
       $stmnt->execute();
       $p = $stmnt->fetchAll(\PDO::FETCH_CLASS,__NAMESPACE__.'\db\Person');    
       return $p;
    }

    public function getTrainingen() {
        $sql = 'SELECT * FROM `training`';
        $stmnt = $this->dbh->prepare($sql);
        $stmnt->execute();
        $trainingen = $stmnt->fetchAll(\PDO::FETCH_CLASS, __NAMESPACE__.'\db\Training');
        return $trainingen;
    }
   
   public function lesPlannen()
   {
       $person_id = $this->getGebruiker()->getId();
        $time = filter_input(INPUT_POST, 'time');
        $date = filter_input(INPUT_POST, 'date');
        $location = filter_input(INPUT_POST, 'location');
        $max_persons = filter_input(INPUT_POST, 'max_persons');
        $training = filter_input(INPUT_POST, 'training');
        
        if($time === null || $date === null || $location === null || $max_persons === null || $training === null || $person_id === null) {
            return REQUEST_FAILURE_DATA_INCOMPLETE;
        }
        
        $sql="INSERT INTO `lesson` ( time, date, location, max_persons,person_id, training_id) VALUES( :time, :date, :location, :max_persons,:person_id, :training)";

        $stmnt = $this->dbh->prepare($sql);
        $stmnt->bindParam(':time', $time);
        $stmnt->bindParam(':date', $date);
        $stmnt->bindParam(':location', $location);
        $stmnt->bindParam(':max_persons', $max_persons);
        $stmnt->bindParam(':person_id', $person_id);
        $stmnt->bindParam('training', $training);


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
   
   public function lesAanpassen()
   {
        $id = filter_input(INPUT_GET, 'id');
        $person_id = $this->getGebruiker()->getId();
        $time = filter_input(INPUT_POST, 'time');
        $date = filter_input(INPUT_POST, 'date');
        $location = filter_input(INPUT_POST, 'location');
        $max_persons = filter_input(INPUT_POST, 'max_persons');
        $training = filter_input(INPUT_POST, 'training');
        $id = intval($id);
        $training = intval($training);
        $max_persons = intval($max_persons);
        
        if($person_id === null || $time === null || $date === null || $location === null || $max_persons === null || $training === null) {
            return REQUEST_FAILURE_DATA_INCOMPLETE;
        }
       
        var_dump($id, $person_id, $time, $date, $location, $max_persons, $training);
        $sql="UPDATE `lesson` SET time = :time, date = :date, location = :location, max_persons = :max_persons, person_id = :person_id, training_id = :training_id  where `lesson`.`id`= :id; ";

        $stmnt = $this->dbh->prepare($sql);
        $stmnt->bindParam(':time', $time);
        $stmnt->bindParam(':date', $date);
        $stmnt->bindParam(':location', $location);
        $stmnt->bindParam(':max_persons', $max_persons);
        $stmnt->bindParam(':person_id', $person_id);
        $stmnt->bindParam(':training_id', $training);
        $stmnt->bindParam(':id', $id);

        
        try {
            $stmnt->execute();
        } catch (\PDOException $e) {
            var_dump($e);
            return REQUEST_FAILURE_DATA_INVALID;
        }

        if($stmnt->rowCount() === 1) {

            return REQUEST_SUCCESS;
        }
        return REQUEST_FAILURE_DATA_INVALID;
    }
}