<?php 
/**
 * Plugin Name: Signature Automatique 
 * Description: Ajoute une signature à la fin des articles
 * Author: Prénom NOM
 * Version: 1.0.2
 */

/**
 * Ajoute un bloc Copyright à la fin de chaque article.
 * @param string $content le contenu de l'article au format HTML
 * @return string Le contenu de l'article avec le bloc Copyright
 */
function mde_ajouter_signature($content) {

    $nom = get_option('mde_nom_copyright', 'DWWM2503');

    $ajout = '<hr><div>Copyright 2000-'. date('Y') .' ' .$nom. '. Tous droits réservés.</div>';

    return $content . $ajout;
}

add_filter('the_content', 'mde_ajouter_signature');

/**
 * Ajoute un avertissement avant le contenu d'un article la date de celui-ci est antérieure à 3 jours
 * @param string $content le contenu de l'article au format HTML
 * @return string  le contenu de l'article avec le bloc d'avertissement si l'article est antérieur à 3 jours. Sinon le contenu non modifié si l'article est plus récent.
 */
function mde_ajouter_message_vieux_articles($content) {

    if(is_single()) : // est ce qu'on est sur une page single ?
        
        $dateArticle = get_the_date('U');
        $dateAuj = date('U');
        $ecart2dates = $dateAuj - $dateArticle; // secondes entre les 2 dates

        if($ecart2dates > (3 * 24 * 60 * 60)) : // 3 jours
            $avertissement = '<div style="border:1px solid red;">Attention, cet article est plus vieux que son rédacteur !</div>';
            return $avertissement . $content;
        endif;
    endif;

    return $content; // retourne le contenu original sans modification

}

add_filter('the_content', 'mde_ajouter_message_vieux_articles');

/**
 * Filtre certains mots et les remplace par SCHTROUMF.
 * @param string $content le contenu de l'article au format HTML
 * @return le contenu de l'article filtré
 */
function mde_filtrer_les_mots($content) {
    $content = str_replace(['WordPress', 'article', 'écrire', 'le'], 'SCHTROUMF', $content);
    return $content;
}


add_filter('the_content', 'mde_filtrer_les_mots');


/**
 * Affiche un lien vers l'édition de l'article si l'utilisateur est ADMIN
 */
function mde_afficher_lien_modif_si_admin($content) {
    // Est ce que l'utilisateur connecté a les droits d'édition ?
    // Si oui : afficher le lien vers l'édition de l'article
    if(current_user_can('edit_posts')) {
        $lien = get_edit_post_link();
        $a = '<a style="background: pink; border: 1px solid pink; border-radius:50%; padding: .3rem;" href="' .$lien. '">🖉</a>';
        return $content . ' ' . $a;
    }

    return $content;
}

add_filter('the_content', 'mde_afficher_lien_modif_si_admin');


/**
 * Ajoute un élément dans le menu Admin pour accéder aux réglages du plugin.
 */
function mde_menu_reglages() {
    add_options_page(
        'Paramètres du plugin Signature', // Titre de la page de réglages
        'MySignature', // Libellé dans le menu ADMIN
        'manage_options', // Niveau de permission requis
        'mysignature',
        'mde_menu_reglages_afficher',
    );
}

add_action('admin_menu', 'mde_menu_reglages');

/**
 * Affiche la page de réglages du plugin
 */
function mde_menu_reglages_afficher() {

    $option_nom_copyright = get_option('mde_nom_copyright', 'DWWM2503');
    ?>
        <h1>Réglages du plugin MySignature</h1>
        <div>
            <form method="post" action="options.php">
                <?php 
                    settings_fields('mde_settings_group');
                    do_settings_sections('mde_settings_group');
                ?>
                <div>
                    <label>Nom dans le Copyright: </label>
                    <input type="text" name="mde_nom_copyright" value="<?= $option_nom_copyright ?>">
                </div>
                <div>
                    <?php submit_button(); ?>
                </div>
            </form>
        </div>
    <?php
}

/**
 * Sauvegarde des options en base de données
 */
function mde_sauvegarde_reglages() {
    register_setting('mde_settings_group', 'mde_nom_copyright');
}

add_action('admin_init', 'mde_sauvegarde_reglages');

