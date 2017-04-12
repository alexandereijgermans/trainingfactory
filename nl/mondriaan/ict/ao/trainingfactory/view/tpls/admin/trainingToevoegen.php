<?php include 'include/header.php';
include 'include/menu.php';?>
    <form method="post">
        <h3>Training toevoegen</h3>
        <table>
            <caption><i>met een * verplicht om in te vuller</i></caption>
            <tr>
                <td>Omschrijving *</td>
                <td>
                    <input type="text" name="description" placeholder="Trainen">
                </td>
            </tr>
            <tr>
                <td>tijdsduur * <br><i>in minuten</i></td>
                <td>
                    <input type="text" name="duration" placeholder="60">
                </td>
            </tr>
            <tr>
                <td>extra kosten <br><i>in euro's</i></td>
                <td>
                    <input type="text" name="extra_costs" placeholder="5">
                </td>
            </tr>
            <tr>
                <td><input type="submit" value="Voeg toe"></td>
                <td><a href="?control=admin&action=trainingsvormen"><input type="button" value="Terug"></a></td>
            </tr>
        </table>
    </form>

<?php include 'include/footer.php';