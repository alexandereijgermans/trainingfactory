<?php include 'include/header.php';
include 'include/menu.php';?>
    <form method="post">
        <h3>De gegevens van <?= $person->getName()?></h3>
        <table>
            <caption><i>met een * verplicht om in te vuller</i></caption>
            <tr>
                <td>Voornaam *</td>
                <td>
                    <input type="text" name="firstname" placeholder="jan" value="<?= $person->getFirstname()?>">
                </td>
            </tr>
            <tr>
                <td>tussenvoegsel</td>
                <td>
                    <input type="text" name="preprovision" value="<?= $person->getPreprovision()?>">
                </td>
            </tr>
            <tr>
                <td>achternaam *</td>
                <td>
                    <input type="text" name="lastname" placeholder="klaasen" value="<?= $person->getLastname()?>">
                </td>
            </tr>
            <tr>
                <td>inlognaam *</td>
                <td>
                    <input type="text" name="loginname" placeholder="inlognaam" value="<?= $person->getLoginname()?>">
                </td>
            </tr>
            <tr>
                <td>wachtwoord <br>
                        <i>(standaard qwerty)</i></td>
                <td>
                    <input type="password" name="password" placeholder="password" value="<?= $person->getPassword()?>">
                </td>
            </tr>
            <tr>
                <td>geboorte datum *</td>
                <td>
                    <input type="date" name="dateofbirth" value="<?= $person->getDateofbirth()?>">
                </td>
            </tr>
            <tr>
                <td>geslacht *</td>
                <td>
                    <input type="text" name="gender" placeholder="man/vrouw" value="<?= $person->getGender()?>">
                </td>
            </tr>
            <tr>
                <td>emailadres *</td>
                <td>
                    <input type="email" name="emailaddress" placeholder="email@example.com" value="<?= $person->getEmailaddress()?>">
                </td>
            </tr>
            <tr>
                <td>straat & huisnummer</td>
                <td>
                    <input type="text" name="street" placeholder="sesamstraat 5" value="<?= $person->getStreet()?>">
                </td>
            </tr>
            <tr>
                <td>postcode</td>
                <td>
                    <input type="text" name="postal_code" placeholder="1234 AA" value="<?= $person->getPostalCode()?>">
                </td>
            </tr>
            <tr>
                <td>plaats</td>
                <td>
                    <input type="text" name="place" placeholder="Amsterdam" value="<?= $person->getPlace()?>">
                </td>
            </tr>
            <tr>
                <td><input type="submit" value="Opslaan"></td>
                <td><a href="?control=admin&action=leden"><input type="button" value="Terug"></a></td>
            </tr>
        </table>
        <?php if(!empty($data)):?>
        <table class="table">
            <tr class="top">
                <td>Datum</td>
                <td>Tijd</td>
                <td>Lokaal</td>
                <td>Sport</td>
                <td>Kosten</td>
                <td>Betaald</td>
            </tr >
            <tr>
                <td><?=$data->date?></td>
                <td><?=$data->time?></td>
                <td><?=$data->location?></td>
                <td><?=$data->description?></td>
                <?php if($data->extra_costs == null):?>
                    <td>gratis</td>
                <?php else:?>
                    <td><?= $data->extra_costs?></td>
                <?php endif;?>
                <td><input type="checkbox" <?php if($data->payment == '1'):?> checked <?php endif;?>></td>
            </tr>
        </table>
    <?php endif;?>
    </form>

<?php include 'include/footer.php';