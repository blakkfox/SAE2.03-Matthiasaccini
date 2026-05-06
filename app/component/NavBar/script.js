let templateFile = await fetch("./component/NavBar/template.html");
let template = await templateFile.text();

let NavBar = {};

NavBar.format = function (hAbout, hHome, hFavorites, hStats, hSearch, hProfileChange, profiles, activeProfileId) {
  let html = template;
  html = html.replace("{{hAbout}}", hAbout);
  html = html.replace("{{hHome}}", hHome);
  html = html.replace("{{hFavorites}}", hFavorites);
  html = html.replace("{{hStats}}", hStats);
  html = html.replace("{{hSearch}}", hSearch);
  html = html.replace("{{hProfileChange}}", hProfileChange);

  let options = "";
  for (let p of profiles) {
    let selected = "";
    
    if (p.id == activeProfileId) {
      selected = "selected";
    } else {
      selected = "";
    }

    options += `<option value="${p.id}" ${selected}>${p.name}</option>`;
  }
  
  html = html.replace("{{profileOptions}}", options);
  return html;
};

export { NavBar };