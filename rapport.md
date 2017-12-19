# La cuisine de ratatouille

![Ratatouille](https://i.imgur.com/XqUCiwt.png)


## Rapport de rendu

----

* Nicolas Argyriou & Marie-France Kommer
* [https://osr-etudiant.unistra.fr/~kommer/index.php](https://osr-etudiant.unistra.fr/~kommer/index.php)

----

## Choix techniques

#### Bootstrap

Nous avons utilisé Bootstrap pour le front end de toutes les pages. En conséquence, tout notre front-end est responsive et fonctionne sur téléphone sans problème.

Nous avons fait le choix d'utiliser un framework et en particulier bootstrap car

* Notre design semblait déjà suffisamment unique en lui-même ! Il peut bien supporter la fadeur d'un peu de bootstrap
* Les frameworks réduisent la répétition entre les projets
* Bootstrap est responsive par défaut
* Le fonctionnement de notre front-end est cohérent et constant d'une page à l'autre
* Bootstrap est rapide d'utilisation
* Bootstrap gère la compatibilité pour tous les navigateurs ce qui nous évite de mettre les mains dans ce genre de sorcelleries.
* Bootstrap a une grande communauté open source qui gère les détails d'implémentation et maintient les composants fondamentaux de notre design à notre place
* Comme ce projet s'est fait à deux, avoir un framework nous a permis d'être harmonieux dans notre style

#### Bootstrap-select 

Bootstrap-select est un plugin jQuery qui utilise les "dropdown menus" natifs de bootstrap pout leur apporter des fonctionnalités supplémentaire comme une barre de recherche.
Très joli et pratique, il est néamoins difficile de les manipuler avec du JS. En effet, une grande partie des éléments de leur DOM sont crées dynamiquement en toute fin de chargement de la page.
Par exemple, lorsque l'utilisateur connecté veut créer un nouveau planning, nous ne pouvons pas prévoir le nombre de menus qu'il veut y mettre. En conséquence, nous avons du créer un formulaire dynamique possédant un bouton qui affixe au formulaire des champs supplémentaire. 

Or, ces champs sont des 'select' avec barres de recherche de boostrap-select, et on ne peut pas *simplement* en rajouter dynamiquement. Pourquoi ?

##### Explication par le code : 

Un dropdown à 20 éléments s'écrit comme ça lors de la confection du HTML par le PHP:

```php
<select title=" " name="selectIng" class="selectpicker" data-live-search="true">
    <option>oeuf</option>
    <option>farine</option>
    <option>lait</option>
    <option>sel</option>
    <option>huile d'olive</option>
    <option>beurre</option>
    <option>spagetthi</option>
    <option>sauce tomate</option>
    <option>penne</option>
    <option>quinoa</option>
    <option>courgette</option>
    <option>Maggi</option>
    <option>Poulet</option>
    <option>Eau</option>
    <option>Sirop</option>
    <option>Pain de mie</option>
    <option>Jambon</option>
    <option>Pain</option>
    <option>Steack hache</option>
    <option>Laitue</option>
    <option>Parmesan</option>
</select>
```

En revanche, ce n'est pas ce que l'utilisateur voit. Une fois le javascript executé, le HTML devient CECI:

```php
<div class="btn-group bootstrap-select">
    <button type="button" class="btn dropdown-toggle bs-placeholder btn-default" data-toggle="dropdown" role="button" title=""><span class="filter-option pull-left"> </span>&nbsp;<span class="bs-caret"><span class="caret"></span></span></button>   
    <div class="dropdown-menu open" role="combobox">
        <div class="bs-searchbox"><input type="text" class="form-control" autocomplete="off" role="textbox" aria-label="Search"></div>
        <ul class="dropdown-menu inner" role="listbox" aria-expanded="false">
            <li data-original-index="1"><a tabindex="0" class="" data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span class="text">oeuf</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li>
            <li data-original-index="2"><a tabindex="0" class="" data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span class="text">farine</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li>
            <li data-original-index="3"><a tabindex="0" class="" data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span class="text">lait</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li>
            <li data-original-index="4"><a tabindex="0" class="" data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span class="text">sel</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li>
            <li data-original-index="5"><a tabindex="0" class="" data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span class="text">huile d'olive</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li>
            <li data-original-index="6"><a tabindex="0" class="" data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span class="text">beurre</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li>
            <li data-original-index="7"><a tabindex="0" class="" data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span class="text">spagetthi</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li>
            <li data-original-index="8"><a tabindex="0" class="" data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span class="text">sauce tomate</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li>
            <li data-original-index="9"><a tabindex="0" class="" data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span class="text">penne</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li>
            <li data-original-index="10"><a tabindex="0" class="" data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span class="text">quinoa</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li>
            <li data-original-index="11"><a tabindex="0" class="" data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span class="text">courgette</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li>
            <li data-original-index="12"><a tabindex="0" class="" data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span class="text">Maggi</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li>
            <li data-original-index="13"><a tabindex="0" class="" data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span class="text">Poulet</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li>
            <li data-original-index="14"><a tabindex="0" class="" data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span class="text">Eau</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li>
            <li data-original-index="15"><a tabindex="0" class="" data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span class="text">Sirop</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li>
            <li data-original-index="16"><a tabindex="0" class="" data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span class="text">Pain de mie</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li>
            <li data-original-index="17"><a tabindex="0" class="" data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span class="text">Jambon</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li>
            <li data-original-index="18"><a tabindex="0" class="" data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span class="text">Pain</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li>
            <li data-original-index="19"><a tabindex="0" class="" data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span class="text">Steack hache</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li>
            <li data-original-index="20"><a tabindex="0" class="" data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span class="text">Laitue</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li>
            <li data-original-index="21"><a tabindex="0" class="" data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span class="text">Parmesan</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li>
        </ul>
    </div>
    <select title=" " name="selectIng" class="selectpicker" data-live-search="true" tabindex="-98">
        <option class="bs-title-option" value=""> </option>
        <option>oeuf</option>
        <option>farine</option>
        <option>lait</option>
        <option>sel</option>
        <option>huile d'olive</option>
        <option>beurre</option>
        <option>spagetthi</option>
        <option>sauce tomate</option>
        <option>penne</option>
        <option>quinoa</option>
        <option>courgette</option>
        <option>Maggi</option>
        <option>Poulet</option>
        <option>Eau</option>
        <option>Sirop</option>
        <option>Pain de mie</option>
        <option>Jambon</option>
        <option>Pain</option>
        <option>Steack hache</option>
        <option>Laitue</option>
        <option>Parmesan</option>
    </select>
</div>
```

Comme cette procédure est faite en toute fin de chargement de page et ne **peut pas** être rappelée une deuxième fois, il a été très difficile de faire ces formulaires dynamiques.


#### Hachage par défaut de PHP

Nous avons utilisé le hachage par défaut de php et non le sha-1 comme demandé sur le sujet. En effet, les fonctions par défaut utilisent `bcrypt` qui est un algorithme de hachage plus performant. Les fonctions par défaut prennent également la peine de saler les hash et de les rendre aléatoires, ce qui empêche toute une ribambelle d'attaques. Notre stockage de mots de passe ne peut donc pas être percé avec des rainbow tables.

#### Fonctions anti-injections SQL par défaut de PHP

Nous n'utilisons jamais la concaténation sur nos requêtes SQL. Nous utilisons à la place bindparam pour prévenir l'arrivée du [petit bobby tables](https://xkcd.com/327/) sur notre site.

#### Vulnérabilités XSS

Notre site est hautement vulnérable au cross-site scripting et à l'injection de javascript. Sanitiser les entrées de l'utilisateur est sur la liste des choses à faire pour éviter que des petits malins ruinent nos pages et volent les sessions/cookies des gens. (qui ne contiennent rien d'intéressant)

## Features implémentées

Tout le projet n'est pas encore terminé. La partie administration est inachevée, en revanche, tout le reste fonctionne !

L'esprit du design modèle-vue-controlleur a été respecté.

#### Vérification de formulaire

Un script a été fait pour gérer la vérification de nos formulaires. Le coeur est situé dans le dossier "js"
Il permet notamment d'éviter à l'utilisateur de réécrire tout un formulaire s'il s'est trompé en le complétant. Sans ce script, une alerte apparaît indiquant à l'utilisateur ce qu'il a oublié et la page est rechargée (sans les données du formulaire - pas idéal...)

Lorsque ce script est inclus dans une page, tous les éléments d'un certain type (input & textarea en général) sont affublés d'event listeners 

Si la classe "non-empty" est précisée sur cet élément ou n'importe lequel de ses parents, alors le script ne laissera pas l'utilisateur s'en sortir s'il tente de "submit" ce formulaire, en plus de le notifier "on the fly" lorsqu'il édite le formulaire de la validité de ses entrées.

Nous vérifions que l'utilisateur a bien rempli tous les champs requis sur les pages d'inscription, de création de recette et sur la création de plannings.

... Et ce n'était pas trivial du tout...! En effet, vous seriez surpris de la variété des inputs que nous avons dans les formulaires, notamment ceux de bootstrap-select.

Certains n'ont pas de value. Certains existent mais n'ont pas d'entité visuelle sur le DOM. Impossible donc de "simplement" colorier la bordure de l'input en question.

#### Inscription

L'inscription est fonctionnelle.
Le mot de passe de l'utilisateur est envoyé par $_POST au serveur. Si c'était un vrai site, nous aurions utilisé letsencrypt et forcé le HTTPS sur cette connexion.

Le mot de passe est ensuite réceptionné et son hash (`password_hash($pwd, PASSWORD_DEFAULT)`) est stocké dans la base.

Une fois inscrit, l'utilisateur est redirigé vers la page d'accueil où il y trouve un message lui certifiant qu'il est inscrit (action -> feedback visuel).

#### Connexion

La page de connexion fonctionne. 
L'utilisateur peut se connecter avec :
    
    * son login et son mot de passe,
    * son mail et son mot de passe (ceci permet à un utilisateur ayant oublié son login de tout de même se connecter),
    * son login, son mail et son mot de passe (dans ce cas, seul le login sera cherché dans la base de données).

Le mot de passe de l'utilisateur est envoyé par $_POST à nouveau. Il est ensuite vérifié avec `password_verify()`. 

Une fois connecté, l'utilisateur est redirigé vers la page d'accueil où il y trouve un message de bienvenue. Il y trouvera un nouvel espace "Mon espace" où il peut visualiser et créer des plannings ainsi que la possibilité de créer des recettes.

#### Déconnexion

La déconnexion vide entièrement les variables de la session de l'utilisateur. En effet la session est commune pour tout l'OSR donc nous avons pensé à vous, vous pouvez vous connecter sur le site d'un autre et venir chez nous sans que tout 
plante.

Une fois déconnecté, l'utilisateur est redirigé vers la page d'accueil où il y trouve un message d'au revoir.

#### Liste des recettes

Dans la page de liste des recettes, toutes les recettes sont présentées tel que ceci : 

* par une image,
* l'intitulé de la recette,
* l'id de la recette, 
* la difficulté (inratable, facile, normal, diffcile, héroïque),
* le prix (représenté par un glyphicon bootstrap euro pour signifier "très peu cher" et 5 glyphicons euro pour "très cher"),
* pour combien de personne la recette est prévue,
* l'id de l'utilisateur qui l'a créée.

Si c'était un vrai site, nous n'aurions pas laissé les différents id visibles mais dans le cadre de ce projet, nous avons cru bon de les laisser pour vérifier rapidement que toutes les informations sont présentes.

Trois recette s'affichent sur une même ligne si la taille de la fenêtre d'affichage/l'écran le permet, sinon, bootstrap, qui nous le répétons, est responsive par défaut, permet de n'en mettre que deux voir une.
Toutes les recettes sont bien affichées.

L'image affichée pour chaque recette est une image par défaut (nous ne sommes pas allés jusqu'à afficher celles entrées dans la base de données).
Ainsi, cette page est fonctionnelle et discutablement très mignonne.

#### Création de recettes

La création de recettes est opérationnelle. Seuls les membres y ont accès.

Toute la création se fait en une page, en une seule étape atomique (nm. indivisibles, inséparables, faites en un coup), pour ne pas avoir à traiter le cas où l'utilisateur s'en va entre l'envoi des informations de la recette, celle des ingrédients, et celles des différentes étapes.

L'utilisateur est présenté à un formulaire dynamique récupérant : 

* recette (nom, description, difficulté, prix, nombre de personnes, [photo de la recette]),
* ingrédients (nom, quantité, pour chaque ingrédient),
* étapes (durée, description).

L'utilisateur peut cocher les ingrédients qu'il souhaite ajouter, et préciser à coté la quantité qu'il veut. 

Un grand effort a été déployé pour que l'utilisateur ne *puisse pas* se tromper et appuyer sur "submit" sans que tout soit rempli. Nous aimerions affirmer qu'il est idiot-proof... mais ça n'est pas possible. Des vérifications sont opérées lorsque des ingrédients se cochent, lorsque l'utilisateur change des valeurs dans les inputs, et lorsqu'il clique sur "submit". 

Au moment de l'envoi, si il manque quoi que ce soit, la page montre précisément à l'utilisateur quel champ fait défaut.

#### Mon espace

Tout l'espace personnel est fait (à l'exception du frigo et des courses, qui étaient facultatifs dans le sujet de web)

Si l'utilisateur est connecté, un bouton se débloque dans la navbar lui permettant d'accéder à la création de planning ou à la liste de ses plannings.

##### Ajout d'un nouveau planning

Les plannings fonctionnent ! 

Un formulaire dynamique (JS) se présente à l'utilisateur pour la création d'un planning. Il peut sélectionner la date d'expiration de son planning, et y ajouter autant de recettes qu'il veut grâce à un bouton "+", Chaque recette du planning est rattachée à un type, indiquant si c'est pour un petit déjeuner, un gouter, etc.

Encore une fois, le formulaire ne laisse pas l'utilisateur cliquer sur "submit" si tous les champs requis ne sont pas remplis, même dans le formulaire dynamique.

##### Listes des plannings de l'utilisateur

La liste des plannings a été difficile à concevoir. Pas tant à cause de problèmes techniques mais à cause de problème de présentation des données : comment présenter les plannings à l'utilisateur ?

Un planning est une liste de menus. 

Les menu étant des recettes associées à un type de repas.

Nous avons décidé d'afficher une première page qui liste les menus. On y trouve simplement l'id et la date d'expiration du planning.

Chaque planning est un lien vers une page permettant de visualiser ce planning. 

On y trouve la liste des menus : numéro dans la liste, id des menus, et type du menu (petit déjeuner, dîner, etc). 

Chaque menu est associé à une recette, c'est pourquoi, à la suite des menus, nous trouvons le numéro de la recette dans la liste (correspondant au numéro du menu associé) et l'intitulé de la recette.

Enfin, chaque recette dans le menu est un lien vers une page permettant de visualiser la recette et ses étapes.

#### Recherche par ingrédients & tris

Nous avons fait deux pages pour la recherche triée : une pour la recherche spécifique à un seul ingrédient et une pour la recherche pour au moins un ingrédient.
Nous avons gardé ces deux pages car nous aimons le design de la page de recherche par un seul ingrédient mais n'avons pas réussi à le reproduire pour la recherche par plusieurs ingrédients.
La recherche par un seul ingrédient utilise bootstrap-select. Pour les raisons évoquées plus haut, nous n'avons pas persisté à créer dynamiquement les éléments html permettant de demander plus d'un ingrédient pour la recherche.
La recherche par plusieurs ingrédients se fait en cochant les ingrédients à rechercher : tous les ingrédients sont affichés dans un tableau, en face d'une checkbox (comme pour une recherche par tags).

Dans ces deux pages, un dropdown permet à l'utilisateur de sélectionner un méthode de tri. Les matchs de la recherche seront affichés dans le bon ordre.

Aussi, nous vérifions que l'utilisateur a bien entré les informations voulues : au moins un ingrédient et un mode de tri, sinon, la reherche ne se fait pas et les bordures du/des champ(s) à compléter sont coloriées en rouge (voire "vérification des formulaires"). 

Dans la page de recherche par plusieurs ingrédients, il est vérifié que l'utilisateur à coché au moins un ingrédient à rechercher.

#### Administration des utilisateurs

Nous n'avons pas fait cette partie par manque de temps.

#### Ce que nous avons aimé ou non dans ce projet

La découverte de bootstrap et de ses plugins a été un défi que nous nous étions posé dès le début et nous pensons que les avantages de ce framework compensent assez bien ses inconvénients.

Ce framework offre un rendu qui nous plait et incarne un niveau d'abstraction supplémentaire appréciable, pour s'élever loin du CSS et de ses problèmes. Une fois passé l'étape de la documentation, le framework offre fonctionnalités très sympatiques et nous décharge d'une partie des besognes lourdes et répétitives du développement web.

Nous avons trouvé encore plus intéressante la partie sur la base de données que nous avions dû faire pour la première partie de ce projet. Ceci a rendu très concrêt la façon dont nous devons concevoir une base de données et l'utiliser. Si la base de données était à refaire, nous changerions sûrement certains détails (mettre le mail en UNIQUE par exemple) et aurions une vision plus globale et précise de son exploitation.

Aussi, les notions de "backend" et "frontend", POST et GET, queries et formulaires qui étaient jusqu'alors floues pour Marie-France ont été totalement éclairées. 

Nous avons rencontré des problèmes tout au long du projet avec nos sessions sur l'OSR. Nous avons fait appel à la Direction Informatique de l'université à plusieurs reprises (car ils sont sympas) pour réparer des choses mais cela a été fait tardivement, ce qui nous a handicapé lors de la réalisation de tout le projet. 

Nous avons dû coder "à l'aveugle" pas mal de fois, sans possibilités de tester en local puisque les softs Oracle sont propriétaires. 

** NOTE : ** Pour la postérité, le combo `ledit` et `sqlplus` n'est à ne jamais faire. Préférez rlwrap plutôt que ledit. 
Ledit casse aléatoirement les sessions OSR en se maintenant en processus zombie. Ce qui rend la session "busy" et inexploitable, n'ayant pas les permissions pour la tuer.

### Merci de nous avoir lu ! Nous vous souhaitons une bonne correction. Ce sujet était très intéressant à faire, notamment car nous n'avions jamais fait de php avant. Nous déplorons cependant le manque de temps et aurions bien voulu avoir jusqu'à janvier pour peaufiner les détails :(