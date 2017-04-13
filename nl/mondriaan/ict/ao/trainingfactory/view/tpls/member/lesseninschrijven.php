<?php include 'include/header.php';
include 'include/menu.php';?>
<table class="table"> 
    <caption class="top">
               Dit zijn alle beschikbare lessen
        </caption>
       <thead>
           <tr class="top">
               <td>Datum</td>
               <td>Tijd</td>
               <td>Lokaal</td>
               <td>Sport</td>
               <td>Kosten</td>  
               <td>Schrijf in</td> 
           </tr>
       </thead>
       <tbody>
       <?php foreach($lessen as $l):?>
           <tr>
               <td>
                   <?= $l->getDate();?></td>
               </td>
               
               <td>
                   <?= $l->getTime();?>
               </td>

               <td>
                   <?= $l->getLocation();?>
               </td>
               
               <td>
                   <?= $l->description;?>
               </td>
               
               <td>
                   <?= $l->extra_costs;?>
               </td>
               
                <td title="schrijf in voor activiteit">
                    <a href='?control=member&action=adddeelname&id=<?= $l->getId();?>'><center><img src="img/toevoegen.png" class="toevoegen"></center></a>
                </td>
           </tr>
       <?php endforeach;?>
       </tbody>
   </table><br/>
<?php include 'include/footer.php';