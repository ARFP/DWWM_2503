## Partie 1 — Créer un thème WordPress from scratch

Cette section décrit, pas à pas, comment créer un thème WordPress minimal depuis zéro et le tester dans l'environnement local monté par Docker (`./wp_app`).

### 1) Arborescence minimale recommandée
Crée le dossier suivant dans le projet (chemin local monté dans le conteneur) :

```
./wp_app/wp-content/themes/mon-theme/
	├─ style.css
	├─ index.php
	├─ functions.php
	├─ header.php
	├─ footer.php
	├─ single.php
	├─ page.php
	├─ assets/
	│   ├─ main.css
	│   └─ main.js
	└─ screenshot.png
```

**Les fichiers `style.css` et `index.php` sont obligatoires pour que WordPress reconnaisse le thème.**

### 2) Fichiers essentiels (exemples)
Voici des exemples simples à placer dans `mon-theme` pour démarrer rapidement.

**style.css** (entête obligatoire) :

```css
/*
Theme Name: Mon Thème
Theme URI:  https://example.com
Author:      Votre Nom
Author URI:  https://example.com
Description: Thème minimal créé from scratch
Version:     0.1
License:     GNU General Public License v3 or later
Text Domain: mon-theme
*/
body { margin:0; padding:0; }
h1 { color: red; }
```

**functions.php** (charger assets et activer des supports) :

```php
<?php
function montheme_enqueue_assets() {
		wp_enqueue_style('montheme-style', get_stylesheet_uri(), array(), '0.1');
		wp_enqueue_style('montheme-main', get_template_directory_uri() . '/assets/main.css', array(), '0.1');
		wp_enqueue_script('montheme-main', get_template_directory_uri() . '/assets/main.js', array('jquery'), '0.1', true);
}
add_action('wp_enqueue_scripts', 'montheme_enqueue_assets');

function montheme_setup() {
		add_theme_support('title-tag');
		add_theme_support('post-thumbnails');
		register_nav_menus(array('primary' => 'Menu principal'));
}
add_action('after_setup_theme', 'montheme_setup');
```

**index.php** (boucle WordPress simplifiée) :

```php
<?php get_header(); ?>
<main>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    <article id="post-<?php the_ID(); ?>">
        <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
        <div><?php the_excerpt(); ?></div>
    </article>
<?php endwhile; else: ?>
		<p>Aucun contenu trouvé.</p>
<?php endif; ?>
</main>
<?php get_footer(); ?>
```

**header.php** (extrait) :

```php
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo('charset'); ?>">
<meta name="viewport" content="width=device-width,initial-scale=1">
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<header>
	<nav><?php wp_nav_menu(array('theme_location'=>'primary')); ?></nav>
</header>
```

**footer.php** (extrait) :

```php
<footer>
	<p>&copy; <?php echo date('Y'); ?> Mon site</p>
</footer>
<?php wp_footer(); ?>
</body>
</html>
```

### 3) Bonnes pratiques et options
- Séparer les parties réutilisables avec `get_template_part()` (ex. `template-parts/content.php`).
- Prévoir l'internationalisation : appeler `load_theme_textdomain()` dans `after_setup_theme`.
- Ne pas oublier d'ajouter des styles et scripts versionnés et d'utiliser `wp_enqueue_*` pour les charger.
- Si tu veux un thème block / FSE (Full Site Editing), la structure diffère (fichier `theme.json`, templates HTML). Dis-moi si tu préfères cette option.

### 4) Test et activation
1. Placer le dossier du thème dans `./wp_app/wp-content/themes/mon-theme/`.
2. Démarrer les conteneurs Docker (voir `docker-compose.yml`)
3. Accéder à l'administration WordPress, aller dans Apparence → Thèmes et activer `Mon Thème`.
4. Vérifier la page d'accueil, les articles et les pages.

---

**TODO :**
- générer ce starter minimal dans `./wp_app/wp-content/themes/mon-theme/` ;
- créer une version FSE (block theme) à la place ;
- ajouter des outils (Theme Check, Query Monitor) au projet pour faciliter les tests.


