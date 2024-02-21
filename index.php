<?php
    declare(strict_types=1);
    error_reporting(E_ALL);

    require __DIR__ . '/vendor/autoload.php';

    $whoops = new \Whoops\Run;
    $whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
    $whoops->register();

    use App\Model\Tesla;
    include("src/data.php");

    $mit = (isset($_GET["mit"]) && in_array($_GET["mit"], ["tablazat", "grid"])) ? $_GET["mit"] : "";
    $modelArray = array_keys(Tesla::getModels());
    $model = isset($_GET["model"]) && in_array($_GET["model"], $modelArray) ? $_GET["model"] : "";
    
    $title = "Tesla autók";
    $carsToBeShown = [];
    if ($model == "")
    {
        $carsToBeShown = $cars;
    }
    else
    {
        foreach ($cars as $car)
        {
            if (str_contains($car->getModel(), Tesla::getModels()[$model]))
            {
                $carsToBeShown[] = $car;
            }
        }
    }

    if ($mit == "grid")
    {
        $title = "Tesla autók (" . count($carsToBeShown) . ") találat";
    }

?>
<!DOCTYPE html>
<html lang="en">
    <head>

        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <link rel="stylesheet" href="./src/css/tesla.css">
        
        <title><?= $title ?></title>
        
    </head>
    <body>
    
        <?php include("menu.php"); ?>

        <main class="container">

            <h1><?= $title ?></h1>

            <?php switch($mit):
                case "": ?>

                    <ul>
                        <li>
                            <a href="index.php?mit=grid">Minden modell</a>
                        </li>

                        <?php foreach(Tesla::getModels() as $key => $carModel): ?>
                        <li>
                            <a href="index.php?mit=grid&model=<?= $key ?>"><?= $carModel ?></a>
                        </li>
                        <?php endforeach; ?>
                    </ul>

                <?php break; ?>
                <?php case "tablazat": ?>

                    <?php include("table.php") ?>
                
                <?php break; ?>
                <?php case "grid": ?>

                    <?php include("grid.php") ?>
                
                <?php break; ?>
            <?php endswitch; ?>

        </main>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    </body>
</html>
