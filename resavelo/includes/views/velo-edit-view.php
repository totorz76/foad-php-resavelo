<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <main>
        <h1>Editer un vélo</h1>
        <?php
        require PATH_PROJET . '/includes/partials/header.php';
        ?>
        <form action="?velo_id=<?= $velo['velo_id'] ?>" method="POST">
            <div>
                <label for="name">Nom</label>
                <input type="text" name="name" id="name" value="<?= $velo['name'] ?>">
            </div>
            <div>
                <label for="price">Prix</label>
                <input type="number" name="price" id="price" value="<?= $velo['price'] ?>">
            </div>
            <div>
                <label for="quantity">Quantité</label>
                <input type="number" name="quantity" id="quantity" value="<?= $velo['quantity'] ?>">
            </div>
            <div>
                <label for="description">Description</label>
                <textarea name="description" id="description" cols="30" rows="10"><?= $velo['description'] ?></textarea>
            </div>
            <div>
                <label for="image_url">URL de l'image</label>
                <input type="text" name="image_url" id="image_url" value="<?= $velo['image_url'] ?>">
            </div>
            <button type="submit" name="envoyer">Envoyer</button>
        </form>
    </main>
</body>

</html>