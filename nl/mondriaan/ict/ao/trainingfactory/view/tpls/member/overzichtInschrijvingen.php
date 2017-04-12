<?php include 'include/header.php';
include 'include/menu.php';?>
    <h3 class="top">Overzicht inschrijvingen</h3>
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
            <?php foreach($data as $d):?>
            <tr>
                <td><?=$d->date?></td>
                <td><?=$d->time?></td>
                <td><?=$d->location?></td>
                <td><?=$d->description?></td>
                <?php if($d->extra_costs == null):?>
                    <td>gratis</td>
                <?php else:?>
                    <td><?= $d->extra_costs?></td>
                <?php endif;?>
                <td><input type="checkbox" <?php if($d->payment == '1'):?> checked <?php endif;?>></td>
            </tr>
        <?php endforeach;?>
        </table>
    <?php else:?>
        <h3 class="top">U heeft zich nog niet ingeschreven voor lessen</h3>
    <?php endif;?>
 </div>
<?php include 'include/footer.php';