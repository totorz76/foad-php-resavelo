<h1>Réserver : <?= htmlspecialchars($velo['name']) ?></h1>
<p>Prix par jour : <?= $velo['price'] ?> €</p>

<?php if ($error) : ?>
    <p style="color:red"><?= $error ?></p>
<?php endif; ?>

<form method="POST">
    <label>Date de début</label>
    <input type="date" name="start_date" required>

    <label>Date de fin</label>
    <input type="date" name="end_date" required>

    <button type="submit" name="envoyer">Confirmer la réservation</button>
</form>

<a href="index.php">⬅ Retour</a>
