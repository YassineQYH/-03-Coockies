<!-- Définir un cookie qui contient le nom de l'utilisateur. -->

<?php                                      // ici ça équivaut à 1 mois.
setcookie('utilisateur', 'john', time() +60 *60 *24 *30); // en 1er = la clé     :: en second = la valeur    :: 3eme parametre = la date d'expiration

/* EXPIRES *//* ------------------ */
/* ------------ *//* ------------ */
// time() = la date du jour ( va donc expiré tout de suite)
// + 60 = 1 minute ( car 60 secondes )
// *60 = 1h
// *24 = une journée
// *30 = 30 jours

// Si on ne spécifie pas de paramètre ou si le paramètre vaut 0, le cookie expirera à la fin de la session.

/* ------------ *//* ------------ *//* ------------ *//* ------------ *//* ------------ *//* ------------ */
/* Ensuite ont choisis le chemin et le nom de domaine */
/* Si on ne choisis rien, par défaut ça prendra votre nom de domaine actuel et le chemin sur la racine*/
/* La plus part du temps, on ne définira le cookie qu'avec ces 3 paramètres la ! */
/* ------------ *//* ------------ *//* ------------ *//* ------------ *//* ------------ *//* ------------ */

/* PATH *//* --------------------- */
/* ------------ *//* ------------ */


/* DOMAIN *//* ------------------- */
/* ------------ *//* ------------ */

/* Maintenant si on sauvegarde et que l'on va voir sur l'inspecteur de la page 
dans l'En-tête :: Set-Cookie:   :: On retrouvera notre clé, la valeur et la date d'expiration. Et l'age maximum que PHP met automatiquement.  */

// Si je regarde dans Set-Cookie
// Je retrouve bien :
// utilisateur=john; expires=Thu, 16-Apr-2020 16:17:29 GMT; Max-Age=2592000

// Si je regarde dans la partie (application) ou (stockage) Dans le nom de domaine Localhost
// Je retrouve bien mon coockie.

// Il y a une limite de taille qui varie d'un navigateur à un autre mais généralement c'est +- 4-5kilo