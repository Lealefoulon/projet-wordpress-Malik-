<?php get_header() ?>
    <main class="container">
        <div class="row mt-4">
            <?php $i=0; ?>
            <!-- loop wordpress -->
            <?php while (have_posts()) :  // fonction qui permet de récupérer les articles créés ?> 
                <?php the_post() ; ?>
                <article class="col-4">
                    <div class="card card-<?= $i ?>">
                        <h2 class="card-header">
                            <?php echo $post->post_title ?>
                        </h2>
                        <?php echo the_post_thumbnail("large",["class"=>"img-fluid"]) // permet d afficher une image en miniature
                        //pour accéder à toutes les fonctions existantes codex.wordpress.org ?>
                    
                        <div class="card-body">

                            <?php the_excerpt() // pour pouvoir afficher l extrait qu'on a saisie ?>
                        </div>
                        <div class="card-body">

                            <?php the_date()  ?>
                        </div>

                        <?php edit_post_link("modifier") ?>
                            
                    </div>
                </article>
                <?php $i++; ?>
            <?php endwhile ?>
        </div>
    </main>
    <?php get_footer() ?>
    