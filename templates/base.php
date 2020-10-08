<!DOCTYPE html>
<html lang="fr">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta name="description" content="Billet simple pour l'Alaska, de Jean Rochefort exclusivement en ligne">

   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">


   <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
   <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
   <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css">
   <link rel="stylesheet" href="../css/style.css">
   <title>Blog de Jean Forteroche</title>
   <title><?= $title ?></title>
</head>

<body>

   <header class="bloc-page">
      <nav id="navbar-example2" class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
         <div class="container">
            <a class="navbar-brand text-white text-uppercase" href="/">Blog de Jean Forteroche</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggler" aria-controls="navbarToggler" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span></button>
            <ul class="nav collapse navbar-collapse flex-sm-column flex-md-row justify-content-md-end align-items-sm-start" id="navbarToggler">
               <li class="nav-item">
                  <a class="nav-link text-white text-uppercase" href="/">Accueil</a>
               </li>
               <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle nav-link text-white text-uppercase" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Connexion</a>
                  <div class="dropdown-menu">
                     <a class="dropdown-item nav-link text-black text-uppercase" href="../index.php?route=profile">Profil</a>
                     <a class="dropdown-item nav-link text-black text-uppercase" href="../index.php?route=administration">Administration</i></a>
               <li class="nav-item">
                  <a class="nav-link text-white text-uppercase" href="../index.php?route=logout"><i class="fas fa-sign-out-alt"></i></a>
               </li>
            </ul>
         </div>
      </nav>
   </header>
   <div id="content">
      <?= $content ?>
   </div>
</body>

</html>