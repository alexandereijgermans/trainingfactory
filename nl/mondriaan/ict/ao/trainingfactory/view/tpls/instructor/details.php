<?php include 'include/header.php';
include 'include/menu.php';?>
<?php foreach ($deelnemers as $registration):?>
            <tr>                
                <td><?=$registration->getId()?></td>
            </tr>
    <?php endforeach;?>
<?php include 'include/footer.php';