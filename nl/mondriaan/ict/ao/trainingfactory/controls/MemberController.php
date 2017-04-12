<?php
    namespace nl\mondriaan\ict\ao\trainingfactory\controls;
    
    use nl\mondriaan\ict\ao\trainingfactory\models as MODELS;
    use nl\mondriaan\ict\ao\trainingfactory\view as VIEW;

    
class MemberController extends \ao\php\framework\controls\AbstractController
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
    
    public function lesseninschrijvenAction()
    {
        $gebruiker = $this->model->getGebruiker();
        $this->view->set('gebruiker',$gebruiker);
        $lessen=$this->model->getLessen();
        $this->view->set("lessen",$lessen);
    }
    
    public function adddeelnameAction()
    {
        $result=$this->model->addDeelnameActiviteit();
            switch($result)
            {
                case REQUEST_FAILURE_DATA_INCOMPLETE:
                $this->view->set('boodschap','geen toe te voegen activiteit gegeven, dus niets toegevoegd');
                break;
            case REQUEST_FAILURE_DATA_INVALID:
                $this->view->set('boodschap','activiteit bestaat niet');
                break;
            case REQUEST_SUCCESS:
                $this->view->set("boodschap", "activiteit is toegevoegd."); 
                
                break;  
            }  
            $this->forward("lesseninschrijven");
      }
    
    
    
    public function userinfoAction()
    {
       $gebruiker = $this->model->getGebruiker();
       $this->view->set('gebruiker',$gebruiker);
       if($this->model->isPostLeeg()) {
            $this->view->set("boogschap", "pas de gegevens het gebruiker aan.");
        } else {
            $result= $this->model->wijzigGebruiker();
            switch($result) {
                case REQUEST_FAILURE_DATA_INCOMPLETE:
                    $this->view->set("boodschap", "Gebruiker is niet aangepast. Niet alle vereiste data ingevuld.");
                    break;
                case REQUEST_FAILURE_DATA_INVALID:
                    $this->view->set("boodschap", "Gebruiker is niet aangepast. Er is foutieve data ingestuurd (bv gebruikersnaam bestaat al).");
                    break;
                case REQUEST_SUCCESS:
                    $this->view->set("boodschap", "Gebruiker is aangepast.");
                    break;
            }
        }
       
    }
}