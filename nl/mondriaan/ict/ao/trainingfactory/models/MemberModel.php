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
}