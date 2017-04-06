<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Training Factory</title>
        <link rel="STYLESHEET" href="css/bezoeker.css" type="text/css">
    </head>
    <body>
        <header>
            <figure>
                <img src="img/logo.png" alt="logo">
                <h1> Training Centrum <br> Den Haag</h1>
            </figure>
            <form class="inlogFrom" method="post" autocomplete="off">
                    <table>    
                        <tr>
                            <td>
                                <input type="text" autocomplete="off" placeholder="gebuikersnaam" name="gn" value='<?= isset($gn)?$gn:"";?>' required="required" />
                            </td>
                        </tr>
                        <tr>
                           <td>
                                <input type="password" autocomplete="off" name="ww" placeholder="wachtwoord" required="required" />
                           </td>
                        </tr>
                        <tr>
                            <td>
                                <input class="btn" type="submit" value="inloggen"><input class="btn" type="reset" value="reset" />
                            </td>
                        </tr>
                    </table>
                </form>
        </header>
        <div class="clearfix"></div>
        <hr>
