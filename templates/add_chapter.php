
<?php $this->title = "Nouveau Chapitre"; ?>
<h1>Blog de JeanForteroche</h1>
<p>Nouveau chapitre</p>

<div>
    <?php include('form_chapter.php');?>
    <a href="../index.php">Retour à l'accueil</a>
</div>

<?php
$route = isset($post) && $post->get('id') ? 'editChapter&chapterId='.$post->get('id') : 'addChapter';
$submit = $route === 'addChapter' ? 'Envoyer' : 'Mettre à jour';
?>
