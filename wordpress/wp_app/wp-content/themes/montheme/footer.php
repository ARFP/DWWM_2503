<!-- DEBUT FOOTER -->
</main>

<footer>
    Copyright CRM 1947 - <?=date('Y'); ?>
    <?php 
        wp_nav_menu([
            'theme_location' => 'foot'
        ])
    ?>
</footer>

<?php wp_footer(); ?>

</body>
</html>
<!-- FIN FOOTER -->
