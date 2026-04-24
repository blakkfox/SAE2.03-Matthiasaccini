import { MovieCard } from "../MovieCard/script.js";

let templateFile = await fetch("./component/Movie/template.html");
let template = await templateFile.text();

let Movie = {};

Movie.format = function (data, css = "") {
  let moviecards = "";
  for (let movie of data){
    moviecards += MovieCard.format(movie,"movie__card");
  }
  let html = template;
    html = html.replaceAll("{{cssClass}}", css);
    html = html.replaceAll("{{movie}}", moviecards);
  return html;
};

export { Movie };
