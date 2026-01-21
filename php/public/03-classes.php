<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
    require '../src/Tools/Person.php';

    /** @var string $nom */
    $nom = $_GET['nom'] ?? 'Mike';
    $age = $_GET['age'] ?? 18;

    $person1 = new Person($nom, $age);
    //$person1 = new Person(age: $age, lastname: $nom);

    echo 'Bonjour ' . $person1->getLastname() . ', bienvenue.';
    echo '<hr>';
    echo 'Bonjour ' . $person1->getLastname() . ', bienvenue.';
  
    ?>
    <hr>
    <?php 
        var_export($_GET);

    ?>

    <hr>
    La suite du document !
</body>
</html>


