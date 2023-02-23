<?php get_header() ?>

    <main class="container">
        <h1>Résultat de votre recherche :  </h1>
        <p>pour le mot : <?php echo get_search_query() ?>, il y a <?= $wp_query->found_posts ?> resultats
        </p>

        <ol>
            <?php if(have_posts()): ?>
            <?php while(have_posts()): ?>
                <?php the_post() ?>
                <li class="mb-4">
                <h2 class="fs-4"><?php the_title() ?></h2>
                <?php the_excerpt() ?><br>
                <a href="<?php the_permalink() ?>">Lire la suite</a><br>
                </li>
            <?php endwhile ?>
            <?php else : ?>
                <!-- si le nom recherché dans la barre de recherche n'existe pas dans le site : -->

                <p>Mais voici des articles qui pourraient vous intéresser </p>
                <hr>
                <div style="list-style:none">
                <?php dynamic_sidebar("search") ?>
                </div>
                <hr>
            <?php endif ?>
        </ol>
    </main>

<?php get_footer() ?>