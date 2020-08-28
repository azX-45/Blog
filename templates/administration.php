<?php $this->title = 'Administration'; ?>

<h1>Mon blog</h1>
<p>En construction</p>
<?= $this->session->show('add_chapter'); ?>
<?= $this->session->show('edit_chapter'); ?>
<?= $this->session->show('delete_chapter'); ?>
<h2>Chapitre</h2>
<a href="../public/index.php?route=addChapter">Nouveau chapitre</a>

<table>
    <tr>
        <td>Id</td>
        <td>Titre</td>
        <td>Contenu</td>
        <td>Auteur</td>
        <td>Date</td>
        <td>Actions</td>
    </tr>
    <?php
    foreach ($chapters as $chapter)
    {
        ?>
        <tr>
            <td><?= htmlspecialchars($chapter->getId());?></td>
            <td><a href="../public/index.php?route=chapter&chapterId=<?= htmlspecialchars($chapter->getId());?>"><?= htmlspecialchars($chapter->getTitle());?></a></td>
            <td><?= substr(htmlspecialchars($chapter->getContent()), 0, 150);?></td>
            <td><?= htmlspecialchars($chapter->getAuthor());?></td>
            <td>Créé le : <?= htmlspecialchars($chapter->getCreatedAt());?></td>
            <td>
                <a href="../public/index.php?route=editChapter&chapterId=<?= $chapter->getId(); ?>">Modifier</a>
                <a href="../public/index.php?route=deleteChapter&chapterId=<?= $chapter->getId(); ?>">Supprimer</a>
            </td>
        </tr>
        <?php
    }
    ?>
</table>

<h2>Commentaires signalés</h2>

<h2>Utilisateurs</h2>