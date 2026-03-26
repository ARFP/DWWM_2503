<?php
get_header();
?>

<h1>PAGE.PHP</h1>
<h2>Affichage d'une page</h2>
<section class="flex">

<?php 
    if(have_posts()): // si l'url appelé correspond à du contenu  (article, page, auteur, catégorie...)
        while(have_posts()): // pour chaque élément trouvé... 
            the_post(); // on charge les données du contenu
    ?>
        <article class="montheme-article-full"> 
            <header>
                <h1><?php the_title(); // affichage du titre ?></h1>
            </header>
            <?php the_post_thumbnail('thumbnail'); ?>
            <p>
                Mise à jour le <?php the_modified_date() ?>
            </p>
            <div>
                <?php the_content(); // extrait du post ?> 
            </div>
            
        </article>
    <?php
        endwhile;
    else: 
        echo 'Aucun contenu';
    endif;
?>

<div class="pagination">
    <div class="pagination-previous">
        <?php previous_post_link(); ?>
    </div>
    <div class="pagination-next">
        <?php next_post_link();  ?>
    </div>
</div>

</section>

<?php 
get_footer();
