<?php include 'include/header.php';
include 'include/menu.php';?>
<section class="lalalal">
        <table>
            <caption class="top">Lessen</caption>    
                        <tr>
                            <td>datum:</td>
                            <td><?= $les->getDate();?></td>
                        </tr>
                        <tr >
                           <td>tijd:</td>
                           <td><?= $les->getTime();?></td>
                        </tr>
                         <tr >
                           <td>beschrijving:</td>
                           <td><?= $les->getDescription();?></td>
                        </tr>
                        
        </table>
    <br></br>
        <?php if(count($deelnemers)>0):?>
        <table class="table">
            <caption>Dit zijn de deelnemers</caption>
            <thead class="top">
                <tr>
                    <td>naam</td>
                    <td>adres</td>
                    <td>postcode</td>
                    <td>email</td>
                    <td>geboortedatum</td>
                </tr>
            </thead>
            <tbody>
                          <?php foreach($deelnemers as $p):?>
                       
                <?php foreach($personen as $deelnemer):?>
          <?php if($deelnemer->getId() == $p->getPersonId()):?>
                <tr>
                    
                    <td><?= $deelnemer->getName();?></td>
                    <td> <?= $deelnemer->getStreet();?></td>
                    <td> <?= $deelnemer->getPostalCode();?></td>
                    <td><?= $deelnemer->getEmailAddress();?></td>
                    <td><?= $deelnemer->getDateOfBirth();?></td>
                </tr>
                    <?php endif;?>
                <?php endforeach;?>
                
                <?php endforeach;?>
                
            </tbody>
        </table>
        <?php else:?>
        <p> geen deelnemers </p>
        <?php endif;?>
        
        <br  />
    </section>
<?php include 'include/footer.php';