<?php include 'include/header.php';
include 'include/menu.php';?>
<div class="lalalal">
<h3 class="top">overzicht members</h3>
<table class="table">
    <tr class="top">
        <td>Datum</td>
        <td>Tijd</td>
        <td>Lokaal</td>
        <td>Sport</td>
        <td>Max aantal deelnemers</td>
        <td>Deelnemerslijst</td>
        <td>Aanpassen</td>
    </tr >
    <?php foreach ($lessen as $lesson):?>
            <tr>                
                <td><?=$lesson->getDate()?></td>
                <td><?=$lesson->getTime()?></td>
                <td><?=$lesson->getLocation()?></td>                
                <td><?=$lesson->getDescription()?></td>
                <td><?=$lesson->getMaxPersons()?></td>
           
                <td><a href="?control=instructor&action=details&id=<?= $lesson->getId()?>"><img src="img/details.png" alt="lijst" class="lijst"></a></td>
                <td><a href="?control=instructor&action=lesAanpassen&id=<?= $lesson->getId()?>"><img src="img/bewerk.png" alt="lijst" class="lijst"></a></td>
            </tr>
    <?php endforeach;?>
</table>
</div>
<?php include 'include/footer.php';