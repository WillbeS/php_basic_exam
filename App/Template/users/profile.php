<?php

/** @var App\Data\ProfileDTO $data */
/** @var array $errors  */
/** @var array $messages  */
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shoe Shelf</title>
    <link rel="stylesheet" href="public/styles/styles.css">
</head>

<body>
    <?php require_once 'App/Template/partials/_loggedin_header.php'; ?>

    <main>
        <div class="user-info">
            <div>
                <p>Email: <span><?= $data->getUser()->getEmail(); ?></span></p> |
                <p>My offers: <span>[<?= $data->getCount(); ?>]</span></p>
                <p><a href="logout.php">Logout</a></p>
            </div>
        </div>

        <div class="shoes">
            <?php foreach ($data->getOffers() as $offer) : ?>
                <div class="shoe">
                    <img src="someimage" />
                    <h3><?= $offer->getBrand()->getBrand(); ?> <span><?= $offer->getPrice(); ?></span></h3>
                </div>
            <?php endforeach; ?>
        </div>
        <p class="total-profit">Total profit: <span><?= $data->getTotalProfit() ?></span></p>
    </main>

    <?php require_once 'App/Template/partials/_footer.php'; ?>
</body>

</html>