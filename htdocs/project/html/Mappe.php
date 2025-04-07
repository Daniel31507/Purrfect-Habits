<!DOCTYPE html>
<html lang="de">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mappe | Purrfect Habits</title>
    <?php
        echo '<link    href="../css/mappe.css'   . '?' . time() . '" rel="stylesheet">';
        echo '<script  src="../js/mappe.js'    . '?' . time() . '" defer></script>';
    ?>
</head>

<body>
    <div id="folder">
        <div id="leftPage">

        </div>
        <div id="rightPage">

        </div>
        <img src="../img/Mappe.png" alt="Mappe" id="folderImg">
    </div>
    
    <div id="bottomLine">
            <a href="./Hauptseite.php" id="returnLink">
        <div id="returnButton">
            Zurück
        </div>
    </a>
    <div id="btnAddNote" onclick="addNote()">
        +
    </div>
    </div>


</body>

</html>