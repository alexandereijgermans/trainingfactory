<?php 
include 'include/header.php';
include 'include/menu.php';?>
<section>
    <form method="post">
        <table>
            <caption>Toevoegen van een nieuwe deelnemer</caption>
            <tr>
                <td>Voornaam:*</td>
                <td>
                    <input type="text" name="firstname" required="required" value="<?= !empty($form_data['firstname'])?$form_data['firstname']:'';?>">
                </td>
            </tr>
            <tr>
                <td>Tussenvoegsel:</td>
                <td>
                    <input type="text" name="preprovision" value="<?= !empty($form_data['preprovision'])?$form_data['preprovision']:'';?>">
                </td>
            </tr>
            <tr>
                <td>Achternaam:*</td>
                <td>
                    <input type="text" name="lastname" required="required" value="<?= !empty($form_data['lastname'])?$form_data['lastname']:'';?>">
                </td>
            </tr>
            <tr>
                <td>Geboortedatum:*</td>
                <td>
                    <input type="date" name="dateofbirth" required="required" value="<?= !empty($form_data['dateofbirth'])?$form_data['dateofbirth']:'';?>">
                </td>
            </tr>
            <tr>
                <td>Gebruikersnaam:*</td>
                <td>
                    <input type="text" name="loginname" required="required"  value="<?= !empty($form_data['loginname'])?$form_data['loginname']:'';?>">
                </td>
            </tr>
            <tr>
                <td>Wachtwoord:*</td>
                <td>
                    <input type="password" name="password" required="required" value="<?= !empty($form_data['password'])?$form_data['password']:'';?>">
                </td>
            </tr>
            <tr>
                <td>Herhaling wachtwoord:*</td>
                <td>
                    <input type="password" name="repeatpassword" required="required" value="<?= !empty($form_data['repeatpassword'])?$form_data['repeatpassword']:'';?>">
                </td>
            </tr>
            <tr>
                <td>Geslacht:*</td>
                <td>
                    <input type="text" name="gender" required="required" value="<?= !empty($form_data['gender'])?$form_data['gender']:'';?>">
                </td>
            </tr>
            <tr>
                <td>Straat:</td>
                <td>
                    <input type="text" name="street" value="<?= !empty($form_data['street'])?$form_data['street']:'';?>">
                </td>
            </tr>
            <tr>
                <td>postcode:</td>
                <td>
                    <input type="text" name="postal_code" value="<?= !empty($form_data['postal_code'])?$form_data['postal_code']:'';?>">
                </td>
            </tr>
            <tr>
                <td>Stad:</td>
                <td>
                    <input type="text" name="place" value="<?= !empty($form_data['place'])?$form_data['place']:'';?>">
                </td>
            </tr>
            <tr>
                <td>Email:</td>
                <td>
                    <input type="email" name="emailaddress" value="<?= !empty($form_data['emailaddress'])?$form_data['emailadress']:'';?>">
                </td>
            </tr>
            <tr>
                <td></td>
                    <td>
                        <input type="submit" value="voeg toe">
                    </td>
            </tr>
        </table>
    </form>
    <br >
</section>
<?php include 'include/footer.php';