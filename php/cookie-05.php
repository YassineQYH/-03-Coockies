<!-- SAUVEGARDER DES INFORMATIONS PLUS COMPLEXE DANS UN COOKIE -->
<!-- Imaginon, j'ai un utilisateur qui n'est pas représenté par une chaine de caractère mais par un tableau. -->
<?php

$user = [
    'prenom' => 'John',
    'nom' => 'Doe',
    'age' => 18
];
/* Je veux sauvegarder ses informations dans un cookie */

/* setcookie('nom', $user['nom']); */   /* La premiere solution est de faire un setcookie, 
de lui dire qu'on sauvegarde séparemment le nom et on mettra le nom de l'utilisateur et on ferait des clés comme ça pour les différente chose. */

/* Une autre solution est de sauvegardé ce tableau la $user['nom'] et de le représenter sous forme de chaine de caractere. */
/* On à pour cela 2 méthode très interessante en PHP qui sont */
/* serialize :: génère une représentation stockable d'une valeur. :: On va lui passer une valeur de n'importe quel type et il va le convertir sous forme de chaine de caractere.*/
var_dump(serialize($user)); /* die(); */
/* Si j'actualise ma page ça me donne :: string(65) "a:3:{s:6:"prenom";s:4:"John";s:3:"nom";s:3:"Doe";s:3:"age";i:18;}"  */
/* On à une chaine de caractère qui ressemble un peu à n'importe quoi MAIS c'est une représentation sérialisé pour PHP */
/* L'avantage c'est que PHP est ensuite capable de désérialisé les choses :: CAD si je fais un var_dump((unserialize(de cette chaine de caractere la ))) il va être automatiquement en mesure de nous sortir notre tableau. */
var_dump(unserialize('a:3:{s:6:"prenom";s:4:"John";s:3:"nom";s:3:"Doe";s:3:"age";i:18;}' )); die();
               // a:3 = tableau de taille 3 // s:6 = une clé/chaine de caractère de 6 caractère 


require '../inc/header.tpl.php';
include '../inc/nav.tpl.php';
?>



<?php if ($nom): ?> 
    <h1>Bonjour <?= htmlentities($nom) ?></h1>
    <a href="cookie-04.2-profil.php?action=deconnecter">Se déconnecter</a>
<?php else: ?> 


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
