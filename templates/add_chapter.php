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
