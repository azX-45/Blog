<?php $this->title = "Connexion"; ?>
<h1>Blog de JeanForteroche</h1>
<h2>Connexion au profil</h2>
<?= $this->session->show('error_login'); ?>
<div>
    <form method="post" action="../index.php?route=login">
        <label for="pseudo">Pseudo</label><br>
        <input type="text" id="pseudo" name="pseudo" value="<?= isset($post) ? htmlspecialchars($post->get('pseudo')): ''; ?>"><br>
        <label for="password">Mot de passe</label><br>
        <input type="password" id="password" name="password"><br>
        <input type="submit" value="Connexion" id="submit" name="submit">
    </form>
    <a href="../index.php">Retour à l'accueil</a>
</div>