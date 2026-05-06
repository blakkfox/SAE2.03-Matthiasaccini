let templateFile = await fetch("./component/Stats/template.html");
let template = await templateFile.text();

let Stats = {};

Stats.format = function (data) {
  let html = template;
  html = html.replace("{{totalProfiles}}", data.totalProfiles);
  html = html.replace("{{avgFavs}}", data.avgFavs);
  html = html.replace("{{totalMovies}}", data.totalMovies);
  html = html.replace("{{topMovie}}", data.topMovie);
  html = html.replace("{{topCategory}}", data.topCategory);
  return html;
};

export { Stats };