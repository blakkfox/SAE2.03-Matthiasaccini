// URL où se trouve le répertoire "server" sur mmi.unilim.fr
let HOST_URL = "https://mmi.unilim.fr/~accini1/SAE2.03-Matthiasaccini";//"http://mmi.unilim.fr/~????"; // CHANGE THIS TO MATCH YOUR CONFIG

let DataMovie = {};

DataMovie.requestMovies = async function(age = 0){
    let answer = await fetch(HOST_URL + "/server/script.php?todo=readmovies&age=" + age);
    let data = await answer.json();
    return data;
}
DataMovie.requestDetails = async function (id) {
    let answer = await fetch(HOST_URL + "/server/script.php?todo=readmovie&id=" + id);
    let texteBrut = await answer.text();

    let data = JSON.parse(texteBrut);
    return data;
}

export {DataMovie};
