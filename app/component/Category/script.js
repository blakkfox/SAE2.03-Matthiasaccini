import { Movie } from "../Movie/script.js";

let templateFile = await fetch("./component/Category/template.html");
let template = await templateFile.text();

let MovieCategory = {};

MovieCategory.format = function (categoryName, moviesData) {
  let html = template;
  
  html = html.replaceAll("{{categoryName}}", categoryName);
  
  let moviesHtml = Movie.format(moviesData);
  html = html.replaceAll("{{movies}}", moviesHtml);
  
  return html;
};

export { MovieCategory };