<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
    require '../src/Tools/functions.php';
    // $_GET, $_POST, $_SERVER
    // GET, POST, PUT, PATCH, DELETE, HEAD, OPTIONS

   /* if(isset($_GET['page'])) {
        $page = $_GET['page'];
    } else {
        $page = 'home';
    }*/

    /*$page = isset($_GET['page']) ? $_GET['page'] : 'home';*/

    $page = $_GET['page'] ?? 'home';

    //$page = $_GET['page'];
    
    afficher_page($page);
  

    ?>
    <hr>
    <?php 
        var_export($_GET);

    ?>

    <hr>
    La suite du document !
</body>
</html>


