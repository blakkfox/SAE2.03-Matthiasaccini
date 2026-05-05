let templateFile = await fetch("./component/FavoriteCard/template.html");
let template = await templateFile.text();

let FavoriteCard = {};

FavoriteCard.format = function (data) {
  let html = template;
  html = html.replaceAll("{{id}}", data.id);
  html = html.replaceAll("{{name}}", data.name);
  html = html.replaceAll("{{image}}", data.image);
  return html;
};

export { FavoriteCard };