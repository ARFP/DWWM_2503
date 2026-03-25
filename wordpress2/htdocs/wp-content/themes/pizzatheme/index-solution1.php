<?php 

get_header();

?>

<section class="card-container">

<?php

// THE LOOP BEGINS HERE
if(have_posts()) : // Si il y a des posts (articles, pages etc...) à afficher
    while(have_posts()): // Pour chaque post trouvé
        the_post(); // Chargement du post
?>

<article class="card">
    <header>
        <div class="card-thumb">
            <?php 
                if(has_post_thumbnail()) { // si une image de mise en avant est attraché à l'article
                    the_post_thumbnail('large'); 
                } else { // pas d'image de mise en avant
                    echo '<img src="'.get_template_directory_uri().'/img/nophoto.jpg" alt="">';
                }
            ?>
        </div>
        <h1>
            <a href="<?php the_permalink(); ?>">
                <?php the_title(); ?>
            </a>
        </h1>
        <p class="card-date"><?php echo get_the_date(); ?></p>
    </header>
    <section>
        
        <?php the_excerpt(); ?>
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