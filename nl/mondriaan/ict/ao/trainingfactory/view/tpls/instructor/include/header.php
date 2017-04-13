<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Training Factory</title>
    <link rel="STYLESHEET" href="css/member.css" type="text/css">
</head>
<body>
<header>
    <figure>
        <img src="img/logo.png" alt="logo">
        <h1> Training Centrum <br> Den Haag</h1>
    </figure>
    <p class="naam top">Welkom <?=$gebruiker->getName();?> <br>
    - <?= $gebruiker->getRole();?> -</p>
    <a href="?control=instructor&action=uitloggen" class="uitloggen btn"><button>uitloggen</button></a>
</header>
<div class="clearfix"></div>
<hr>
<center><?=isset($boodschap)?"<p id = 'boodschap'><em>$boodschap</em></p>":""?></center>
