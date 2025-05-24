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
        <div id="pages">
            <div id="leftPage">
                
            </div>
            <div id="rightPage">

            </div>
        </div>

        <img src="../img/Mappe.png" alt="Mappe" id="folderImg">
    </div>

    <div id="bottomLine">
        <a href="./Hauptseite.php" id="returnLink">
            <div id="returnButton">
                Zurück
            </div>
        </a>
        <div id="btnAddNote" onclick="openPopUp()">
            +
        </div>
    </div>


    <div id="popUpBack">
        <div id="addNotePopUp">
            <div id="btnExitPopUp" onclick="closePopUp()">
                X
            </div>
            <h2>Notiz erstellen</h2>
            <input type="text" id="noteInput">
            <div id="confirmNote" onclick="addNote()">
                Fertig
            </div>
        </div>
    </div>


</body>

</html>