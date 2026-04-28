let HOST_URL = "https://mmi.unilim.fr/~accini1/SAE2.03-Matthiasaccini"; 

let DataProfile = {};

DataProfile.add = async function (fdata) {
    let config = {
        method: "POST", 
        body: fdata 
    };
    
    let answer = await fetch(HOST_URL + "/server/script.php?todo=addprofile", config);
    let data = await answer.json();
    return data;
}

export { DataProfile };