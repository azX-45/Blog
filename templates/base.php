<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta name="description" content="Billet simple pour l'Alaska, de Jean Rochefort exclusivement en ligne">
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
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
                  <li class="nav-item">
                     <a class="nav-link text-white text-uppercase" href="index.php?route=login">Connexion</a>
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