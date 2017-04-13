<?php include 'include/header.php';
include 'include/menu.php';?>
    <h3>Overzicht Instructeurs <a href="?control=admin&action=instructorToevoegen"><img src="img/toevoegen.png" class="toevoegen" alt="instructor toevoegen"></a></h3>
    <table class="table">
        <tr class="top">
            <td>Naam</td>
            <td>Email</td>
            <td>Adres</td>
            <td>Woonplaats</td>
            <td>Gebruikersnaam</td>
            <td>Details</td>
            <td>Verwijderen</td>
        </tr>
        <?php foreach ($personen as $person):?>
            <?php if($person->getRole() === 'instructor' && $person->getDeleted() == 0):?>
                <tr>
                    <td><?=$person->getName()?></td>
                    <td><?=$person->getEmailaddress()?></td>
                    <td><?=$person->getStreet()?></td>
                    <td><?=$person->getPlace()?></td>
                    <td><?=$person->getLoginname()?></td>
                    <td><a href="?control=admin&action=instructorVeranderen&id=<?=$person->getId()?>"><img src="img/bewerk.png" alt="bewerk"></a></td>
                    <td><a href="?control=admin&action=delete&id=<?=$person->getId()?>"><img src="img/verwijder.png" alt="verwijder"></a></td>

                </tr>
            <?php endif;?>
        <?php endforeach;?>
    </table><br/>
<?php include 'include/footer.php';