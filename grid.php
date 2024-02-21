
<div class="row">
<?php foreach($carsToBeShown as $car): ?>

    <div class="col-4">
        <img src="<?= $car->getImagePath() ?>" alt="<?= $car->getModel() ?>" title="<?= $car->getModel() ?>" class="img-fluid">
        <p><b><?= $car->getModel() ?></b></p>
        <ul>
            <li>Gyorsulás: <?= $car->getAcceleration() ?></li>
            <li>Hatótáv: <?= $car->getWltp() ?></li>
            <li>Ülések száma: <?= $car->getSeats() ?></li>
        </ul>
    </div>

<?php endforeach; ?>
</div>
