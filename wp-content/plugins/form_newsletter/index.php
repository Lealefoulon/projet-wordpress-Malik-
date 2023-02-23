<?php

/**
 * Plugin Name: formulaire newsletter
 * Author: Lea L
 * Description: création d'un short code pour ajouter facilement un formulaire newsletter
 */

 function add_formulaire_newsletter(): string
{
    // premier argument du texte et le nom du champ
    $input_hidden = wp_nonce_field("formulaire","contact");
    return "
        <form method='POST'>
            <div>
            <label for='email' class='mb-3'> Saisir votre email </label>
            <input type='email' name='email' class='form-control' id='email'>
            $input_hidden
            </div>
            <div class='mt-3'>
            <input type='submit' class='btn btn-warning' value='Envoyer'>
            </div>
        </form>";
}

add_shortcode("form_newsletter", "add_formulaire_newsletter");


// on fait un hook fonction add_action permettant de fr des traitements en + dans le comportement natif de wordpress. on attend que wordpress soit à 100% initialisé (fonctions chargées) pour exécuter des traitements sur des $_POST
add_action("init",function(){
    if (!empty($_POST["email"])) {

        if(!wp_verify_nonce($_POST["contact"],"formulaire")) return;
    
        //est ce que l email saisie est conforme
        if(! filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) return;
    
        global $wpdb; // il faut respecter le nom de cette variable
        $create = $wpdb->prepare(
            "CREATE TABLE IF NOT EXISTS wp_newsletter (
                id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
                email VARCHAR(255)
            )"
        );
        //pour exécuter
        $wpdb->get_row($create);
        $query = $wpdb->prepare("INSERT INTO wp_newsletter
        (email)
        VALUES
        (%s)
        
        ", [$_POST["email"]]);
        $wpdb->get_row($query);
    }
});

function contenu_page_newsletter(){
    global $wpdb;
    $emails = $wpdb->prepare("SELECT * FROM wp_newsletter");
    $resultat = $wpdb->get_results($emails);
    // var_dump($resultat);
    $html = "<h1>Liste des utilisateurs</h1>";
    $html.="<table>";
    $html.="<tr>";
    $html.="<th>id</th>";
    $html.="<th>email</th>";
    $html.="</tr>";
    foreach($resultat as $r){
        $html.="<tr>";
        $html.="<td>{$r->id}</td>";
        $html.="<td>{$r->email}</td>";
        $html.="</tr>";
    }
    $html.="</table>";
    echo $html;
    
}
//parametres(nom de la page,taxte affiché ds la barre lat back office, manage_option, slug de l url)
//manage_option le gestionnaire doit etre administrateur pour voir cette page dans le back office
add_action("admin_menu",function(){
    add_menu_page("newsletter","newsletter","manage_options","newsletter","contenu_page_newsletter");
});

