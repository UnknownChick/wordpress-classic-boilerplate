<?php

switch ($hostname) {
    case 'lrgp.loc':
        define('WP_ENV', 'development');
        break;
    case 'lrgp.si-developpement.fr':
        define('WP_ENV', 'staging');
        break;
    case '':
        define('WP_ENV', 'production');
        break;
    default:
        die('Erreur de configuration de l\'environnement.');
}
