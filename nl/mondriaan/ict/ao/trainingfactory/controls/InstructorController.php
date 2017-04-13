<?php
    namespace nl\mondriaan\ict\ao\trainingfactory\controls;
    
    use nl\mondriaan\ict\ao\trainingfactory\models as MODELS;
    use nl\mondriaan\ict\ao\trainingfactory\view as VIEW;

class InstructorController extends \ao\php\framework\controls\AbstractController
{   
    public function uitloggenAction()
    {
        $this->model->uitloggen();
        $this->forward('default','bezoeker');
    }
 
    public function defaultAction()
    {
        $gebruiker = $this->model->getGebruiker();
        $this->view->set('gebruiker',$gebruiker);
    }
    
    public function beheerAction()
    {
        $lessen=$this->model->getLessen();
        $this->view->set('lessen',$lessen);
        $gebruiker = $this->model->getGebruiker();
        $this->view->set('gebruiker',$gebruiker);
    }
    
    public function detailsAction()
    {   
        $les=$this->model->getLes();
        $this->view->set('les',$les);
        $personen=$this->model->getPersonen();
        $this->view->set('personen',$personen);
        $deelnemers = $this->model->getDeelnemers();
        $this->view->set('deelnemers',$deelnemers);
        $gebruiker = $this->model->getGebruiker();
        $this->view->set('gebruiker',$gebruiker);
    }
    
    public function lesPlannenAction()
    {
        $trainingen = $this->model->getTrainingen();
        $this->view->set('trainingen', $trainingen);
        $gebruiker = $this->model->getGebruiker();
        $this->view->set('gebruiker',$gebruiker);
        if($this->model->isPostLeeg())
        {
           $this->view->set("boodschap","Vul uw gegevens in");
        }
        else
        {   
            $result=$this->model->lesPlannen();

            switch($result)
            {
                case REQUEST_SUCCESS:
                     $this->view->set("boodschap","U hebt een les toegevoegd!");                     
                     $this->forward("default");
                     break;
                case REQUEST_FAILURE_DATA_INVALID:
                     $this->view->set('form_data',$_POST);
                     $this->view->set("boodschap","Er is wat fout gegaan, probeer het opnieuw"); 
                     break;
                case REQUEST_FAILURE_DATA_INCOMPLETE:
                     $this->view->set('form_data',$_POST);
                     $this->view->set("boodschap","Niet alle gegevens ingevuld");
                     break;
            }
        }    
    }
    
    public function lesAanpassenAction()
    {
        if($this->model->isPostLeeg()) {
            $this->view->set("boogschap", "pas de gegevens het lid aan.");
        } else {
            $result= $this->model->lesAanpassen();
            switch($result) {
                case REQUEST_FAILURE_DATA_INCOMPLETE:
                    $this->view->set("boodschap", "les is niet aangepast. Niet alle vereiste data ingevuld.");
                    $this->view->set('form_data', $_POST);
                    break;
                case REQUEST_FAILURE_DATA_INVALID:
                    $this->view->set("boodschap", "les is niet aangepast. Er is foutieve data ingestuurd .");
                    $this->view->set('form_data',$_POST);
                    break;
                case REQUEST_SUCCESS:
                    $this->view->set("boodschap", "les is aangepast.");
                    $_POST = [];
                    $this->forward("beheer");
                    break;
            }
        }
        $les = $this->model->getLes();
        $this->view->set('les', $les);
        $gebruiker = $this->model->getGebruiker();
        $this->view->set('gebruiker',$gebruiker);
        $trainingen = $this->model->getTrainingen();
        $this->view->set('trainingen', $trainingen);
    }
}
