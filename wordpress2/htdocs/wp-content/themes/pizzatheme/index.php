<?php 

get_header();

// THE LOOP BEGINS HERE
if(have_posts()) : // Si il y a des posts (articles, pages etc...) à afficher
    while(have_posts()): // Pour chaque post trouvé
        the_post(); // Chargement du post
?>

<article>
    <header>
        <h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
        <p>écrit par <?php the_author_link(); ?>, le <?php echo get_the_date(); ?></p>
    </header>
    <section>
        <?php the_post_thumbnail('large'); ?>
        <?php the_content(); ?>
    </section>
    <footer>
        <?php the_category(', '); ?>
    </footer>
</article>

<?php
    endwhile;
endif;

// THE LOOP ENDS HERE


get_footer();