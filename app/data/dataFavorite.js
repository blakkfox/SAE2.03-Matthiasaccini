let HOST_URL = "https://mmi.unilim.fr/~accini1/SAE2.03-Matthiasaccini"; 

let DataFavorite = {};

DataFavorite.add = async function(id_profile, id_movie){
    let fd = new FormData();
    fd.append('id_profile', id_profile);
    fd.append('id_movie', id_movie);

    let config = { method: "POST", body: fd };
    let answer = await fetch(HOST_URL + "/server/script.php?todo=addfavorite", config);
    let data = await answer.json();
    return data;
}

export { DataFavorite };