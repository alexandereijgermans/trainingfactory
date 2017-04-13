<?php include 'include/header.php';
include 'include/menu.php';?>
    <h3>Overzicht trainingen <a href="?control=admin&action=trainingToevoegen"><img src="img/toevoegen.png" class="toevoegen" alt="training toevoegen"></a></h3>
    <table class="table">
        <tr class="top">
            <td>Omschrijving</td>
            <td>Tijd</td>
            <td>Extra kosten</td>
            <td>Details</td>
            <td>Verwijderen</td>
        </tr>
        <?php foreach ($trainingen as $training):?>
            <?php if($training->getDeleted() == 0):?>
                <tr>
                    <td><?=$training->getDescription()?></td>
                    <td><?=$training->getDuration()?></td>
                    <td><?=$training->getExtraCosts()?></td>
                    <td><a href="?control=admin&action=trainingVeranderen&id=<?=$training->getId()?>"><img src="img/bewerk.png" alt="bewerk"></a></td>
                    <td><a href="?control=admin&action=deleteTraining&id=<?=$training->getId()?>"><img src="img/verwijder.png" alt="verwijder"></a></td>
                </tr>
            <?php endif?>
        <?php endforeach;?>
    </table><br/>
<?php include 'include/footer.php';