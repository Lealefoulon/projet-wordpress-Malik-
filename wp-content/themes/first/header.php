<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    <link 
        rel="stylesheet" 
        href="<?php echo get_template_directory_uri() ?>/style.css?v=1">
        <!-- get_template_directory_uri() 
            http://localhost/demo/wp-content/themes/first
        -->
    <?php wp_head() ?>
</head>
<body <?php body_class() ?>><!-- gérer automatique une class en fonction de la page actuellement affichée -->
    <header class="bg-primary">
        <nav class="navbar navbar-expand container navbar-light">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a href="<?= get_option("home") ?>" class="nav-link">Accueil</a>
                </li>
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle"  data-bs-toggle="dropdown">pages</a>
                    <ul class="dropdown-menu">
                        <li class="dropdown-item">
                            <a href="<?= get_page_url("exemple 1") ?>">exemple 1</a>
                        </li>
                        <li class="dropdown-item">
                            <a href="<?= get_page_url("exemple 2") ?>">exemple 2</a>
                        </li>
                        <li class="dropdown-item">
                            <a href="<?= get_page_url("Contact") ?>">Nous contacter</a>
                        </li>
                    </ul>
                </li>
                
                <li class="nav-item">
                    <a href="<?= get_page_url("condition générale") ?>" class="nav-link">conditions générales</a>
                </li>
                <!-- sharemycode.fr/164 -->
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" 
                        data-bs-toggle="dropdown">catégories</a>
                    <ul class="dropdown-menu">
                        <li class="dropdown-item">
                            <a href="<?= get_category_url("html") ?>">html</a>
                        </li>
                        <li class="dropdown-item">
                            <a href="<?= get_category_url("php") ?>">php</a>
                        </li>
                        <li class="dropdown-item">
                            <a href="<?= get_category_url("react") ?>">react</a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="<?= get_page_url("Contact") ?>" class="nav-link"> nous contacter </a>
                </li>
            </ul>
            <form action="<?= get_option("home")?>" class="ms-auto d-flex">
                <input type="text" placeholder="rechercher" name="s" class="form-control me-2"> <!-- Le name="s" est obligatoire pour un champ de recherche -->
                <input type="submit" value="rechercher" class="btn btn-warning btn-sm">
            </form>

        </nav>
    </header>