<?php $this->title = 'Mon profil'; ?>
<h1>Profil de l'utilisateur</h1>
<div class="card shadow bg-light mb-3">
<?= $this->session->show('update_password'); ?>
<div>
    <h2><?= $this->session->get('pseudo'); ?></h2>
    
    <a href="../index.php?route=updatePassword">Modifier mon mot de passe</a>
    <br>
    <a href="../index.php?route=deleteAccount">Supprimer mon compte</a>
</div>
<br>
<a href="../index.php">Retour à l'accueil</a>