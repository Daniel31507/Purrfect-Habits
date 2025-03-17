<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log In | Purrfect Habits</title>
    <?php
        echo '<link    href="../css/login.css'   . '?' . time() . '" rel="stylesheet">';
        echo '<script  src="../js/login.js'    . '?' . time() . '" defer></script>';
    ?>
</head>
<body>
    <div id="title">
        <img src="../img/purrfecthabits.png" >
    </div>


    <div id="content">
        <div id="logregBox">
            <div id="imgBox">
                <img src="../img/katze2.png">
                <div id="eye1"></div>
                <div id="eye2"></div>
            </div>

            <div id="login" onclick="start(1)">
                <p>Login</p>
            </div>
    
            <div id="register" onclick="start(2)">
                <p>Registrieren</p>
            </div>

        </div>

    </div>





    <div id="l_element1">
        <div id="l_element2">
            <div id="l_element3"></div>
        </div>
    </div>
    

    <div id="r_element1">
        <div id="r_element2">
            <div id="r_element3"></div>
        </div>
    </div>
</body>
</html>