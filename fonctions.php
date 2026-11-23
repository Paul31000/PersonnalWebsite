<?php


    function sauvegarderMail($nom, $email, $objet, $message)
    {
        $dossier = __DIR__ . '/mail/';

        // Créer le dossier s'il n'existe pas
        if (!is_dir($dossier)) {
            mkdir($dossier, 0750, true);
        }

        // Nom de fichier horodaté et unique
        $fichier = $dossier . date('Y-m-d_H-i-s') . '_' . bin2hex(random_bytes(4)) . '.txt';

        $contenu = "
            DATE : " . date('d/m/Y H:i:s') . "

            NOM : $nom
            EMAIL : $email
            OBJET : $objet

            MESSAGE :
            $message
            ";

        return file_put_contents($fichier, $contenu, LOCK_EX);
    }