<?php
get_header();
?>
<!-- ARCHIVE.PHP -->
<h1>ARCHIVE.PHP</h1>
<h2>Affichage d'une liste d'articles</h2>
<section class="flex">

<?php 
    if(have_posts()): // si l'url appelé correspond à du contenu  (article, page, auteur, catégorie...)
        while(have_posts()): // pour chaque élément trouvé... 
            the_post(); // on charge les données du contenu
    ?>
        <article class="montheme-article"> 
            <header>
                <h1>
                    <a href="<?php the_permalink(); ?>">
                        <?php the_title(); // affichage du titre ?>
                    </a>    
                </h1>
                <aside>
                    <p>
                        écrit par <?php the_author_link(); ?> le <?php the_date(); ?>
                        dans <?php the_category(', '); ?>
                    </p>
                    <p>modifié le <?php the_modified_date(); ?> par <?php the_modified_author(); ?></p>
                </aside>
            </header>
            
            <?php the_post_thumbnail('thumbnail'); ?>
            <div>
                <?php the_excerpt(); // extrait du post ?> 
            </div>
            <footer>
                <aside>
                    <p>écrit par <?php the_author_link(); ?> le <?php the_date(); ?>
                    <p>modifié le <?php the_modified_date(); ?> par <?php the_modified_author(); ?></p>
                </aside>
            </footer>
        </article>
    <?php
        endwhile;
    else: 
        echo 'Aucun contenu';
    endif;

    // posts_nav_link();
?>

<hr>
    <div class="pagination">
        <div class="pagination-previous">
            <?php previous_posts_link('Contenu précédent'); ?>
        </div>
        <div class="pagination-next">
            <?php next_posts_link('Contenu suivant');  ?>
        </div>
    </div>

    <div>
        <?php the_posts_pagination(); ?>
    </div>

</section>

<?php 
get_footer();
