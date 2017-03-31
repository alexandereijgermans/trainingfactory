<?php
    namespace nl\mondriaan\ict\ao\trainingfactory\controls;
    
    use nl\mondriaan\ict\ao\trainingfactory\models as MODELS;
    use nl\mondriaan\ict\ao\trainingfactory\view as VIEW;

class BezoekerController extends \ao\php\framework\controls\AbstractController
{   
    public function inloggenAction()
    {
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
                     $recht = $this->model->getGebruiker()->getRecht();
                     $this->forward("default", $recht);
                     break;
                case REQUEST_FAILURE_DATA_INVALID:
                     $this->view->set("boodschap","Gegevens kloppen niet. Probeer opnieuw."); 
                     break;
                case REQUEST_FAILURE_DATA_INCOMPLETE:
                     $this->view->set("boodschap","niet alle gegevens ingevuld");
                     break;
            }
        }
//        $afdelingen=$this->model->getAfdelingen();
//        $this->view->set("afdelingen",$afdelingen);
//        $directeur = $this->model->getDirecteur();
//        $this->view->set("directeur",$directeur);
    }
    
    public function defaultAction()
    {
//       $afdelingen=$this->model->getAfdelingen();
//       $this->view->set("afdelingen",$afdelingen);
//       $directeur = $this->model->getDirecteur();
//       $this->view->set("directeur",$directeur);
    }
}
