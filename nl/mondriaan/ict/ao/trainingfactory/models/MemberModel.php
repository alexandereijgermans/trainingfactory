<?php
namespace nl\mondriaan\ict\ao\trainingfactory\models;

class MemberModel extends \ao\php\framework\models\AbstractModel
{
    public function getLessen()
    {
       $sql = 'SELECT `lesson`.`id`,`lesson`.`time`, `lesson`.`date`, `lesson`.`location`, `training`.`description`, `training`.`extra_costs` '
               . 'FROM `lesson`'
               . 'JOIN `training` ON `lesson`.`training_id`=`training`.`id`';
       $stmnt = $this->dbh->prepare($sql);
       $stmnt->execute();
       $lessen = $stmnt->fetchAll(\PDO::FETCH_CLASS,__NAMESPACE__.'\db\Lesson');
       return $lessen;
    }
    
    public function addDeelnameActiviteit()
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
        
       $sql="INSERT INTO `registration`  (person_id,lesson_id)VALUES (:deelnemer,:activiteit) ";
       $deelnemer=$this->getGebruiker()->getId();
               
       $stmnt = $this->dbh->prepare($sql);
       $stmnt->bindParam(':deelnemer', $deelnemer);
       $stmnt->bindParam(':activiteit', $id);
              
       try
       {
            $stmnt->execute();
       }
       catch(\PDOEXception $e)
       {
            return REQUEST_FAILURE_DATA_INVALID;
       }
       
       return REQUEST_SUCCESS;        
   }
    
    public function wijzigGebruiker() {
        $id = filter_input(INPUT_GET, 'id');
        $firstname = filter_input(INPUT_POST, 'firstname');
        $preprovision = filter_input(INPUT_POST, 'preprovision');
        $lastname = filter_input(INPUT_POST, 'lastname');
        $loginname = filter_input(INPUT_POST, 'loginname');
        $dateofbirth= filter_input(INPUT_POST, 'dateofbirth');
        $gender = filter_input(INPUT_POST, 'gender');
        $emailaddress = filter_input(INPUT_POST, 'emailaddress');
        $street = filter_input(INPUT_POST, 'street');
        $postal_code = filter_input(INPUT_POST, 'postal_code');
        $place = filter_input(INPUT_POST, 'place');
        
        if($id === null) {
            return REQUEST_FAILURE_DATA_INVALID;
        }
        if($id === false) {
            return REQUEST_FAILURE_DATA_INCOMPLETE;
        }

        if($firstname === null || $lastname === null || $loginname === null || $dateofbirth === null || $gender === null || $emailaddress === null) {
            var_dump($firstname);
            return REQUEST_FAILURE_DATA_INCOMPLETE;
        }

        $sql="UPDATE `person` SET loginname=:loginname"
            . ",firstname=:firstname,preprovision=:preprovision,"
            . "lastname=:lastname,dateofbirth=:dateofbirth,gender=:gender, emailaddress=:emailaddress,"
            . "street=:street, postal_code=:postal_code, place=:place where `person`.`id`= :id; ";

        $stmnt = $this->dbh->prepare($sql);
        $stmnt->bindParam(':loginname', $loginname);
        $stmnt->bindParam(':firstname', $firstname);
        $stmnt->bindParam(':preprovision', $preprovision);
        $stmnt->bindParam(':lastname', $lastname);
        $stmnt->bindParam(':dateofbirth', $dateofbirth);
        $stmnt->bindParam(':gender', $gender);
        $stmnt->bindParam(':emailaddress', $emailaddress);
        $stmnt->bindParam(':street', $street);
        $stmnt->bindParam(':postal_code', $postal_code);
        $stmnt->bindParam(':place', $place);
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
    
    public function isGerechtigd()
    {
        //controleer of er ingelogd is. Ja, kijk of de gebuiker deze controller mag gebruiken 
        if(isset($_SESSION['gebruiker'])&&!empty($_SESSION['gebruiker']))
        {
            $gebruiker=$_SESSION['gebruiker'];
            if ($gebruiker->getRecht() == "member")
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
}