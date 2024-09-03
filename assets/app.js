const avatar = document.getElementById("avatar");
const label = avatar.parentNode;
const small = document.getElementById("fileUploadInfo");
const fileUploadImg = document.getElementById("fileUploadImg");

function rounded(number) {
  return Math.round(parseFloat(number) * 100) / 100;
}

avatar.addEventListener("change", (event) => {
  const file = event.target.files[0]
  let fileName = file["name"];
  let fileSize;
  let reader = new FileReader();

  if (file["size"] / 1000000 < 1) {
    fileSize = `${rounded(file["size"] / 1024)} KB`;
  } else {
    fileSize = `${rounded(file["size"] / 1000000)} MB`;
  }

  reader.onload = (e) => {
    fileUploadImg.setAttribute('src', `${e.target.result}`)
    fileUploadImg.style.display = 'inline-block'
  };

  small.innerHTML = `
                Filename: <span>${fileName.split(".")[0]}</span>
                <br>
                Extension: <span>${fileName.split(".")[1]}</span>
                <br>
                Size: <span>${fileSize}</span>`;

  label.style.padding = "2.5px";
  text.style.display = 'none';
  fileReload.style.display = "inline-block";

  reader.readAsDataURL(file);
});
