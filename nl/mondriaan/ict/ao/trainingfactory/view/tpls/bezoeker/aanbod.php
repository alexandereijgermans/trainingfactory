<?php include 'include/header.php';
include 'include/menu.php';?>
<article class="aanbod">
    <b class="top">Trainings Aanbod</b><br/><br/>
    <table class="lesaanbod">
        <b>Er zijn <?= count($training);?> soorten trainingen.</b><br/><br/>
        <tr>
        <td class="lesaanbod"><b>Omschrijving</b></td><td class="lesaanbod"><b>Tijdsduur</b></td><td class="lesaanbod"><b>Extra Kosten</b></td>
        </tr>
         <?php foreach($training as $t):?>
            <tr>
                <td class="lesaanbod">
                    <?= $t->getDescription();?>
                </td>
                <td class="lesaanbod">
                    <?= $t->getDuration();?>
                </td>
                <td class="lesaanbod">
                    <?= $t->getExtraCosts();?>
                </td>
             </tr>
            <?php  endforeach;?>
    </table>
    <p>Let op, voor het sporten zijn dichte schoenen verplicht.  </p>
</article>

<?php include 'include/footer.php';
