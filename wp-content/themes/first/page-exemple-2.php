<?php get_header() ?>
    <main class="container mt-3">
        <div class="row">
            <?php while(have_posts()): ?>
                <?php the_post() ?>
                <div class="col-3">
                <h1><?php the_title() ?></h1>
                </div>
                <div class="col">
                <?php the_content() ?>
                </div>
        <?php endwhile ?>
        </div>

    </main>

<?php get_footer() ?>