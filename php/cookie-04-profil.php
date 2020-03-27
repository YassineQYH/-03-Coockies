<!-- Faire une page qui ne fonctionnera que si l'utilisateur à rentrer son nom. -->

<!-- 
    Donc par défaut on présentera un formulaire qui permettra de rentrer le nom de l'utilisateur qu'il soumettra 
    et ensuite si l'ont voit dans ses cookies on qu'on a le nom de l'utilisateur, 
    on pourra afficher : 
    Bonjour, 
    suivis de son nom.. 
-->

<?php

/* B */ /* B */
// Maintenant je veux afficher bonjour jean si le cookie est défini
// Avant de faire ma partie traitement, je peux vérifier si le cookie est défini.

$nom = null; // Par défaut cette valeur la je défini en amont et je met la valeur à NULL

if (!empty($_COOKIE['utilisateur'])) { // Si l'utilisateur existe, dans ce cas la je peux sauvegarder une variable $nom par exemple
    $nom = $_COOKIE['utilisateur'];
}
/* B */ /* B */
/* IL ME RESTE PLUS QU'à FAIRE UNE CONDITION */



/* A */ /* A */
// Avant d'inclure le header - avant même de renvoyer du contenu. C'est important ! On va vérifié si le formulaire à été posté. Faire la vérif suivante : 

    if (!empty($_POST['nom'])) {    // Si on a $_POST de name qui n'est pas vide
        setcookie('utilisateur', $_POST['nom']);// Dans ce cas la on va pouvoir le sauvegardé dans un cookie. // Je choisis date et emplacement par défaut donc je ne met rien.
        $nom = $_POST['nom']; // Quand je fait un :: setcookie :: tout de suite, je défini la valeur du nom de l'utilisateur.
    }            // Mais attention !! le nom de l'utilisateur c'est quelque chose qui justement est rentré par l'utilisateur. Donc il ne faut pas lui faire confiance
                // Il faut donc penser à échappé les choses en faisant un :: htmlentities :: Ne jamais oublier de faire ça sinon on à un risque en terme de sécurité !!

// RAPPEL COOKIE-03
// setcookie('utilisateur', 'john', time() +60 *60 *24 *30); 
/* A */ /* A */

require '../inc/header.tpl.php';
include '../inc/nav.tpl.php';
?>

<!--  C  --> <!-- Condition --> <!--  C  -->

<!-- Si le nom est défini, j'affiche : "Bonjour" suivis du nom -->
<?php if ($nom): ?> <!-- Si c'est défini -->
    <h1>Bonjour <?= htmlentities($nom) ?></h1> <!-- Dans ce cas la je met un titre avec afficher " Bonjour" suivis du nom de l'utilisateur  -->
    <!-- Si le nom n'est pas défini, j'affiche mon formulaire  -->
<?php else: ?> <!-- Et dans le cas contraire, j'affiche mon formulaire qui se trouve juste en dessous qui permettra de rentrer les informations. -->
<!--  C  --> <!-- Condition --> <!--  C  -->


    <div id="login">

        <form action="#" id="login-form" method="post" autocomplete="off" >

            <div id="form-title">Connexion</div>

            <div class="form-group">
                <label class="field-label" for="field-username"  >Nom</label>
                <input class="form-control" name="nom" placeholder="Entre votre nom" />
                <p class="field-info">Obligatoire - doit contenir au minimum 3 caractères</p>
            </div>

            
            <button id="login-submit">se connecter</button>

        </form>

    </div>

<?php endif; ?>

<footer id="footer">


<?php
include '../inc/footer.tpl.php';
?>

<!-- Maintenant si je me rend sur cette page, Mon navigateur à directement renvoyer Jean,
Si j'essaie sur un nouveau navigateur, par défaut il n'a pas de cookie qui à été renvoyer et il me propose de rentrer mon nom 
Puisque j'ai mis une date par défaut, il perd les donné à la fermeture de la page, donc il me redemandera mon nom si je ferme et que j'y retourne sur le même navigateur.-->

<!-- Annuler un cookie, il faut faire un setcookie dans le passé, VOIR PAGE cookie-04.2-profile.php-->