<?php $this->title = "Nouveau Chapitre"; ?>
<h1>Mon blog</h1>
<p>En construction</p>
<div>
    <?php include('form_chapter.php');?>
    <a href="../public/index.php">Retour à l'accueil</a>
</div>

<?php
$route = isset($post) && $post->get('id') ? 'editChapter&chapterId='.$post->get('id') : 'addChapter';
$submit = $route === 'addChapter' ? 'Envoyer' : 'Mettre à jour';
?>
<form method="post" action="../public/index.php?route=<?= $route; ?>">
    <label for="title">Titre</label><br>
    <input type="text" id="title" name="title" value="<?= isset($post) ? htmlspecialchars($post->get('title')): ''; ?>"><br>
    <?= isset($errors['title']) ? $errors['title'] : ''; ?>
    <label for="content">Contenu</label><br>
    <textarea id="content" name="content"><?= isset($post) ? htmlspecialchars($post->get('content')): ''; ?></textarea><br>
    <?= isset($errors['content']) ? $errors['content'] : ''; ?>
    <label for="author">Auteur</label><br>
    <input type="text" id="author" name="author" value="<?= isset($post) ? htmlspecialchars($post->get('author')): ''; ?>"><br>
    <?= isset($errors['author']) ? $errors['author'] : ''; ?>
    <input type="submit" value="<?= $submit; ?>" id="submit" name="submit">
</form>