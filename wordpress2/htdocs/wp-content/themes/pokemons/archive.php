<h2>archive.php</h2>
<h3>Affichage d'une liste de post de type "article"</h3>
<ul>
    <li>Tous les articles d'une catégorie</li>
    <li>Tous les articles à une date donnée</li>
    <li>Tous les articles d'un auteur en particulier</li>
</ul>
<?php 
get_header();

the_posts_navigation();


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

?>

<div class="pagination">
    <div class="precedent">
        <?php previous_posts_link(); ?>
    </div>
    <div class="suivant">
        <?php next_posts_link(); ?>
    </div>
</div>

<?php

get_footer();
