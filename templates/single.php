
<?php $this->title = 'Chapter'; ?>
<h1>Blog de JeanForteroche</h1>
<p>Chapitre</p>
<div>
    <h2><?= htmlspecialchars($chapter->getTitle());?></h2>
    <p><?= htmlspecialchars($chapter->getContent());?></p>
    <p><?= htmlspecialchars($chapter->getAuthor());?></p>
    <p>Créé le : <?= htmlspecialchars($chapter->getCreatedAt());?></p>
</div>
<br>
<div class="actions">
    <a href="../public/index.php?route=editChapter&chapterId=<?= $chapter->getId(); ?>">Modifier</a>
    <a href="../public/index.php?route=deleteChapter&chapterId=<?= $chapter->getId(); ?>">Supprimer</a>
</div>
<br>

<div id="comments" class="text-left" style="margin-left: 50px">
    <h3>Ajouter un commentaire</h3>
    <?php include('form_comment.php'); ?>
    <h3>Commentaires</h3>
    
    <?php
    foreach ($comments as $comment)
    {
        ?>
        <h4><?= htmlspecialchars($comment->getPseudo());?></h4>
        <p><?= htmlspecialchars($comment->getContent());?></p>
        <p>Posté le <?= htmlspecialchars($comment->getCreatedAt());?></p>
        <?php
        if($comment->isFlag()) {
            ?>
            <p>Ce commentaire a déjà été signalé</p>
            <?php
        } else {
            ?>
            <p><a href="../public/index.php?route=flagComment&commentId=<?= $comment->getId(); ?>">Signaler le commentaire</a></p>
            <?php
        }
        ?>
        <p><a href="../public/index.php?route=deleteComment&commentId=<?= $comment->getId(); ?>">Supprimer le commentaire</a></p>
        <br>
        <?php
    }
    ?>
</div>
<a href="../public/index.php">Retour à l'accueil</a>