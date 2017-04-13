<?php include 'include/header.php';
include 'include/menu.php';?>

    <form class="plannen" method="post">
        <h3 class="top">Lessen plannen</h3>
        <table>
            <caption><i>met een * verplicht om in te vullen</i></caption>
            <tr>
                <td>
                    <p>tijd *</p>
                </td>
                <td>
                    <input type="text" name="time" placeholder="00:00">
                </td>
            </tr>
            <tr>
                <td>
                    <p>datum *</p>
                </td>
                <td>
                    <input type="date" name="date" placeholder="00-00-0000">
                </td>
            </tr>
            <tr>
                <td>
                    <p>locatie *</p>
                </td>
                <td>
                    <input type="text" name="location" placeholder="de Groot">
                </td>
            </tr>
            <tr>
                <td>
                    <p>max personen *</p>
                </td>
                <td>
                    <input type="text" name="max_persons" placeholder="255">
                </td>
            </tr>
            <tr>
                <td>
                    <p>training *</p>
                </td>
                <td>
                    <select name="training">
                        <option value="" disabled="">kies een training</option>
                     
                        <?php foreach ($trainingen as $training):?>
                                 <option value="<?=$training->getId()?>"><?=$training->getDescription()?></option>
                       <?php endforeach;?>
                    </select>
                </td>
            </tr>
            <tr>
                    <td>
                        <input type="submit" value="voeg toe">
                    </td>
            </tr>
        </table>
    </form>

<?php include 'include/footer.php';