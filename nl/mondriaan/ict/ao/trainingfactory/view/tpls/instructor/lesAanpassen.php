<?php include 'include/header.php';
include 'include/menu.php';?>
    <form method="post">
        <h3>De gegevens van <?= $person->getName()?></h3>
        <table>
            <tr>
                <td>
                    <p>Datum</p>
                </td>
                <td>
                    <input type="date" name="Datum" placeholder="jan" value="<?= $Lesson->getFirstname()?>">
                </td>
            </tr>
            <tr>
                <td>
                    <p>Tijd</p>
                </td>
                <td>
                    <input type="text" name="time" value="<?= $Lesson->getPreprovision()?>">
                </td>
            </tr>
            <tr>
                <td>
                    <p>Sport</p>
                </td>
                <td>
                    <input type="text" name="lastname" placeholder="klaasen" value="<?= $Lesson->getLastname()?>">
                </td>
            </tr>
            <tr>
                <td>
                    <p>Lokaal</p>
                </td>
                <td>
                    <input type="text" name="loginname" placeholder="inlognaam" value="<?= $Lesson->getLoginname()?>">
                </td>
            </tr>
            <tr>
                <td>
                    <p>Max aantal personen <br>
                        <i>(standaard qwerty)</i></p>
                </td>
                <td>
                    <input type="password" name="password" placeholder="password" value="<?= $person->getPassword()?>">
                </td>
            </tr>
            <tr>
                <td>
                    <p>geboorte datum *</p>
                </td>
                <td>
                    <input type="date" name="dateofbirth" value="<?= $person->getDateofbirth()?>">
                </td>
            </tr>
            <tr>
                <td>
                    <p>geslacht *</p>
                </td>
                <td>
                    <input type="text" name="gender" placeholder="man/vrouw" value="<?= $person->getGender()?>">
                </td>
            </tr>
            <tr>
                <td>
                    <p>emailadres *</p>
                </td>
                <td>
                    <input type="email" name="emailaddress" placeholder="email@example.com" value="<?= $person->getEmailaddress()?>">
                </td>
            </tr>
            <tr>
                <td>
                    <p>datum aangenomen *</p>
                </td>
                <td>
                    <input type="date" name="hiring_date" value="<?= $person->getHiringDate()?>">
                </td>
            </tr>
            <tr>
                <td>
                    <p>salaris *</p>
                </td>
                <td>
                    <input type="text" name="salary" placeholder="00.00" value="<?= $person->getSalary()?>">
                </td>
            </tr>
            <tr>
                <td>
                    <p>straat & huisnummer</p>
                </td>
                <td>
                    <input type="text" name="street" placeholder="sesamstraat 5" value="<?= $person->getStreet()?>">
                </td>
            </tr>
            <tr>
                <td>
                    <p>postcode</p>
                </td>
                <td>
                    <input type="text" name="postal_code" placeholder="1234 AA" value="<?= $person->getPostalCode()?>">
                </td>
            </tr>
            <tr>
                <td>
                    <p>plaats</p>
                </td>
                <td>
                    <input type="text" name="place" placeholder="Amsterdam" value="<?= $person->getPlace()?>">
                </td>
            </tr>
            <tr>
                <td><input type="submit" value="Opslaan"></td>
                <td><a href="?control=instructor&action=update"><input type="button" value="Terug"></a></td>
            </tr>
        </table>
    </form>

<?php include 'include/footer.php';