<?php $this->title = "Inscription"; ?>
<div class="card shadow bg-light mb-3 text-center">
    <h2>Inscription</h2>
    <form method="post" action="../index.php?route=register">
        <label for="pseudo">Pseudo</label><br>
        <input type="text" id="pseudo" name="pseudo" value="<?= isset($post) ? htmlspecialchars($post->get('pseudo')) : ''; ?>"><br>
        <?= isset($errors['pseudo']) ? $errors['pseudo'] : ''; ?>
        <label for="password">Mot de passe</label><br>
        <input type="password" id="password" name="password"><br><br>
        <?= isset($errors['password']) ? $errors['password'] : ''; ?>
        <input type="submit" value="Inscription" id="submit" name="submit">
    </form>
    <br>
    <a href="../index.php"><button type="button" class="btn btn-info">Retour à l'accueil</button></a>
</div>