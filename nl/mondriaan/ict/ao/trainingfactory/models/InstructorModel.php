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
}