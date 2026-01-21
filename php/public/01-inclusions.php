<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
    // $_GET, $_POST, $_SERVER
    // GET, POST, PUT, PATCH, DELETE, HEAD, OPTIONS

    $page = $_GET['page'];
    //$page = strtolower($page); // A eviter
    //$page = mb_strtolower($page);
    $page = mb_convert_case($page, MB_CASE_LOWER); // minuscules

    switch($page) {
        case 'home':
            require '../src/views/home.php';
            break;
        case 'profil':
            require '../src/views/profil.php';
            break;
        default: 
            echo 'Page non trouvée !';
    }

    ?>
    <hr>
    <?php 
        var_export($_GET);

    ?>

    <hr>
    La suite du document !
</body>
</html>


