<?php


class AvisController {
    public function avis() {
        // Simulation de récupération d'avis depuis une base de données (remplacez ceci par votre propre logique).
        $avis = $this->getAvisFromDatabase();

        // Inclure l'en-tête de la page
        include 'views/commons/header.php';

        // Inclure le contenu principal (la vue des avis)
        include 'views/commons/espacepro_avis_view.php';

        // Inclure le pied de page
        include 'views/commons/footer.php';
    }

    private function getAvisFromDatabase() {
        // Connectez-vous à la base de données et récupérez les avis réels ici.
        // C'est un exemple simplifié pour simuler des avis.
        $avis = [
            [
                'id' => 1,
                'nom' => 'John',
                'prenom' => 'Doe',
                'note' => 4,
                'contenu' => 'Cet endroit est génial!',
                'created_at' => '2023-01-15',
            ],
            [
                'id' => 2,
                'nom' => 'Jane',
                'prenom' => 'Smith',
                'note' => 5,
                'contenu' => 'Service exceptionnel.',
                'created_at' => '2023-01-17',
            ],
        ];

        return $avis;

        
    }
}
