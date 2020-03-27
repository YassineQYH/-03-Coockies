<?php

$age = null;

/* 2- Persister la date de naissance dans un cookie */    // D'abbord définir le cookie, comme ça, la suite de l'éxecution aura la valeur de la date d'annif.
/* Faire la vérification */
if (!empty($_POST['birthday'])) { // Donc s'il n'est pas vide
    setcookie('birthday', $_POST['birthday']); //On fait un setcookie qu'on va appeler 'birthday' et On met : la valeur entrer par l'utilisateur. // Je laisse le temps à 0, le cookie seras conservé que durant la visite de l'utilisateur
    /* $birthday = (int)$_POST['birthday']; */      // Je la sauvegarde dans une variable que j'appel "birthday" 
                                                    // Attention tout ce qu'on récupère en POST est en chaine de caractère - donc convertir en entier.
$_COOKIE['birthday'] = $_POST['birthday']; // Pour que le cookie ne soit pas défini que pour la prochaine requête mais directement ( sinon il faut cliquer 2x sur envoyer pour qu'il prenne en compte l'age.)
}     // Le set cookie ne va pas forcement remplir la valeur du dessus, il faut donc le faire manuellement.

/* ------------------------------------------------------------------------------------------------------------------------------------------------------------- */
/* ------------------------------------------------------------------------------------------------------------------------------------------------------------- */
/* 3A- Si l'utilisateur est assez agé, lui montrer le contenu  */ 
/* Mettre une condition */

if (!empty($_COOKIE['birthday'])) { // Permet de vérifier si on a déjà une valeur pour 'birthday' si oui, on va la récup dans une variable qu'on appel $birthday
    $birthday = (int)$_COOKIE['birthday']; 
    $age = (int)date('Y') - $birthday; // Maintenant, on calcule l'age de l'user. 
    // Pour avoir l'année en cours, on utilise la fonction date avec Y en paramètre, ça nous donne l'année sur 4 chiffres.
}

/* ------------------------------------------------------------------------------------------------------------------------------------------------------------- */
/* ------------------------------------------------------------------------------------------------------------------------------------------------------------- */

require '../inc/header.tpl.php';
include '../inc/nav.tpl.php';
?>

<!-- ------------------------------------------------------------------------------------------------------------------------------------------------------------- --> 
<!-- ------------------------------------------------------------------------------------------------------------------------------------------------------------- --> 
<!-- 
    - 1- Demander à l'utilisateur sa date de naissance (select 2010-1919)
    - 2- Persister la date de naissance dans un cookie
    - 3- Si l'utilisateur est assez agé, lui montrer le contenu  
    - 4- Sinon on affiche un message d'erreur 
-->

<!-- ------------------------------------------------------------------------------------------------------------------------------------------------------------- --> 
<!-- ------------------------------------------------------------------------------------------------------------------------------------------------------------- --> 
<!-- 3B- Si l'utilisateur est assez agé, lui montrer le contenu  -->
<?php if ($age && $age >= 18): ?> <!-- Si l'age est défini et que l'age est >= 18  -->
    <h1>Du contenu réservé aux adultes</h1> <!-- Dans ce cas la je vais pouvoir afficher les informations. -->
<?php elseif ($age): ?><!-- 4 --> <!-- Si l'age est défini ou on peut mettre ($age !== null) -->
<div class="alert alrt-danger">Vous n'avez pas l'age requis pour voir le contenu</div><!-- 4 -->
<?php else: ?> <!-- Dans le cas contraire, je vais dire à l'utilisateur qu'il n'a pas le droit d'accèder au site et je peux lui afficher le formulaire. -->
            <!-- Je suis censé voir un nouveau nom : birthday et une valeur à la date choisis dans la console cookie mais je ne le voit pas ! -->

<!-- 1 : Je fais une boucle qui nous permettra d'aller de 2020 à 1929 -->
    <form action="#" method="post">
        <div class="from-group">
            <label for="birthday">Section réservée pour les adultes, entrez votre année de naissance :</label>
            <select name="birthday" id="birthday" class="form-control">
                <?php for($i = 2020; $i > 1919; $i--): ?>                   
                <option value="<?= $i ?>"><?= $i ?><!-- 2020 --></option>
                <?php endfor ?> <!-- Je ferme ma boucle -->
            </select>
        </div>
                <button type="submit">Envoyer</button>
    </form>
    <?php endif; ?>            

<footer id="footer">


<?php include '../inc/footer.tpl.php'; ?>
