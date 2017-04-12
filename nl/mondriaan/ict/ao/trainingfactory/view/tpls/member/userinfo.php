<?php include 'include/header.php';
include 'include/menu.php';?>
        <form  method="post" id="gebruiker_form">
            <table >
                <p class="userinfo top">Detail gegevens van  <?= $gebruiker->getName();?></p>
                <tr>
                    <td >Voornaam</td>
                    <td>
                        <input type="text" name="firstname" placeholder="vul verplicht je voornaam in." value="<?= $gebruiker->getFirstname();?>" required>
                    </td>
                </tr>
                <tr>
                    <td >Tussenvoegsel</td>
                    <td>
                        <input type="text" placeholder="vul optioneel tussenvoegsels in." name="preprovision" value="<?= $gebruiker->getPreprovision();?>">
                    </td>
                </tr>
                <tr>
                    <td >Achternaam</td>
                    <td>
                        <input type="text" name="lastname" placeholder="vul verplicht je achternaam in." value="<?= $gebruiker->getLastname();?>" required>
                    </td>
                </tr>
                 <tr>
                    <td >Gebruikersnaam</td>
                    <td>
                        <input type="text" placeholder="vul verplicht een gebruikersnaam in." name="loginname" value="<?= $gebruiker->getLoginname();?>" required>
                    </td>
                </tr>
                <tr>
                    <td >Geboortedatum</td>
                    <td>
                        <input type="date" name="dateofbirth" placeholder="vul een date in." value="<?= $gebruiker->getDateofbirth();?>" required>
                    </td>
                </tr>
                <tr>
                    <td >Gender</td>
                    <td>
                        <input type="text" name="gender" placeholder="vul een gender in."  value="<?= $gebruiker->getGender();?>" required>
                    </td>
                </tr>
                <tr>
                    <td >Email</td>
                    <td>
                        <input type="email" name="emailaddress"  placeholder="vul verplicht een emailadres in."  value="<?= $gebruiker->getEmailaddress();?>" required>
                    </td>
                </tr>
                <tr>
                    <td >Straatnaam</td>
                    <td>
                        <input type="text" name="street"  placeholder="vul verplicht een straatnaam in."  value="<?= $gebruiker->getStreet();?>">
                    </td>
                </tr>
                <tr>
                    <td >Zip code</td>
                    <td>
                        <input type="text" name="postal_code"  placeholder="vul verplicht een zipcode in."  value="<?= $gebruiker->getPostalCode();?>">
                    </td>
                </tr>
                <tr>
                    <td >Plaats</td>
                    <td>
                        <input type="text" name="place"  placeholder="vul verplicht een plaats in."  value="<?= $gebruiker->getPlace();?>">
                    </td>
                </tr>
            </table>
            <div class="userinfo">
                <input type="submit" value="verstuur" />
            </div></table>
        </form><br/> 
<?php include 'include/footer.php';
