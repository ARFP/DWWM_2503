<?php 

get_header();

?>

<section class="card-container">

<?php

// THE LOOP BEGINS HERE
if(have_posts()) : // Si il y a des posts (articles, pages etc...) à afficher
    while(have_posts()): // Pour chaque post trouvé
        the_post(); // Chargement du post

        // image de mise en avant
        if(has_post_thumbnail()) { // si une image de mise en avant est attraché à l'article
            $th = get_the_post_thumbnail_url(null, 'large'); 
        } else { // pas d'image de mise en avant
            $th = get_template_directory_uri().'/img/nophoto.jpg';
        }

?>

<article class="card">
    <header class="card-header">
         <div class="card-thumb" style="background-image: url('<?= $th; ?>');">
        </div> 
        <h1>
            <a href="<?php the_permalink(); ?>">
                <?php the_title(); ?>
            </a>
        </h1>
        <p class="card-date"><?php echo get_the_date(); ?></p>
    </header>
    <section>
        
        <?php 
        if(is_singular()) { // si affichage d'un article
            the_content();
        } else {
            the_excerpt();  // si page d'archive (liste de posts)
        }
            
        ?>
    </section>
</article>

<?php
    endwhile;
endif;

// THE LOOP ENDS HERE

?> 

</section>

<?php


get_footer();