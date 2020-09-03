
<?php $this->title = "Nouveau Chapitre"; ?>
<h1>Nouveau chapitre</h1>


<div>
    
    <?php include('form_chapter.php');?>
    <a href="../index.php">Retour à l'accueil</a>
</div>

<?php
$route = isset($post) && $post->get('id') ? 'editChapter&chapterId='.$post->get('id') : 'addChapter';
$submit = $route === 'addChapter' ? 'Envoyer' : 'Mettre à jour';
?>
