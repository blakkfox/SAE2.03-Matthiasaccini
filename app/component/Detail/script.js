let templateFile = await fetch("./component/Detail/template.html");
let template = await templateFile.text();

let Detail = {};

Detail.format = function (data, categoryName, css = "") {
  let html = template;
  html = html.replaceAll("{{cssClass}}", css);
  html = html.replaceAll("{{name}}", data.name);
  html = html.replaceAll("{{image}}", "../server/images/" + data.image);
  html = html.replaceAll("{{director}}", data.director);
  html = html.replaceAll("{{year}}", data.year);
  html = html.replaceAll("{{categoryName}}", categoryName);
  html = html.replaceAll("{{min_age}}", data.min_age);
  html = html.replaceAll("{{description}}", data.description);

  let urlVideo = data.trailer || "";
  if (urlVideo.includes("watch?v=")) {
      urlVideo = urlVideo.replace("watch?v=", "embed/");
  } 
  else if (urlVideo.includes("youtu.be/")) {
      urlVideo = urlVideo.replace("youtu.be/", "youtube.com/embed/");
  }
  html = html.replaceAll("{{trailer}}", urlVideo);
  
  return html;
};

export { Detail };