<?php

define("HOST", "localhost");
define("DBNAME", "accini1"); 
define("DBLOGIN", "accini1"); 
define("DBPWD", "accini1"); 

function getAllMovies($ageLimite = null){
    $cnx = new PDO("mysql:host=".HOST.";dbname=".DBNAME.";charset=utf8", DBLOGIN, DBPWD);
    
    if ($ageLimite !== null) {
        $sql = "SELECT id, name, year, length, description, director, id_category, image, trailer, min_age FROM Movie WHERE min_age <= :age";
        $stmt = $cnx->prepare($sql);
        $stmt->bindParam(':age', $ageLimite, PDO::PARAM_INT);
    } else {
        $sql = "SELECT id, name, year, length, description, director, id_category, image, trailer, min_age FROM Movie";
        $stmt = $cnx->prepare($sql);
    }
    
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_OBJ);
}

function addMovie($n, $dir, $y, $len, $desc, $cat, $age, $img, $trl){
    $cnx = new PDO("mysql:host=".HOST.";dbname=".DBNAME.";charset=utf8", DBLOGIN, DBPWD); 
    
    $sql = "INSERT INTO Movie (name, director, year, length, description, id_category, min_age, image, trailer) 
            VALUES (:name, :director, :year, :length, :description, :id_category, :min_age, :image, :trailer)";
            
    $stmt = $cnx->prepare($sql);
    
    $stmt->bindParam(':name', $n);
    $stmt->bindParam(':director', $dir);
    $stmt->bindParam(':year', $y);
    $stmt->bindParam(':length', $len);
    $stmt->bindParam(':description', $desc);
    $stmt->bindParam(':id_category', $cat);
    $stmt->bindParam(':min_age', $age);
    $stmt->bindParam(':image', $img);
    $stmt->bindParam(':trailer', $trl);
    
    $stmt->execute();
    
    return $stmt->rowCount(); 
}

function getMovieByID($id){
    $cnx = new PDO("mysql:host=".HOST.";dbname=".DBNAME.";charset=utf8", DBLOGIN, DBPWD);

    $sql = "SELECT * FROM Movie WHERE id = :id";

    $stmt = $cnx->prepare($sql);
    $stmt->bindParam(':id' , $id);
    $stmt->execute();
    $res = $stmt->fetch(PDO::FETCH_OBJ);
    return $res;
}

function getAllCategories(){
    $cnx = new PDO("mysql:host=".HOST.";dbname=".DBNAME.";charset=utf8", DBLOGIN, DBPWD);
    $sql = "SELECT id, name FROM Category";
    $stmt = $cnx->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_OBJ);
}

function addProfile($n, $av, $age){
    $cnx = new PDO("mysql:host=".HOST.";dbname=".DBNAME.";charset=utf8", DBLOGIN, DBPWD); 
    
    $sql = "INSERT INTO Profile (name, avatar, min_age) VALUES (:name, :avatar, :min_age)";
    $stmt = $cnx->prepare($sql);
    
    $stmt->bindParam(':name', $n);
    $stmt->bindParam(':avatar', $av);
    $stmt->bindParam(':min_age', $age);
    
    $stmt->execute();
    return $stmt->rowCount(); 
}

function getAllProfiles(){
    $cnx = new PDO("mysql:host=".HOST.";dbname=".DBNAME.";charset=utf8", DBLOGIN, DBPWD);
    $sql = "SELECT id, name, avatar, min_age FROM Profile";
    $stmt = $cnx->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_OBJ);
}

function saveProfile($id, $n, $av, $age){
    $cnx = new PDO("mysql:host=".HOST.";dbname=".DBNAME.";charset=utf8", DBLOGIN, DBPWD); 
    
    $sql = "REPLACE INTO Profile (id, name, avatar, min_age) VALUES (:id, :name, :avatar, :min_age)";
    $stmt = $cnx->prepare($sql);
    
    $stmt->bindParam(':id', $id);
    $stmt->bindParam(':name', $n);
    $stmt->bindParam(':avatar', $av);
    $stmt->bindParam(':min_age', $age);
    
    $stmt->execute();
    return $stmt->rowCount(); 
}

function addFavorite($id_profile, $id_movie){
    $cnx = new PDO("mysql:host=".HOST.";dbname=".DBNAME.";charset=utf8", DBLOGIN, DBPWD);
    $sql = "INSERT IGNORE INTO Favorite (id_profile, id_movie) VALUES (:id_profile, :id_movie)";
    $stmt = $cnx->prepare($sql);
    $stmt->bindParam(':id_profile', $id_profile);
    $stmt->bindParam(':id_movie', $id_movie);
    $stmt->execute();
    return $stmt->rowCount();
}

?>