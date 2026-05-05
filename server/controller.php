<?php

require("model.php");



function addMovieController(){
  
    // PREMIERE VERIFICATION : LES PARAMETRES EXISTENT-ILS ET SONT-ILS VIDES ?
    // On fait une vérification de sécurité basique sur les champs principaux.
    if ( !isset($_REQUEST['name']) || empty($_REQUEST['name']) || 
         !isset($_REQUEST['director']) || empty($_REQUEST['director']) ) {
        // S'il manque le titre ou le réalisateur, on refuse le traitement
        return false;
    }

    // Lecture des données de formulaire
    $name = $_REQUEST['name'];
    $director = $_REQUEST['director'];
    $year = $_REQUEST['year'];
    $length = $_REQUEST['length'];
    $description = $_REQUEST['description'];
    $id_category = $_REQUEST['id_category'];
    $min_age = $_REQUEST['min_age'];
    $image = $_REQUEST['image'];
    $trailer = $_REQUEST['trailer'];

    // Ajout du film à l'aide de la fonction addMovie décrite dans model.php
    $ok = addMovie($name, $director, $year, $length, $description, $id_category, $min_age, $image, $trailer);
    
    // $ok est le nombre de lignes affectées par l'opération dans la BDD (voir model.php)
    if ($ok != 0){
        // On retourne un tableau formaté. 
        // Le fichier script.php se chargera de le transformer en JSON pour notre fichier JS !
        return ["success" => true, "message" => "Le film '$name' a bien été ajouté au catalogue !"];
    }
    else{
        return false;
    }
}


/** readMoviesController
 * * Cette fonction est en charge du traitement des requêtes HTTP pour lesquelles le paramètre 'todo' vaut 'readmovies'.
 * Contrairement à getMenu, on veut récupérer tout le catalogue d'un coup, donc il n'y a 
 * aucun paramètre à vérifier (pas de jour ou de semaine).
 * Elle appelle simplement la fonction getAllMovies et retourne les données.
 * * @return mixed Le tableau de films si tout va bien, sinon false.
 */
function readMoviesController(){
    if (isset($_REQUEST['age']) && $_REQUEST['age'] !== "") {
        $age = intval($_REQUEST['age']);
        $movies = getAllMovies($age);
    } else {
        $movies = getAllMovies();
    }
    
    if ($movies === false) {
        return false;
    }
    return $movies;
}
function readIDController(){
    if (!isset($_REQUEST['id']) || empty($_REQUEST['id'])){
        return false;
    }
    $id = $_REQUEST['id'];

    $movie = getMovieByID($id);
    if ($movie === false){
        return false;
    }

    return $movie;
}
function readCategoriesController(){
    $categories = getAllCategories();
    
    if ($categories === false) {
        return false;
    }
    
    return $categories;
}
function addProfileController(){
    if ( !isset($_REQUEST['name']) || empty($_REQUEST['name']) ) {
        return false;
    }

    $name = $_REQUEST['name'];

    if (isset($_REQUEST['id']) && $_REQUEST['id'] !== "") {
        $id = $_REQUEST['id'];
    } else {
        $id = null;
    }

    if (isset($_REQUEST['avatar'])) {
        $avatar = $_REQUEST['avatar'];
    } else {
        $avatar = '';
    }

    if (isset($_REQUEST['min_age'])) {
        $min_age = $_REQUEST['min_age'];
    } else {
        $min_age = 0;
    }

    $ok = saveProfile($id, $name, $avatar, $min_age);
    
    if ($ok != 0){
        return ["success" => true, "message" => "Le profil '$name' a bien été enregistré !"];
    } else {
        return false;
    }
}
function readProfilesController(){
    $profiles = getAllProfiles();
    if ($profiles === false) {
        return false;
    }
    return $profiles;
}

function addFavoriteController(){
    $id_profile = $_REQUEST['id_profile'];
    $id_movie = $_REQUEST['id_movie'];
    
    $ok = addFavorite($id_profile, $id_movie);
    
    if ($ok != 0) {
        return ["success" => true, "message" => "Le film a bien été ajouté à vos favoris !"];
    } else {
        return ["success" => false, "message" => "Ce film est déjà dans vos favoris."];
    }
}

?>