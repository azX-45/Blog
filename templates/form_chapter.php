<?php
$route = isset($post) && $post->get('id') ? 'editChapter&chapterId='.$post->get('id') : 'addChapter';
$submit = $route === 'addChapter' ? 'Envoyer' : 'Mettre à jour';
?>
<form method="post" action="../index.php?route=<?= $route; ?>">
    <label for="title">Titre</label><br>
    <input type="text" id="title" name="title" value="<?= isset($post) ? htmlspecialchars($post->get('title')): ''; ?>"><br>
    <?= isset($errors['title']) ? $errors['title'] : ''; ?>
    <label for="content">Contenu</label><br>
    <textarea id="content" name="content"><?= isset($post) ? htmlspecialchars($post->get('content')): ''; ?></textarea><br>
    <?= isset($errors['content']) ? $errors['content'] : ''; ?>
    <input type="submit" value="<?= $submit; ?>" id="submit" name="submit">
</form>
<script src="../node_modules/tinymce/tinymce.min.js"></script>
  <script>
    tinymce.init({
      selector: 'textarea',
      language: 'fr_FR'
    });
  </script>