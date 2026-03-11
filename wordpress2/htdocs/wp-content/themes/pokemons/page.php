<h2>page.php</h2>
<h3>Affichage d'un post de type "page"</h3>
<?php 
get_header();

if(have_posts()):
    while(have_posts()): 
        the_post();
    ?>

        <article>
            <header>
                <!-- Titre du post -->
                 <a href="<?php the_permalink(); ?>">
                    <?php the_title('<h1>', '</h1>'); ?>
                 </a>
                
                <!-- <h1><?php the_title(); ?></h1>
                <h1><?php echo get_the_title(); ?></h1>
                <h1><?= get_the_title(); ?></h1> -->
            </header>
            <section>
                <!-- contenu du post -->
                 <?php the_content(); ?>
            </section>
        </article>

    <?php
    endwhile;
endif;

get_footer();
