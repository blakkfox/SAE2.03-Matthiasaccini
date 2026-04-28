let templateFile = await fetch("./component/MovieForm/template.html");
let template = await templateFile.text();

let MovieForm = {};

MovieForm.format = function (handler,css = "") {
  let html = template;
  html = html.replaceAll("{{cssClass}}", css);
  html = html.replace("{{handler}}", handler);
  return html;
};

export { MovieForm };
