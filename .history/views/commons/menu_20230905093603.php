<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#">Garrage Parrot E</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
              
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Gestionnaire Du Site
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="#">Messagerie</a>
                <a class="dropdown-item" href="#">Avis</a>
                <a class="dropdown-item" href="#">Contenu</a>
                <a class="dropdown-item" href="#">Horaire</a>
                <a class="dropdown-item" href="#">Voitures d'Occasions</a>
               
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="<?= URL ?>back/admin">Accueil Pro</a>
            </li>

            <?php if(Securite::verifAccessSession())?> <!--si ça return false, on retourne sur la page Login -->
            <li class="nav-item">
                <!--Pour la connexion à login, aprés l'url, on ajoutera back/login-->
                <a class="nav-link" href="<?= URL ?>back/login">Connexion</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="<?= URL ?>back/deconnexion">Déconnexion</a>
            </li>
        </ul>
    </div>
</nav>