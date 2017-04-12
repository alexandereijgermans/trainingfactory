<?php
namespace nl\mondriaan\ict\ao\trainingfactory\controls;

use nl\mondriaan\ict\ao\trainingfactory\models as MODELS;
use nl\mondriaan\ict\ao\trainingfactory\view as VIEW;

class AdminController extends \ao\php\framework\controls\AbstractController
{
    public function defaultAction()
    {
        $gebruiker = $this->model->getGebruiker();
        $this->view->set('gebruiker',$gebruiker);
    }


    public function uitloggenAction()
    {
        $this->model->uitloggen();
        $this->forward('default','bezoeker');
    }

    public function ledenAction() {
        $gebruiker = $this->model->getGebruiker();
        $this->view->set('gebruiker',$gebruiker);
        $personen = $this->model->getPersonen();
        $this->view->set('personen', $personen);
    }

    public function ledenVeranderenAction() {
        if($this->model->isPostLeeg()) {
            $this->view->set("boogschap", "pas de gegevens het lid aan.");
        } else {
            $result= $this->model->veranderPerson();
            switch($result) {
                case REQUEST_FAILURE_DATA_INCOMPLETE:
                    $this->view->set("boodschap", "Contact is niet aangepast. Niet alle vereiste data ingevuld.");
                    $this->view->set('form_data', $_POST);
                    break;
                case REQUEST_FAILURE_DATA_INVALID:
                    $this->view->set("boodschap", "Contact is niet aangepast. Er is foutieve data ingestuurd (bv gebruikersnaam bestaat al).");
                    $this->view->set('form_data',$_POST);
                    break;
                case REQUEST_SUCCESS:
                    $this->view->set("boodschap", "Contact is aangepast.");
                    $this->forward("leden");
                    break;
            }
        }
        $person = $this->model->getPerson();
        $this->view->set('person', $person);
        $gebruiker = $this->model->getGebruiker();
        $this->view->set('gebruiker',$gebruiker);
        $data = $this->model->getData();
        $this->view->set('data', $data);
    }

    public function deleteLidAction() {
        $result = $this->model->deletePerson();
        switch($result) {
            case REQUEST_FAILURE_DATA_INCOMPLETE:
                $this->view->set('boodschap','geen te verwijderen contact gegeven, dus niets verwijderd');
                break;
            case REQUEST_FAILURE_DATA_INVALID:
                $this->view->set('boodschap','te verwijderen contact bestaat niet');
                break;
            case REQUEST_NOTHING_CHANGED:
                $this->view->set('boodschap','Er is niets verwijderd reden onbekend.');
                break;
            case REQUEST_SUCCESS:
                $this->view->set('boodschap','Contact verwijderd.');
                break;
        }
        $this->forward('leden');
    }

    public function instructorsAction() {
        $gebruiker = $this->model->getGebruiker();
        $this->view->set('gebruiker',$gebruiker);
        $personen = $this->model->getPersonen();
        $this->view->set('personen', $personen);
    }

    public function instructorToevoegenAction() {
        if($this->model->isPostLeeg()) {
            $this->view->set("boogschap", "Vul de gegevens van een nieuwe instructeur in");
        } else {
          $result= $this->model->addInstructor();
          switch($result) {
              case REQUEST_FAILURE_DATA_INCOMPLETE:
                  $this->view->set("boodschap", "Contact is niet toegevoegd. Niet alle vereiste data ingevuld.");
                  $this->view->set('form_data', $_POST);
                  break;
              case REQUEST_FAILURE_DATA_INVALID:
                  $this->view->set("boodschap", "Contact is niet toegevoegd. Er is foutieve data ingestuurd (bv gebruikersnaam bestaat al).");
                  $this->view->set('form_data',$_POST);
                  break;
              case REQUEST_SUCCESS:
                  $this->view->set("boodschap", "Contact is toegevoegd.");
                  $_POST = [];
                  $this->forward("instructors");
                  break;
          }
        }
        $gebruiker = $this->model->getGebruiker();
        $this->view->set('gebruiker',$gebruiker);
    }

