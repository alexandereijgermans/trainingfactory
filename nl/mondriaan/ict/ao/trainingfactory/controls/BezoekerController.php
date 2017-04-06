<?php
    namespace nl\mondriaan\ict\ao\trainingfactory\controls;
    
    use nl\mondriaan\ict\ao\trainingfactory\models as MODELS;
    use nl\mondriaan\ict\ao\trainingfactory\view as VIEW;

class BezoekerController extends \ao\php\framework\controls\AbstractController
{   
    public function defaultAction()
    {
        //$this->login();
    }

    public function contactAction() {
        //$this->login();
    }

    public function gedragsregelsAction() {
        //$this->login();
    }

    public function uitloggenAction()
    {
        $this->model->uitloggen();
        $this->forward('default','bezoeker');
    }

    private function login(){
        if($this->model->isPostLeeg())
        {
            $this->view->set("boodschap","Vul uw gegevens in");
        }
        else
        {
            $resultInlog=$this->model->controleerInloggen();
            switch($resultInlog)
            {
                case REQUEST_SUCCESS:
                    $this->view->set("boodschap","Welkom op de beheers applicatie. Veel werkplezier");
                    $recht = $this->model->getGebruiker()->getRole();
                    $this->forward("default", $recht);
                    break;
                case REQUEST_FAILURE_DATA_INVALID:
                    $this->view->set("boodschap","Gegevens kloppen niet. Probeer opnieuw.");

                    break;
                case REQUEST_FAILURE_DATA_INCOMPLETE:
                    $this->forward("default", "bezoeker");
                    break;
                case REQUEST_FAILURE_DATA_INCOMPLETE:
                    $this->forward("default", "bezoeker");
                    $this->view->set("boodschap","niet alle gegevens ingevuld");
                    break;
            }
        }
    }
    
    public function aanbodAction()
    {
        $this->login();
        if($this->model->isPostLeeg())
        {
           $this->view->set("boodschap","Vul uw gegevens in");
        }
        else
        {   
            $resultInlog=$this->model->controleerInloggen();
            switch($resultInlog)
            {
                case REQUEST_SUCCESS:
                     $this->view->set("boodschap","Welkom op de beheers applicatie. Veel werkplezier");
                     $recht = $this->model->getGebruiker()->getRole();
                     $this->forward("default", $recht);
                     break;
                case REQUEST_FAILURE_DATA_INVALID:
                     $this->view->set("boodschap","Gegevens kloppen niet. Probeer opnieuw."); 

                     break;
                case REQUEST_FAILURE_DATA_INCOMPLETE:
                    $this->forward("default", "bezoeker");
                     break;
                case REQUEST_FAILURE_DATA_INCOMPLETE:
                    $this->forward("default", "bezoeker");
                     $this->view->set("boodschap","niet alle gegevens ingevuld");
                     break;
            }
        }
        $training=$this->model->getTraining();
        $this->view->set("training",$training);
    }
    
    public function registrerenAction()
    {
        //$this->login();
        if($this->model->isPostLeeg())
        {
           $this->view->set("boodschap","Vul uw gegevens in");
        }
        else
        {   
            $result=$this->model->registreren();

            switch($result)
            {
                
                
                case REQUEST_SUCCESS:
                     $this->view->set("boodschap","U bent successvol geregistreerd!");                     
                     $this->forward("default");
                     break;
                case REQUEST_FAILURE_DATA_INVALID:
                     $this->view->set('form_data',$_POST);
                     $this->view->set("boodschap","emailadres niet correct of gebruikersnaam bestaat al"); 
                     break;
                case REQUEST_FAILURE_DATA_INCOMPLETE:
                     $this->view->set('form_data',$_POST);
                     $this->view->set("boodschap","Niet alle gegevens ingevuld");
                     break;
            }
        }    
    }
}
