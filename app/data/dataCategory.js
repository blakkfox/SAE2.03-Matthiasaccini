let HOST_URL = "https://mmi.unilim.fr/~accini1/SAE2.03-Matthiasaccini"; 

let DataCategory = {};

DataCategory.requestCategories = async function(){
    let answer = await fetch(HOST_URL + "/server/script.php?todo=readcategories");
    let data = await answer.json();
    return data;
}

export {DataCategory};