    public function instructorVeranderenAction() {
        if($this->model->isPostLeeg()) {
            $this->view->set("boogschap", "pas de gegevens de instructeur aan.");
        } else {
            $result= $this->model->veranderPerson();
            switch($result) {
                case REQUEST_FAILURE_DATA_INCOMPLETE:
                    $this->view->set("boodschap", "Contact is niet veranderd. Niet alle vereiste data ingevuld.");
                    $this->view->set('form_data', $_POST);
                    break;
                case REQUEST_FAILURE_DATA_INVALID:
                    $this->view->set("boodschap", "Contact is niet veranderd. Er is foutieve data ingestuurd (bv gebruikersnaam bestaat al).");
                    $this->view->set('form_data',$_POST);
                    break;
                case REQUEST_SUCCESS:
                    $this->view->set("boodschap", "Contact is veranderd.");
                    $_POST = [];
                    $this->forward("instructors");
                    break;
            }
        }
        $person = $this->model->getPerson();
        $this->view->set('person', $person);
        $gebruiker = $this->model->getGebruiker();
        $this->view->set('gebruiker',$gebruiker);
    }

    public function deleteAction() {
        $result = $this->model->deletePerson();
        switch($result) {
            case REQUEST_FAILURE_DATA_INCOMPLETE:
                $this->view->set('boodschap','geen te verwijderen contact gegeven, dus niets verwijderd');
                break;
            case REQUEST_FAILURE_DATA_INVALID:
                $this->view->set('boodschap','te verwijderen contact bestaat niet');
                break;
            case REQUEST_NOTHING_CHANGED:
                $this->view->set('boodschap','Er is niets verwijderd reden onbekend.');
                break;
            case REQUEST_SUCCESS:
                $this->view->set('boodschap','Contact verwijderd.');
                break;
        }
        $this->forward('instructors');
    }

    public function trainingsvormenAction() {
        $gebruiker = $this->model->getGebruiker();
        $this->view->set('gebruiker',$gebruiker);
        $trainingen = $this->model->getTrainingen();
        $this->view->set('trainingen', $trainingen);
    }

    public function trainingToevoegenAction() {
        if($this->model->isPostLeeg()) {
            $this->view->set("boogschap", "Vul de gegevens van een nieuwe training in");
        } else {
            $result= $this->model->addTraining();
            switch($result) {
                case REQUEST_FAILURE_DATA_INCOMPLETE:
                    $this->view->set("boodschap", "Training is niet toegevoegd. Niet alle vereiste data ingevuld.");
                    $this->view->set('form_data', $_POST);
                    break;
                case REQUEST_FAILURE_DATA_INVALID:
                    $this->view->set("boodschap", "Training is niet toegevoegd. Er is foutieve data ingestuurd (bv gebruikersnaam bestaat al).");
                    $this->view->set('form_data',$_POST);
                    break;
                case REQUEST_SUCCESS:
                    $this->view->set("boodschap", "Training is toegevoegd.");
                    $_POST = [];
                    $this->forward("trainingsvormen");
                    break;
            }
        }
        $gebruiker = $this->model->getGebruiker();
        $this->view->set('gebruiker',$gebruiker);

    }

    public function trainingVeranderenAction() {
        $gebruiker = $this->model->getGebruiker();
        $this->view->set('gebruiker',$gebruiker);
        $training = $this->model->getTraining();
        $this->view->set('training', $training);

        if($this->model->isPostLeeg()) {
            $this->view->set("boogschap", "Vul de gegevens van een nieuwe training in");
        } else {
            $result= $this->model->veranderTraining();
            switch($result) {
                case REQUEST_FAILURE_DATA_INCOMPLETE:
                    $this->view->set("boodschap", "Training is niet aangepast. Niet alle vereiste data ingevuld.");
                    $this->view->set('form_data', $_POST);
                    break;
                case REQUEST_FAILURE_DATA_INVALID:
                    $this->view->set("boodschap", "Training is niet aangepast. Er is foutieve data ingestuurd.");
                    $this->view->set('form_data',$_POST);
                    break;
                case REQUEST_SUCCESS:
                    $this->view->set("boodschap", "Training is aangepast.");
                    $_POST = [];
                    $this->forward("trainingsvormen");
                    break;
            }
        }
    }

    public function deleteTrainingAction() {
        $result = $this->model->deleteTraining();
        switch($result) {
            case REQUEST_FAILURE_DATA_INCOMPLETE:
                $this->view->set('boodschap','geen te verwijderen training gegeven, dus niets verwijderd');
                break;
            case REQUEST_FAILURE_DATA_INVALID:
                $this->view->set('boodschap','te verwijderen training bestaat niet');
                break;
            case REQUEST_NOTHING_CHANGED:
                $this->view->set('boodschap','Er is niets verwijderd reden onbekend.');
                break;
            case REQUEST_SUCCESS:
                $this->view->set('boodschap','Training verwijderd.');
                break;
        }
        $this->forward('trainingsvormen');
    }
}
