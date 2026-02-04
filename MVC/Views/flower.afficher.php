<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Afficher FlowerController</h1>
    <h2>Ma fleur exemple</h2>

    <?php 
        echo '<div>';
        echo 'Id: ' . $flower->id. '<br>';
        echo 'Nom: ' . $flower->name. '<br>';
        echo 'Couleur: ' . $flower->color. '<br>';
        echo '</div>';
    ?>
</body>
</html>