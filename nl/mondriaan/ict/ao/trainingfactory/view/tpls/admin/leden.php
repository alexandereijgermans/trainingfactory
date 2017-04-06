<?php include 'include/header.php';
include 'include/menu.php';?>
<h3>overzicht members</h3>
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
        <?php if($person->getRole() === 'member'):?>
            <tr>
                <td><?=$person->getName()?></td>
                <td><?=$person->getEmailaddress()?></td>
                <td><?=$person->getStreet()?></td>
                <td><?=$person->getPlace()?></td>
                <td><?=$person->getLoginname()?></td>
                <td><img src="img/bewerk.png" alt="bewerk"></td>
                <td><img src="img/verwijder.png" alt="verwijder"></td>

            </tr>
        <?php endif;?>
    <?php endforeach;?>
</table>
<?php include 'include/footer.php';