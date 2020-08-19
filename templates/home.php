<?php $this->title = 'Accueil'; ?>

<h1>Mon blog</h1>
<p>En construction</p>
<?= $this->session->show('add_chapter'); ?>
<?= $this->session->show('edit_chapter'); ?>
<?= $this->session->show('delete_chapter'); ?>
<?= $this->session->show('add_comment'); ?>
<?= $this->session->show('flag_comment'); ?>
<?= $this->session->show('delete_comment'); ?>
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