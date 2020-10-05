<?php $this->title = 'Administration'; ?>
<div class="card shadow bg-light mb-3">
    <h1>Administration</h1>
    <?= $this->session->show('add_chapter'); ?>
    <?= $this->session->show('edit_chapter'); ?>
    <?= $this->session->show('delete_chapter'); ?>
    <?= $this->session->show('unflag_comment'); ?>
    <?= $this->session->show('delete_comment'); ?>
    <?= $this->session->show('delete_user'); ?>
    <h3>Chapitre</h3>
    <a class="text-uppercase font-weight-bold" href="../index.php?route=addChapter">Nouveau chapitre</a>
    <br>

    <table>
        <tr>
            <td>Id</td>
            <td>Titre</td>
            <td>Contenu</td>
            <td>Date</td>
            <td>Actions</td>
        </tr>
        <?php foreach ($chapters as $chapter) : ?>

            <tr>
                <td><?= ($chapter->getId()); ?></td>
                <td><a href="../index.php?route=chapter&chapterId=<?= $chapter->getId(); ?>"><?= htmlspecialchars($chapter->getTitle()); ?></a></td>
                <td><?= substr($chapter->getContent(), 0, 150); ?></td>
                <td>Créé le : <?= htmlspecialchars($chapter->getCreatedAt()); ?></td>
                <td>
                    <div class="actions">
                        <a href="../index.php?route=editChapter&chapterId=<?= $chapter->getId(); ?>"><button type="button" class="btn btn-outline-info">Modifier</button></a>
                        <br>
                        <a href="../index.php?route=deleteChapter&chapterId=<?= $chapter->getId(); ?>"><button type="button" class="btn btn-danger">Supprimer</button></a>
                    </div>
            </tr>
        <?php endforeach; ?>
    </table>

    <h3>Commentaires signalés</h3>
    <table>
        <tr>
            <td>Id</td>
            <td>Pseudo</td>
            <td>Message</td>
            <td>Date</td>
            <td>Actions</td>
        </tr>
        <?php
        foreach ($comments as $comment) {
        ?>
            <tr>
                <td><?= htmlspecialchars($comment->getId()); ?></td>
                <td><?= htmlspecialchars($comment->getPseudo()); ?></td>
                <td><?= substr(htmlspecialchars($comment->getContent()), 0, 150); ?></td>
                <td>Créé le : <?= htmlspecialchars($comment->getCreatedAt()); ?></td>
                <td>
                    <a href="../index.php?route=unflagComment&commentId=<?= $comment->getId(); ?>"><button type="button" class="btn btn-outline-info">Désignaler le commentaire</button></a>
                    <a href="../index.php?route=deleteComment&commentId=<?= $comment->getId(); ?>"><button type="button" class="btn btn-danger">Supprimer le commentaire</button></a>
                </td>
            </tr>
        <?php
        }
        ?>
    </table>

    <h3>Utilisateurs</h3>
    <table>
        <tr>
            <td>Id</td>
            <td>Pseudo</td>
            <td>Date</td>
            <td>Rôle</td>
            <td>Actions</td>
        </tr>
        <?php
        foreach ($users as $user) {
        ?>
            <tr>
                <td><?= htmlspecialchars($user->getId()); ?></td>
                <td><?= htmlspecialchars($user->getPseudo()); ?></td>
                <td>Créé le : <?= htmlspecialchars($user->getCreatedAt()); ?></td>
                <td><?= htmlspecialchars($user->getRole()); ?></td>
                <td>
                    <?php
                    if ($user->getRole() != 'admin') {
                    ?>
                        <a href="../index.php?route=deleteUser&userId=<?= $user->getId(); ?>">Supprimer</a>
                    <?php } else {
                    ?>
                        Suppression impossible
                    <?php
                    }
                    ?>
                </td>
            </tr>
        <?php
        }
        ?>
    </table>
    <a href="../index.php"><button type="button" class="btn btn-info">Retour à l'accueil</button></a>