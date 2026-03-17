# Gérer l'affichage des prestations

L'idée est de dire à WordPress : « Si tu cherches le design pour une Prestation, ne regarde pas dans le thème, regarde dans mon dossier de plugin ».

### 1. La structure des fichiers

Dans votre dossier `reservations-presta/`, créez un sous-dossier nommé `templates/` et placez-y un fichier nommé `single-prestation.php`.

### 2. Le code pour "forcer" l'utilisation du template

Ajoutez cette fonction à votre fichier principal de plugin. Elle sert d'aiguilleur du ciel pour WordPress.

```php
// 6. Charger le template depuis le plugin
add_filter('template_include', 'mde_charger_templates_prestation');

function mde_charger_templates_prestation($template) {
    // 1. Pour la page seule
    if (is_singular('prestation')) {
        $new_template = plugin_dir_path(__FILE__) . 'templates/single-prestation.php';
        if (file_exists($new_template)) return $new_template;
    }
    
    // 2. Pour la page ARCHIVE (la liste)
    if (is_post_type_archive('prestation')) {
        $new_template = plugin_dir_path(__FILE__) . 'templates/archive-prestation.php';
        if (file_exists($new_template)) return $new_template;
    }
    
    return $template;
}
```

### 3. Le contenu du fichier `templates/single-prestation.php`
Ce fichier sera le "vêtement" de votre prestation. Vous pouvez le styliser comme vous voulez.

```php
<?php get_header(); ?>

<main id="main" class="site-main" style="max-width: 800px; margin: 40px auto; padding: 20px;">
    <?php while (have_posts()) : the_post(); ?>
        
        <article>
            <h1><?php the_title(); ?></h1>
            
            <div class="prestation-image" style="margin-bottom: 20px;">
                <?php the_post_thumbnail('large'); ?>
            </div>

            <div class="prestation-content">
                <?php the_content(); ?>
            </div>

            <?php 
                $prix = get_post_meta(get_the_ID(), '_presta_prix', true);
                $duree = get_post_meta(get_the_ID(), '_presta_duree', true);
            ?>

            <div class="prestation-card" style="background: #fdf2f8; border: 2px solid #db2777; padding: 30px; border-radius: 15px; text-align: center;">
                <p style="font-size: 1.2rem;">⏱ Durée : <strong><?php echo esc_html($duree); ?></strong></p>
                <p style="font-size: 2rem; color: #db2777; margin: 10px 0;">Price : <?php echo esc_html($prix); ?> €</p>
                <a href="/contact" style="display: inline-block; background: #db2777; color: #fff; padding: 15px 30px; border-radius: 50px; text-decoration: none; font-weight: bold;">PRENDRE RENDEZ-VOUS</a>
            </div>
        </article>

    <?php endwhile; ?>
</main>

<?php get_footer(); ?>
```

### 4 Contenu de archive-prestation

```php
<?php get_header(); ?>

<main style="max-width: 1000px; margin: 40px auto; padding: 20px;">
    <h1>Nos Prestations de Coiffure</h1>

    <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(300px, 1fr)); gap: 20px;">
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <article style="border: 1px solid #ddd; padding: 20px; border-radius: 10px;">
                <?php the_post_thumbnail('medium', array('style' => 'width:100%; height:auto;')); ?>
                <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                
                <?php 
                    $prix = get_post_meta(get_the_ID(), '_presta_prix', true);
                    $duree = get_post_meta(get_the_ID(), '_presta_duree', true);
                ?>
                
                <p><strong>⏱ Durée :</strong> <?php echo esc_html($duree); ?></p>
                <p><strong>💰 Prix :</strong> <?php echo esc_html($prix); ?> €</p>
                
                <a href="<?php the_permalink(); ?>">Voir les détails</a>
            </article>
        <?php endwhile; endif; ?>
    </div>
</main>

<?php get_footer(); ?>
```

## Tri des prestations 

Pour trier les prestations par prix sur la page d'archive, nous allons utiliser une **`WP_Query`** personnalisée. C'est un concept fondamental : on ne se contente plus de ce que WordPress nous donne, on lui dicte l'ordre des résultats.

