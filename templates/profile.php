<?php $this->title = 'Mon profil'; ?>
<h1>Profil de l'utilisateur</h1>

<?= $this->session->show('update_password'); ?>
<div>
    <p><?= $this->session->get('pseudo'); ?></p>
    
    <a href="../public/index.php?route=updatePassword">Modifier mon mot de passe</a>
    <a href="../public/index.php?route=deleteAccount">Supprimer mon compte</a>
</div>
<br>
<a href="../public/index.php">Retour à l'accueil</a>