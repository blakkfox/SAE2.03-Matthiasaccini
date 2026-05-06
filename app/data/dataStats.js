let HOST_URL = "https://mmi.unilim.fr/~accini1/SAE2.03-Matthiasaccini"; 

let DataStats = {};

DataStats.read = async function(){
    let answer = await fetch(HOST_URL + "/server/script.php?todo=readstats");
    let data = await answer.json();
    return data;
}

export { DataStats };