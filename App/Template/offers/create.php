<?php
/** @var App\Data\CreateOfferDTO $data */
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
        <h1>Create New Offer</h1>
        <p class="message"></p>
        <form method="POST">
            <div>
                <input type="text" name="name" placeholder="Name..." />
            </div>
            <div>
                <input type="text" name="price" placeholder="Price..." />
            </div>
            <div>
                <input type="text" name="image_url" placeholder="Image url..." />
            </div>
            <div>
                <textarea name="description" placeholder="Give us some description about this offer..."></textarea>
            </div>
            <div>
                <select name="brand_id">
                    <?php foreach($data->getBrands() as $brandObj): ?>
                        <option value="<?= $brandObj->getId(); ?>"><?= $brandObj->getBrand(); ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div>
                <button type="submit" name="create_offer">Create</button>
            </div>
        </form>
    </main>

    <?php require_once 'App/Template/partials/_footer.php'; ?>
</body>

</html>