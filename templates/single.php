<?php $this->title = 'Chapter'; ?>
<img src="img/alaska2.jpg">
<div class=" offset-md-2 col-md-8 offset-sm-1 col-sm-10 mt-3 pb-3 card shadow bg-light mb-3">
    <h2><?= ($chapter->getTitle()); ?></h2>
    <p><?= ($chapter->getContent()); ?></p>
    <p><?= ($chapter->getAuthor()); ?></p>
    <p>Créé le : <?= htmlspecialchars($chapter->getCreatedAt()); ?></p>
</div>
<br>
<div class=" offset-md-2 col-md-8 offset-sm-1 col-sm-10 mt-3 pb-3 card shadow bg-light mb-3">

    <br>
    <div id="comments" class="text-left">
        <h3>Ajouter un commentaire</h3>
        <?php include('form_comment.php'); ?>
    </div>
    <h3>Commentaires</h3>

    <?php foreach ($comments as $comment) : ?>
        <h4><?= htmlspecialchars($comment->getPseudo()); ?></h4>
        <p><?= htmlspecialchars($comment->getContent()); ?></p>
        <p>Posté le <?= htmlspecialchars($comment->getCreatedAt()); ?></p>
        <?php
        if ($comment->isFlag()) {
        ?>
            <p>Ce commentaire a déjà été signalé</p>
        <?php
        } else {
        ?>
            <p><a href="../index.php?route=flagComment&commentId=<?= $comment->getId(); ?>">Signaler le commentaire</a></p>
        <?php
        }
        ?>
    <?php endforeach; ?>
</div>
<a href="../index.php"><button type="button" class="btn btn-info">Retour à l'accueil</button></a>