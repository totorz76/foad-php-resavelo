<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <main>
        <h1>Ajouter un conducteur</h1>
        <?php
        require PATH_PROJET . '/includes/partials/header.php';
        ?>
        <form action="" method="POST">
            <div>
                <label for="name">Nom</label>
                <input type="text" name="name" id="name">
            </div>
            <div>
                <label for="price">Prix</label>
                <input type="number" name="price" id="price">
            </div>
            <div>
                <label for="quantity">Quantité</label>
                <input type="number" name="quantity" id="quantity">
            </div>
            <div>
                <label for="description">Description</label>
                <input type="text" name="description" id="description">
            </div>
            <div>
                <label for="image_url">URL de l'image</label>
                <input type="text" name="image_url" id="image_url">
            </div>
            <button type="submit" name="envoyer">Ajouter</button>
        </form>
    </main>
</body>

</html>