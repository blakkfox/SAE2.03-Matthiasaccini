let templateFile = await fetch("./component/Detail/template.html");
let template = await templateFile.text();

let Detail = {};

Detail.format = function (data, css = "") {
  let html = template;
  html = html.replaceAll("{{cssClass}}", css);
  html = html.replaceAll("{{name}}", data.name);
  html = html.replaceAll("{{image}}", "../server/images/" + data.image);
  html = html.replaceAll("{{director}}", data.director);
  html = html.replaceAll("{{year}}", data.year);
  html = html.replaceAll("{{id_category}}", data.id_category);
  html = html.replaceAll("{{min_age}}",data.min_age);
  html = html.replaceAll("{{description}}", data.description);
  html = html.replaceAll("{{trailer}}", data.trailer);
  return html;
};

export { Detail };
