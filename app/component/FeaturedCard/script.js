let templateFile = await fetch("./component/FeaturedCard/template.html");
let template = await templateFile.text();

let FeaturedCard = {};

FeaturedCard.format = function (data) {
  let html = template;
  html = html.replaceAll("{{id}}", data.id);
  html = html.replaceAll("{{name}}", data.name);
  html = html.replaceAll("{{image}}", data.image);
  html = html.replaceAll("{{description}}", data.description);
  return html;
};

export { FeaturedCard };