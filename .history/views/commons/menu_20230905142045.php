<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#">Garrage Parrot - Espace Pro</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <?php if (!Securite::verifAccessSession()) : ?>
                <li class="nav-item">
                    <a class="nav-link" href="<?= URL ?>back/login">Connexion</a>
                </li>
            <?php else : ?>
                <li class="nav-item">
                    <a class="nav-link" href="<?= URL ?>back/admin">Accueil</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Gestionnaire Du Site
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="<?= URL ?>back/messagerie/visualisation">Messagerie</a>
                        <a class="dropdown-item" href="<?= URL ?>back/avis/visualisation">">Avis</a>
                        <a class="dropdown-item" href="<?= URL ?>back//visualisation">">Contenu</a>
                        <a class="dropdown-item" href="<?= URL ?>back/messagerie/visualisation">">Horaire</a>
                        <a class="dropdown-item" href="<?= URL ?>back/messagerie/visualisation">">Voitures d'Occasions</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= URL ?>back/deconnexion">Déconnexion</a>
                </li>
            <?php endif; ?>
        </ul>
    </div>
</nav>
