<?php

    $errorUpload = $_FILES["fichier"]["error"];   
    
    switch($errorUpload) {
        case UPLOAD_ERR_OK:
            echo ' Fichier uploadé :)';
            break;
        case UPLOAD_ERR_INI_SIZE:
            echo ' La taille du fichier téléchargé excède la valeur de upload_max_filesize, configurée dans le php.ini.';
            break;
        case UPLOAD_ERR_FORM_SIZE:
            echo ' La taille du fichier téléchargé excède la valeur de MAX_FILE_SIZE, qui a été spécifiée dans le formulaire HTML';
            break;
        case UPLOAD_ERR_PARTIAL:
            echo ' Le fichier n\'a été que partiellement téléchargé';
            break;
        case UPLOAD_ERR_NO_FILE:
            echo ' Aucun fichier n\'a été téléchargé';
            break;
        case UPLOAD_ERR_NO_TMP_DIR:
            echo ' Un dossier temporaire est manquant';
            break;
        case UPLOAD_ERR_CANT_WRITE:
            echo ' Échec de l\'écriture du fichier sur le disque';
            break;
        case UPLOAD_ERR_EXTENSION:
            echo ' Une extension PHP a arrêté l\'envoi de fichier.';
            break;
        default:
        echo ' Une autre erreur est survenue';
            break;
} 