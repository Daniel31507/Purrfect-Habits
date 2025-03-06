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
        }
        li {
            text-align: justify;
            width:  25%;
            background-color: rgba(128, 128, 128, 0.169);
            padding: 0.2vw;
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