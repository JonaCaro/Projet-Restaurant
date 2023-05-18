let btn = document.getElementById("addCom");
let modal = document.querySelector("#modal");
let cross = document.querySelector("#cross");

let toggel = (e) => {

  e.stopPropagation();

  let firstElmClicked = e.composedPath()[0];

  if (firstElmClicked === modal || firstElmClicked === btn || firstElmClicked === cross) {
    if (!modal.classList.contains("active")) {
      modal.classList.add("active");

      setTimeout(() => {

        modal.style.opacity = "1";
      }, 100)
    } else {
      modal.style.opacity = "0";
      setTimeout(() => {
        modal.classList.remove("active")
      }, 400)
    }
  }
}


btn.addEventListener("click", toggel);
cross.addEventListener("click", toggel)
modal.addEventListener("click", toggel)