<?php include 'include/header.php';
include 'include/menu.php';?>
    <form method="post">
        <h3>Instructeur toevoegen</h3>
        <table>
            <caption><i>met een * verplicht om in te vuller</i></caption>
            <tr>
                <td>
                    <p>Voornaam *</p>
                </td>
                <td>
                    <input type="text" name="firstname" placeholder="jan">
                </td>
            </tr>
            <tr>
                <td>
                    <p>tussenvoegsel</p>
                </td>
                <td>
                    <input type="text" name="preprovision" >
                </td>
            </tr>
            <tr>
                <td>
                    <p>achternaam *</p>
                </td>
                <td>
                    <input type="text" name="lastname" placeholder="klaasen">
                </td>
            </tr>
            <tr>
                <td>
                    <p>inlognaam *</p>
                </td>
                <td>
                    <input type="text" name="loginname" placeholder="inlognaam">
                </td>
            </tr>
            <tr>
                <td>
                    <p>wachtwoord <br>
                        <i>(standaard qwerty)</i></p>
                </td>
                <td>
                    <input type="password" name="password" placeholder="password">
                </td>
            </tr>
            <tr>
                <td>
                    <p>geboorte datum *</p>
                </td>
                <td>
                    <input type="date" name="dateofbirth">
                </td>
            </tr>
            <tr>
                <td>
                    <p>geslacht *</p>
                </td>
                <td>
                    <input type="text" name="gender" placeholder="man/vrouw">
                </td>
            </tr>
            <tr>
                <td>
                    <p>emailadres *</p>
                </td>
                <td>
                    <input type="email" name="emailaddress" placeholder="email@example.com">
                </td>
            </tr>
            <tr>
                <td>
                    <p>datum aangenomen *</p>
                </td>
                <td>
                    <input type="date" name="hiring_date">
                </td>
            </tr>
            <tr>
                <td>
                    <p>salaris *</p>
                </td>
                <td>
                    <input type="text" name="salary" placeholder="00.00">
                </td>
            </tr>
            <tr>
                <td>
                    <p>straat & huisnummer</p>
                </td>
                <td>
                    <input type="text" name="street" placeholder="sesamstraat 5">
                </td>
            </tr>
            <tr>
                <td>
                    <p>postcode</p>
                </td>
                <td>
                    <input type="text" name="postal_code" placeholder="1234 AA">
                </td>
            </tr>
            <tr>
                <td>
                    <p>plaats</p>
                </td>
                <td>
                    <input type="text" name="place" placeholder="Amsterdam">
                </td>
            </tr>
            <tr>
                <td><input type="submit" value="Voeg toe"></td>
                <td><a href="?control=admin&action=instructors"><input type="button" value="Terug"></a></td>
            </tr>
        </table>
    </form>

<?php include 'include/footer.php';