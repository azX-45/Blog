<?php $this->title = 'Accueil'; ?>
<img src="img/alaska.jpg">
<section class="homeheader ">
         <div class="container">
            <div class="row">
               <div class="col-lg-12 text-center ">
                  <h1 class="main-title text-center text-white font-italic">Billet simple pour l'Alaska</h1>
                  <h2 class="text-center text-white font-italic">Le nouveau roman en ligne!</h2>
               </div>
            </div>
         </div>


<?= $this->session->show('add_comment'); ?>
<?= $this->session->show('flag_comment'); ?>
<?= $this->session->show('delete_comment'); ?>
<?= $this->session->show('register'); ?>
<?= $this->session->show('login'); ?>
<?= $this->session->show('logout'); ?>
<?= $this->session->show('delete_account'); ?>
<?php
if ($this->session->get('pseudo')) {
    ?>
 <a href="../index.php?route=logout"></a>
    <a href="../index.php?route=profile"></a>
    <?php if($this->session->get('role') === 'admin') { ?>
        <a href="../index.php?route=administration"></a>
    <?php } ?>
    
    <?php
} else {
    ?>
    <a href="../index.php?route=register"></a>
    <a href="../index.php?route=login"></a>
    <?php
}
?>
<?php
foreach ($chapters as $chapter)
{
    ?>
    
    <div class=" offset-md-2 col-md-8 offset-sm-1 col-sm-10 mt-3 pb-3 card shadow bg-light mb-3 text-center">
    
        <h2><a href="../index.php?route=chapter&chapterId=<?= htmlspecialchars($chapter->getId());?>"><?= htmlspecialchars($chapter->getTitle());?></a></h2>
        <p><?= ($chapter->getContent());?></p>
        <p><?= htmlspecialchars($chapter->getAuthor());?></p>
        <p>Créé le : <?= htmlspecialchars($chapter->getCreatedAt());?></p>
    </div>
    <br>
    <?php
}
?>