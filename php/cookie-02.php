<!-- On aimerait maintenant, Récupérer les cookies -->
<!-- Lorsque l'utilisateur actualise la page, j'aimerais bien lui afficher son nom, en récupérant la valeur nom : utilisateur. -->

<?php   // Pour l'instant, je me contente juste de faire un var_dump
var_dump($_COOKIE); // Utilisez la super variable global $_COOKIE

// Si j'actualise la page, je vois bien que j'ai un tableau avec la clé que j'avais choisis "utilisateur"  et en valeur la chaine de caractère "John".
// Résultat : 
// array(1) { ["utilisateur"]=> string(4) "john" }

// Donc lorsque je veux récupérer des coockies, je lis la variable global $_COOKIE

