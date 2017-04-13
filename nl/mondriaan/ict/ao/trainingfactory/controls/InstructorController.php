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
//       $gebruiker = $this->model->getGebruiker();
//       $this->view->set("gebruiker",$gebruiker);
    }
    
    public function beheerAction()
    {
        $lessen=$this->model->getLessen();
        $this->view->set('lessen',$lessen);
    }
    
    public function detailsAction()
    {   
//        $activiteit = $this->model->getActiviteit();
//        $this->view->set('activiteit',$activiteit);
        
        $deelnemers = $this->model->getDeelnemers();
        $this->view->set('deelnemers',$deelnemers);
    }
}