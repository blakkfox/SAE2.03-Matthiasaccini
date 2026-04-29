let templateFile = await fetch("./component/ProfileForm/template.html");
let template = await templateFile.text();

let ProfileForm = {};

ProfileForm.format = function (handlerSubmit, handlerSelect, profiles) {
  let html = template;
  html = html.replace("{{handlerSubmit}}", handlerSubmit);
  html = html.replace("{{handlerSelect}}", handlerSelect);

  let options = "";
  if (profiles) {
      for (let i = 0; i < profiles.length; i++) {
        let p = profiles[i];
        options += `<option value="${p.id}">${p.name}</option>`;
      }
  }
  html = html.replace("{{profileOptions}}", options);

  return html;
};

export { ProfileForm };