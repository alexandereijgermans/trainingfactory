<?php
namespace nl\mondriaan\ict\ao\trainingfactory\models;

class MemberModel extends \ao\php\framework\models\AbstractModel
{
    
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

    public function getData() {
        $id = filter_input(INPUT_GET, 'id');
        $id = intval($id);
        $sql = "SELECT `lesson`.date, `lesson`.time, `lesson`.location, `training`.description, `training`.extra_costs, "
            ."`registration`.lesson_id, `registration`.person_id, `registration`.payment "
            ."FROM `registration` "
            ."JOIN `person` ON `registration`.person_id = `person`.id "
            ."JOIN `lesson` ON `registration`.lesson_id = `lesson`.id "
            ."JOIN `training` ON `lesson`.training_id = `training`.id "
            ."WHERE `registration`.person_id = :id";
        $stmnt = $this->dbh->prepare($sql);
        $stmnt->bindParam('id', $id);
        try {
            $stmnt->execute();
        } catch (\PDOException $e) {
            return REQUEST_FAILURE_DATA_INVALID;
        }
        $data = $stmnt->fetchAll(\PDO::FETCH_CLASS, __NAMESPACE__.'\db\Registration');
        return $data;
    }
}