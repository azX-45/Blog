<?php $this->title = 'Accueil'; ?>

<h1>Billet simple pour l'Alaska</h1>
<p>Le nouveau roman en ligne!</p>

<?= $this->session->show('add_comment'); ?>
<?= $this->session->show('flag_comment'); ?>
<?= $this->session->show('delete_comment'); ?>
<?= $this->session->show('register'); ?>
<?= $this->session->show('login'); ?>
<?= $this->session->show('logout'); ?>
<?= $this->session->show('delete_account'); ?>
<?php
if ($this->session->get('pseudo')) {
    ?>
 <a href="../index.php?route=logout">Déconnexion</a>
    <a href="../index.php?route=profile">Profil</a>
    <?php if($this->session->get('role') === 'admin') { ?>
        <a href="../index.php?route=administration">Administration</a>
    <?php } ?>
    
    <?php
} else {
    ?>
    <a href="../index.php?route=register">Inscription</a>
    <a href="../index.php?route=login">Connexion</a>
    <?php
}
?>
<?php
foreach ($chapters as $chapter)
{
    ?>
    <div>
        <h2><a href="../index.php?route=chapter&chapterId=<?= htmlspecialchars($chapter->getId());?>"><?= htmlspecialchars($chapter->getTitle());?></a></h2>
        <p><?= ($chapter->getContent());?></p>
        <p><?= htmlspecialchars($chapter->getAuthor());?></p>
        <p>Créé le : <?= htmlspecialchars($chapter->getCreatedAt());?></p>
    </div>
    <br>
    <?php
}
?>