<?php include 'include/header.php';
include 'include/menu.php';?>
<h3>Overzicht members</h3>
<table class="table">
    <tr class="top">
        <td>Naam</td>
        <td>Email</td>
        <td>Adres</td>
        <td>Woonplaats</td>
        <td>Gebruikersnaam</td>
        <td>Details</td>
        <td>Verwijderen</td>
    </tr >
    <?php foreach ($personen as $person):?>
        <?php if($person->getRole() === 'member' && $person->getDeleted() == 0):?>
            <tr>
                <td><?=$person->getName()?></td>
                <td><?=$person->getEmailaddress()?></td>
                <td><?=$person->getStreet()?></td>
                <td><?=$person->getPlace()?></td>
                <td><?=$person->getLoginname()?></td>
                <td><a href="?control=admin&action=ledenVeranderen&id=<?= $person->getId()?>"><img src="img/bewerk.png" alt="bewerk"></a></td>
                <td><a href="?control=admin&action=deleteLid&id=<?= $person->getId()?>"><img src="img/verwijder.png" alt="verwijder"></a></td>

            </tr>
        <?php endif;?>
    <?php endforeach;?>
</table>
<?php include 'include/footer.php';