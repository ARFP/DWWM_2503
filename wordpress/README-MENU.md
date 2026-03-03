# Menu Wordpress

## Créer et déclarer le menu

Dans le fichier `functions.php` de votre thème :

```php
// wp-content/mon-theme/functions.php

/**
 * Déclare un menu dont l'identifiant est 'main' et le nom est 'Menu Principal'
 * identifiant:; utilisé dans le code pour faire réféence à cet élément
 * nom : utilisé par Wordpress pour l'affichage dans l'administration
*/
function md_theme_menu_sidebar() {
    register_nav_menus([
        'main' => 'Menu Principal'
    ]);
}

/** Charge le menu déclaré dans la fonction ci-dessus */
add_action('init', 'md_theme_menu_sidebar');
```

Puis à l'endroit désiré dans votre thème  (par exemple, dans le header.php)

```php
/**
 * Affiche le menu dont l'identifiant est 'main'
*/
wp_nav_menu([
    'theme_location' => 'main'
])
```

- Voir le Tutoriel [Créer des menus Wordpress pour votre thème](https://capitainewp.io/formations/developper-theme-wordpress/menus-moteur-recherche/)


## Administrer le menu dans Wordpresss

Une fois le code précédent implémenté, direction l'administration de votre Wordpress dans "**Apparence --> Menus**" pour éditer votre menu.

- Voir le Tutoriel [Gérer ses menus dans l'administration de Wordpress](https://wordpress.com/fr/support/menus/)


## "Responsiver" le menu

Une fois le menu déclaré dans votre thème et paramétré dans l'administration de Wordpress, il aparaitra à l'emplacement souhaité et le code HTML ressemblera à :

```html
<div class="menu-toto-container">
    <ul id="menu-toto" class="menu">
        <li id="menu-item-37" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-home menu-item-37">
            <a href="/">Accueil</a>
        </li>
        <li id="menu-item-40" class="menu-item menu-item-type-taxonomy menu-item-object-category current-menu-item menu-item-has-children menu-item-40">
            <a href="/category/etoiles/" aria-current="page">Étoiles</a>
            <ul class="sub-menu">
                <li id="menu-item-38" class="menu-item menu-item-type-post_type menu-item-object-post menu-item-38">
                    <a href="/le-soleil/">Le Soleil</a>
                </li>
                <li id="menu-item-41" class="menu-item menu-item-type-post_type menu-item-object-post menu-item-41">
                    <a href="/toto-is-back/">Toto is back again</a>
                </li>
            </ul>
        </li>
    </ul>
</div>
```

Le code CSS suivant est à ajouter dans la feuille de style de votre thème

```css
/* MENU MOBILE */

#menuToggle {
    position: absolute;
    top: 36px;
    right: 36px;
}

.nav-menu {
    position: relative;
}

.menu {
    display: none;
    position: absolute;
    width: 100%;
    padding: 1rem;
    gap: .1rem;
    flex-direction: column;
    justify-content: flex-start;
    background-color: white;
    text-align: left;
}

.menu.active {
    display:flex;
}

.menu, .sub-menu {
    list-style: none;
    padding: 0;
}

.sub-menu {
    margin-left: 2rem;
}

.menu a {
    display: block;
    text-decoration: none;
    padding: 1rem;
    border: .1rem solid black;
    background-color: #00000010;
    transition: all ease .8s;
}

.menu a:hover {
    background-color: aqua;
}

/* MENU ECRANS LARGES */

@media all and (min-width:768px) {
    #menuToggle {
        display: none;
    }

    .menu {
        display: flex;
        flex-direction: row;
    }

    .sub-menu {
        display: none;
        margin-left: 0;
    }

    .menu-item:hover .sub-menu {
        display: block;
        position: absolute;
    }
} 
```

### 1. La Structure Mobile (Par défaut)

Le code commence par définir l'affichage pour les petits écrans (smartphones).

- `#menuToggle` : C'est un bouton "Hamburger". Il est positionné de manière absolue en haut à droite.
    - Dans le fichier header.php il est implémenté sous forme d'un lien : 
        - `<a href="#" id="menuToggle">≡</a>` 

- `.menu` : Par défaut, il est caché avec display: none.

- `.menu.active` : Lorsqu'on clique sur le #menuToggle, on ajoute cette classe pour faire apparaître le menu. Un autre clic sur le bouton fera disparaître le menu.

L'interaction avec le bouton #menuToggle est impléméntée en JavaScript

```js
// Le bouton "Hamburger"
const menuToggle = document.getElementById('menuToggle');
// Le conteneur du menu (à remplacer par l'id de votre menu généré dans le HTML)
const menu = document.querySelector('#menu-toto');

// Au clic sur le bouton menuToggle, ajoute ou supprime la classe "active" au conteneur du menu.
menuToggle.addEventListener('click', function() {
    menu.classList.toggle('active');
});
```


### 2. L'Adaptation Écrans Larges (@media)

Dès que l'écran dépasse 768px, le comportement change radicalement :

Disparition du bouton : Le #menuToggle devient inutile et est masqué (display: none).

**Menu Horizontal :** 
- La liste .menu repasse en flex-direction: row pour aligner les liens côte à côte.
- Sous-menus (Sub-menu) :
    - Ils sont cachés par défaut.
    - Ils n'apparaissent que lorsqu'on survole l'élément parent (.menu-item:hover .sub-menu). 
    - L'utilisation de position: absolute permet au sous-menu de se superposer au contenu.