<h2>index.php</h2>
<h3>Affichage par défaut si aucun template lié au contenu n'est disponible</h3>
<p><a href="https://capitainewp.io/formations/developper-theme-wordpress/template-hierarchy/">Voir le Template Hierarchy de Wordpress</a></p>
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
                <aside>
                    écrit par 
                    <?php the_author_link(); // ou the_author(); ?>
                    le <?php the_date(); ?>
                </aside>
            </header>
            <section>
                <!-- contenu du post -->
                 <?php the_content(); ?>
            </section>
            <aside>
                <!-- commentaires -->
                <?php comments_template(); ?>
            </aside>
        </article>

    <?php
    endwhile;
endif;

get_footer();
