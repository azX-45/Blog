<?php
$route = isset($chapter) && $chapter->getId() ? 'editChapter&chapterId='.$chapter->getId() : 'addChapter';
$submit = $route === 'addChapter' ? 'Envoyer' : 'Mettre à jour';
$title = isset($chapter) && $chapter->getTitle() ? htmlspecialchars($chapter->getTitle()) : '';
$content = isset($chapter) && $chapter->getContent() ? htmlspecialchars($chapter->getContent()) : '';
$author = isset($chapter) && $chapter->getAuthor() ? htmlspecialchars($chapter->getAuthor()) : '';
?>

<form method="post" action="../public/index.php?route=<?= $route; ?>">
    <label for="title">Titre</label><br>
    <input type="text" id="title" name="title" value="<?= $title; ?>"><br>
    <label for="content">Contenu</label><br>
    <textarea id="content" name="content"><?= $content; ?></textarea><br>
    <label for="author">Auteur</label><br>
    <input type="text" id="author" name="author" value="<?= $author; ?>"><br>
    <input type="submit" value="<?= $submit; ?>" id="submit" name="submit">
</form>