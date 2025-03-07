<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Docker</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 1vw;
            color: #fff;
            font-size: 250%;
            background-image: url("Katzenanimationen/katzenStatusKöpfe/johnpork.gif");
            background-size: 100px 100px; 
            background-repeat: repeat;
            animation: scrollBackground 4s linear infinite;
        }
        @keyframes scrollBackground {
        0% {
        background-image: url("Katzenanimationen/katzenStatusKöpfe/daquavius.avif");
        background-position: 0 0;
        }
        50% {
        background-image: url("Katzenanimationen/katzenStatusKöpfe/johnpork.gif");
        background-position: 100px 100px; 
        }
        100% {
        background-image: url("Katzenanimationen/katzenStatusKöpfe/daquavius.avif");
        background-position: 200px 200px; 
        }
        }
        
        li {
            text-align: justify;
            width:  25%;
            background-color: rgba(117, 50, 50, 0.81);
            padding: 0.2vw;
            border-style: ridge;
            border-width: 0.3vw;
            border-color: aqua;
            transition-duration: 0.3s;
            animation: blinking 2s linear infinite;
        }
        @keyframes blinking {
            0% {
            background-color: rgba(117, 50, 50, 0.81);
            }
            50% {
            background-color: rgba(43, 194, 16, 0.6);
            }
            100% {
            background-color: rgba(117, 50, 50, 0.81);
            } 
        }
        li:hover{
            background-color: rgba(196, 36, 36, 0.84);
            border-color: yellow;
        }
        a {
            font-weight: 600;
            color: orange;
            text-decoration: none;
        }
        a:hover {
            color: gold;
            text-decoration: underline;
        }

        #btn {
            margin-left: 5%;
            background-color: red;
            width: fit-content;
            padding: 0.5% 2.5%;
            background-color: rgba(128, 128, 128, 0.35);
            border-radius: 25px;
        }

        #btn a:hover{
            color: orange;
            text-decoration: none;
        }

    </style>
</head>
<body>
    <?php
    function listDirectory($dir) {
        $directories = [];
        $files = [];

        if ($handle = opendir($dir)) {
            while (false !== ($entry = readdir($handle))) {
                if ($entry != '.' && $entry != '..') {
                    $path = $dir . '/' . $entry;
                    if (is_dir($path)) {
                        $directories[] = $entry;
                    } else {
                        $files[] = $entry;
                    }
                }
            }
            closedir($handle);
        }

        sort($directories);
        sort($files);

        echo '<ul>';
        foreach ($directories as $directory) {
            $path = $dir . '/' . $directory;
            echo "<li><strong>[DIR]</strong> <a href='?dir=$path'>$directory</a></li>";
        }
        foreach ($files as $file) {
            $path = $dir . '/' . $file;
            echo "<li><a href='$path'>$file</a></li>";
        }
        echo '</ul>';
    }

    $currentDir = isset($_GET['dir']) ? $_GET['dir'] : '.';
    echo "<h2>Index of <span style='font-size: 90%;'>$currentDir</span></h2>";

    listDirectory($currentDir);

    if ($currentDir != '.' && $currentDir != '/') {
        $parentDir = dirname($currentDir);
        echo "<p id='btn'><a href='?dir=$parentDir'>Zurück</a></p>";
    }

    
    ?>

</body>
</html>