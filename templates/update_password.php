<?php $this->title = 'Modifier mon mot de passe'; ?>
<h1>Blog de JeanForteroche</h1>
<p>Modifcation du mot de passe</p>
<div>
    <p>Le mot de passe de <?= $this->session->get('pseudo'); ?> sera modifié</p>
    <form method="post" action="../index.php?route=updatePassword">
        <label for="password">Mot de passe</label><br>
        <input type="password" id="password" name="password"><br>
        <input type="submit" value="Mettre à jour" id="submit" name="submit">
    </form>
</div>
<br>
<a href="../index.php">Retour à l'accueil</a>