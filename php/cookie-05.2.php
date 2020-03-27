<!-- SAUVEGARDER DES INFORMATIONS PLUS COMPLEXE DANS UN COOKIE -->
<!-- Imaginon, j'ai un utilisateur qui n'est pas représenté par une chaine de caractère mais par un tableau. -->
<?php

$user = [
    'prenom' => 'John',
    'nom' => 'Doe',
    'age' => 18
];
/*Donc si jamais j'ai besoin de sauvegardé une information un peu complexe dans un cookie, mais attention, pas trop grosse ! Car on a quand même des limitations. */
/* On peut faire :  */
setcookie('utilisateur', serialize($user)); // La on ne le sauvegarde que pour la session.
// Si j'actualise, je vois bien que j'obtiens dans les cookies la version serialisé dans la valeur.



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
