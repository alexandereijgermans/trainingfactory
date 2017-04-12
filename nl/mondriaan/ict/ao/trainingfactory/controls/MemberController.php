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

    public function overzichtInschrijvingenAction() {
        $gebruiker = $this->model->getGebruiker();
        $this->view->set('gebruiker', $gebruiker);
        $data = $this->model->getData();
        $this->view->set('data', $data);
    }


}