Voici comment mettre cela en place.

### 1. Ajouter le formulaire de tri (HTML)
Dans votre fichier `templates/archive-prestation.php`, juste avant le début de votre grille de prestations, ajoutez ce petit formulaire :

```php
<form method="get" style="margin-bottom: 30px; background: #f3f4f6; padding: 15px; border-radius: 8px;">
    <label for="tri_prix">Trier par prix :</label>
    <select name="ordre_prix" id="tri_prix" onchange="this.form.submit()">
        <option value="">Par défaut</option>
        <option value="ASC" <?php selected($_GET['ordre_prix'], 'ASC'); ?>>Du moins cher au plus cher</option>
        <option value="DESC" <?php selected($_GET['ordre_prix'], 'DESC'); ?>>Du plus cher au moins cher</option>
    </select>
</form>
```

### 2. Modifier la requête (PHP)

Il faut maintenant dire à WordPress : "Si l'utilisateur a choisi un ordre, modifie la liste". Ajoutez ce bloc dans votre fichier principal de plugin (`mde-reservation.php`) :

```php
// 7. Modifier l'ordre des prestations sur l'archive
add_action('pre_get_posts', 'mde_trier_prestations_prix');

function mde_trier_prestations_prix($query) {
    // On ne modifie la requête QUE sur le site (pas l'admin) et QUE pour l'archive prestation
    if (!is_admin() && $query->is_main_query() && is_post_type_archive('prestation')) {
        
        if (isset($_GET['ordre_prix']) && !empty($_GET['ordre_prix'])) {
            $query->set('meta_key', 'prestation_prix'); // On cible notre champ caché
            $query->set('orderby', 'meta_value_num'); // Tri numérique (et non alphabétique)
            $query->set('order', $_GET['ordre_prix']); // ASC ou DESC
        }
    }
}
```

### Rechercher une prestation


Pour ajouter une barre de recherche spécifique aux prestations, nous allons utiliser le paramètre HTML `name="s"`. C'est le nom réservé par WordPress pour déclencher sa propre mécanique de recherche interne.

Voici comment l'intégrer proprement dans votre archive.

### 1. Le code HTML (dans `templates/archive-prestation.php`)

Ajoutez ce formulaire juste au-dessus (ou à côté) de votre menu de tri :

```php
<form method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>" style="margin-bottom: 20px; display: flex; gap: 10px;">
    <input type="text" name="s" placeholder="Rechercher une prestation..." value="<?php echo get_search_query(); ?>" style="flex-grow: 1; padding: 10px; border-radius: 5px; border: 1px solid #ddd;">
    <input type="hidden" name="post_type" value="prestation">
    <button type="submit" style="background: #db2777; color: white; border: none; padding: 10px 20px; border-radius: 5px; cursor: pointer;">
        🔍 Rechercher
    </button>
</form>
```

---

### 2. Pourquoi ça fonctionne ? (L'astuce du `hidden`)

C'est le point le plus important à expliquer à vos élèves :

* **`name="s"`** : Quand WordPress voit ce paramètre dans l'URL (ex: `?s=coupe`), il change automatiquement sa requête pour chercher les mots-clés dans les titres et le contenu des articles.
* **`name="post_type" value="prestation"`** : Par défaut, la recherche WordPress fouille dans **tout** le site (pages, articles, prestations). En ajoutant ce champ caché, on force WordPress à filtrer les résultats pour n'afficher que le type `prestation`. 

### 3. Améliorer l'expérience : "Aucun résultat"

Si un client cherche "Massage" chez une coiffeuse, il faut gérer le cas où rien n'est trouvé. Dans votre boucle PHP, ajoutez le `else` :

```php
<div style="display: grid; ...">
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <?php endwhile; ?>
    
    <?php else : ?>
        <p style="grid-column: 1 / -1; text-align: center; padding: 40px; background: #f9f9f9;">
            Désolé, aucune prestation ne correspond à votre recherche.
        </p>
    <?php endif; ?>
</div>
```

---


