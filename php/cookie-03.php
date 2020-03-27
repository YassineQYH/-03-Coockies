<?php    // Attention à ne pas laisser d'espace avant <?php !! Sinon on aura une erreur !!  Il ne faut aucun contenu avant !! 
setcookie('utilisateur', 'john', time() +60 *60 *24 *30);
        // Attention à ne pas inverser la ligne 2 et 4 !! Sinon on aura une erreur !!
var_dump($_COOKIE);

