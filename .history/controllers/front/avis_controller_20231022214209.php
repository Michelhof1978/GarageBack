<?php

require_once(__ROOT__.'\models\back\admin_manager.php');
class AvisController {
    public function avis() {
        // Simulation de récupération d'avis depuis une base de données (remplacez ceci par votre propre logique).
        $avis = $this->getAvisFromDatabase();

      

        // Inclure le contenu principal (la vue des avis)
        include 'views/commons/espacepro_avis_view.php';

       
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
                'comentaire' => 'Cet endroit est génial!',
                'created_at' => '2023-01-15',
            ],
            [
                'id' => 2,
                'nom' => 'Jane',
                'prenom' => 'Smith',
                'note' => 5,
                'co' => 'Service exceptionnel.',
                'created_at' => '2023-01-17',
            ],
        ];

        return $avis;

        
    }
}
