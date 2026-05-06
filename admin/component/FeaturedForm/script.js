let templateFile = await fetch("./component/FeaturedForm/template.html");
let template = await templateFile.text();

let FeaturedForm = {};

FeaturedForm.format = function (hSearch) {
  let html = template;
  html = html.replace("{{hSearch}}", hSearch);
  return html;
};

export { FeaturedForm };