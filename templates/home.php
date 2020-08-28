<?php $this->title = 'Accueil'; ?>

<h1>Billet simple pour l'Alaska</h1>
<p>Le nouveau roman en ligne!</p>
<?= $this->session->show('add_chapter'); ?>
<?= $this->session->show('edit_chapter'); ?>
<?= $this->session->show('delete_chapter'); ?>
<?= $this->session->show('add_comment'); ?>
<?= $this->session->show('flag_comment'); ?>
<?= $this->session->show('delete_comment'); ?>
<?= $this->session->show('register'); ?>
<a href="../public/index.php?route=register">Inscription</a>
<a href="../public/index.php?route=login">Connexion</a>
<a href="../public/index.php?route=addChapter">Nouveau chapitre</a>
<?php
foreach ($chapters as $chapter)
{
    ?>
    <div>
        <h2><a href="../public/index.php?route=chapter&chapterId=<?= htmlspecialchars($chapter->getId());?>"><?= htmlspecialchars($chapter->getTitle());?></a></h2>
        <p><?= htmlspecialchars($chapter->getContent());?></p>
        <p><?= htmlspecialchars($chapter->getAuthor());?></p>
        <p>Créé le : <?= htmlspecialchars($chapter->getCreatedAt());?></p>
    </div>
    <br>
    <?php
}
?>