
<table class="table table-striped table-responsive">
    <thead>
        <tr>
            <th>Modell</th>
            <th>Gyorsítás</th>
            <th>WLTP</th>
            <th>Ülések</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($cars as $car): ?>
        <tr>
            <td><?= $car->getModel() ?></td>
            <td><?= $car->getAcceleration() . " s" ?></td>
            <td><?= $car->getWltp() . " km" ?></td>
            <td><?= $car->getSeats() ?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
