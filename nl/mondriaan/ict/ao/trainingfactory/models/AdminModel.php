<?php
namespace nl\mondriaan\ict\ao\trainingfactory\models;


class AdminModel extends \ao\php\framework\models\AbstractModel
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

    public function getPersonen() {
        $sql = 'SELECT * FROM `person`';
        $stmnt = $this->dbh->prepare($sql);
        $stmnt->execute();
        $personen = $stmnt->fetchAll(\PDO::FETCH_CLASS,__NAMESPACE__.'\db\person');
        return $personen;
    }

    public function getPerson() {
        $id= filter_input(INPUT_GET, 'id');
        $sql = "SELECT * FROM `person` WHERE id = :id";
        $stmnt = $this->dbh->prepare($sql);
        $stmnt->bindParam(':id', $id);
        $stmnt->execute();
        $person = $stmnt->fetchAll(\PDO::FETCH_CLASS, __NAMESPACE__.'\db\Person');
        return $person[0];
    }

    public function getTrainingen() {
        $sql = 'SELECT * FROM `training`';
        $stmnt = $this->dbh->prepare($sql);
        $stmnt->execute();
        $trainingen = $stmnt->fetchAll(\PDO::FETCH_CLASS, __NAMESPACE__.'\db\Training');
        return $trainingen;
    }

    public function getTraining() {
        $id = filter_input(INPUT_GET, 'id');
        $sql = "SELECT * FROM `training` WHERE id = :id";
        $stmnt = $this->dbh->prepare($sql);
        $stmnt->bindParam(':id', $id);
        $stmnt->execute();
        $training = $stmnt->fetchAll(\PDO::FETCH_CLASS, __NAMESPACE__.'\db\Training');
        return $training[0];
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
            ."WHERE `person`.id = :id";
        $stmnt = $this->dbh->prepare($sql);
        $stmnt->bindParam('id', $id);
        try {
            $stmnt->execute();
        } catch (\PDOException $e) {
            return REQUEST_FAILURE_DATA_INVALID;
        }
        $data = $stmnt->fetchAll(\PDO::FETCH_CLASS, __NAMESPACE__.'\db\Registration');
        if(empty($data)) {
            return $data;
        } else {
            return $data[0];
        }
    }

    public function veranderPerson() {
        $id = filter_input(INPUT_GET, 'id');
        $firstname = filter_input(INPUT_POST, 'firstname');
        $preprovision = filter_input(INPUT_POST, 'preprovision');
        $lastname = filter_input(INPUT_POST, 'lastname');
        $loginname = filter_input(INPUT_POST, 'loginname');
        $password = filter_input(INPUT_POST, 'password');
        $dateofbirth= filter_input(INPUT_POST, 'dateofbirth');
        $gender = filter_input(INPUT_POST, 'gender');
        $emailaddress = filter_input(INPUT_POST, 'emailaddress');
        $hiring_date = filter_input(INPUT_POST, 'hiring_date');
        $salary = filter_input(INPUT_POST, 'salary');
        $street = filter_input(INPUT_POST, 'street');
        $postal_code = filter_input(INPUT_POST, 'postal_code');
        $place = filter_input(INPUT_POST, 'place');

        $salary = floatval($salary);

        if($id === null) {
            return REQUEST_FAILURE_DATA_INVALID;
        }
        if($id === false) {
            return REQUEST_FAILURE_DATA_INCOMPLETE;
        }

        if($firstname === null || $lastname === null || $loginname === null || $dateofbirth === null || $gender === null || $emailaddress === null) {
            return REQUEST_FAILURE_DATA_INCOMPLETE;
        }

        if(empty($password)) {
            $password = 'qwerty';
        }
        $sql="UPDATE `person` SET loginname=:loginname,password=:password"
            . ",firstname=:firstname,preprovision=:preprovision,"
            . "lastname=:lastname,dateofbirth=:dateofbirth,gender=:gender, emailaddress=:emailaddress,  hiring_date=:hiring_date,"
            . "salary=:salary, street=:street, postal_code=:postal_code, place=:place where `person`.`id`= :id; ";

        $stmnt = $this->dbh->prepare($sql);
        $stmnt->bindParam(':loginname', $loginname);
        $stmnt->bindParam(':password', $password);
        $stmnt->bindParam(':firstname', $firstname);
        $stmnt->bindParam(':preprovision', $preprovision);
        $stmnt->bindParam(':lastname', $lastname);
        $stmnt->bindParam(':dateofbirth', $dateofbirth);
        $stmnt->bindParam(':gender', $gender);
        $stmnt->bindParam(':emailaddress', $emailaddress);
        $stmnt->bindParam(':hiring_date', $hiring_date);
        $stmnt->bindParam(':salary', $salary);
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

    public function addInstructor() {
        $firstname = filter_input(INPUT_POST, 'firstname');
        $preprovision = filter_input(INPUT_POST, 'preprovision');
        $lastname = filter_input(INPUT_POST, 'lastname');
        $loginname = filter_input(INPUT_POST, 'loginname');
        $password = filter_input(INPUT_POST, 'password');
        $dateofbirth= filter_input(INPUT_POST, 'dateofbirth');
        $gender = filter_input(INPUT_POST, 'gender');
        $emailaddress = filter_input(INPUT_POST, 'emailaddress');
        $hiring_date = filter_input(INPUT_POST, 'hiring_date');
        $salary = filter_input(INPUT_POST, 'salary');
        $street = filter_input(INPUT_POST, 'street');
        $postal_code = filter_input(INPUT_POST, 'postal_code');
        $place = filter_input(INPUT_POST, 'place');

        $salary = floatval($salary);

        if($firstname === null || $lastname === null || $loginname === null || $dateofbirth === null || $gender === null || $emailaddress === null || $hiring_date === null || $salary === null) {
            return REQUEST_FAILURE_DATA_INCOMPLETE;
        }

        if(empty($password)) {
            $password = 'qwerty';
        }

        $sql="INSERT INTO `person` (id, loginname, password, firstname, preprovision, lastname, dateofbirth, gender, emailaddress, hiring_date, salary, street, postal_code, place, role) VALUES(null, :loginname, :password, :firstname, :preprovision, :lastname, :dateofbirth, :gender, :emailaddress, :hiring_date, :salary, :street, :postal_code, :place, 'instructor')";

        $stmnt = $this->dbh->prepare($sql);
        $stmnt->bindParam(':loginname', $loginname);
        $stmnt->bindParam(':password', $password);
        $stmnt->bindParam(':firstname', $firstname);
        $stmnt->bindParam(':preprovision', $preprovision);
        $stmnt->bindParam(':lastname', $lastname);
        $stmnt->bindParam(':dateofbirth', $dateofbirth);
        $stmnt->bindParam(':gender', $gender);
        $stmnt->bindParam(':emailaddress', $emailaddress);
        $stmnt->bindParam(':hiring_date', $hiring_date);
        $stmnt->bindParam(':salary', $salary);
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

    public function deletePerson() {
        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

        if($id === null) {
            return REQUEST_FAILURE_DATA_INVALID;
        }
        if($id === false) {
            return REQUEST_FAILURE_DATA_INCOMPLETE;
        }

        $sql = "UPDATE `person` SET deleted = 1 WHERE id = :id";
        $stmnt = $this->dbh->prepare($sql);
        $stmnt->bindParam(':id', $id);
        $stmnt->execute();

        if($stmnt->rowCount() === 1) {
            return REQUEST_SUCCESS;
        }
        return REQUEST_NOTHING_CHANGED;
    }

    public function addTraining() {
        $description = filter_input(INPUT_POST, 'description');
        $duration = filter_input(INPUT_POST, 'duration');
        $extra_costs = filter_input(INPUT_POST, 'extra_costs');
        $duration = intval($duration);

        if($description === null || $duration === null) {
            return REQUEST_FAILURE_DATA_INCOMPLETE;
        }

        $sql = "INSERT INTO `training` (description, duration, extra_costs) VALUES(:description, :duration, :extra_costs)";
        $stmnt = $this->dbh->prepare($sql);
        $stmnt->bindParam(':description', $description);
        $stmnt->bindParam(':duration', $duration);
        $stmnt->bindParam(':extra_costs', $extra_costs);

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

    public function veranderTraining() {
        $id = filter_input(INPUT_GET, 'id');
        $description = filter_input(INPUT_POST, 'description');
        $duration = filter_input(INPUT_POST, 'duration');
        $extra_costs = filter_input(INPUT_POST, 'extra_costs');
        $salary = intval($duration);

        if($id === null) {
            return REQUEST_FAILURE_DATA_INVALID;
        }
        if($id === false) {
            return REQUEST_FAILURE_DATA_INCOMPLETE;
        }

        if($duration === null || $description === null) {
            return REQUEST_FAILURE_DATA_INCOMPLETE;
        }

        $sql="UPDATE `training` SET description = :description, duration = :duration, extra_costs = :extra_costs  where `training`.`id`= :id; ";

        $stmnt = $this->dbh->prepare($sql);
        $stmnt->bindParam(':id', $id);
        $stmnt->bindParam(':description', $description);
        $stmnt->bindParam(':duration', $duration);
        $stmnt->bindParam(':extra_costs', $extra_costs);


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

    public function deleteTraining() {
        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);


        if($id === null) {
            return REQUEST_FAILURE_DATA_INVALID;
        }

        if($id === false) {
            return REQUEST_FAILURE_DATA_INCOMPLETE;
        }

        $sql = "UPDATE `training` SET deleted = 1 WHERE id = :id";
        $stmnt = $this->dbh->prepare($sql);
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
        return REQUEST_NOTHING_CHANGED;
    }
}