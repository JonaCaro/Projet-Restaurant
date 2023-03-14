ul.innerHTML = localStorage.getItem("list")

const spanDels = document.querySelectorAll(".delete");

for (let span of spanDels) {
  span.onclick = () => del(span.parentElement)
}

noAllergens.style.display = (ul.innerHTML == "") ? "block" : "none"; //Pas d'allergenes

form.onsubmit = (event) => {
  const li = document.createElement("li"); //Creation d'une li
  const spanDel = document.createElement("span"); //Creation <span> icone delete 
  spanDel.className = "fa-solid fa-delete-left"; //Creation class icone
  spanDel.classList.add("delete")//Creation class delete

  spanDel.onclick = () => del(li); // Suppretion du li en un clique 
  li.innerHTML = textFile.value; //Creation article + icone


  li.appendChild(spanDel);
  ul.appendChild(li);

  textFile.value = "";
  noAllergens.style.display = "none";

  localStorage.setItem("list", ul.innerHTML) //Recuperation de la list

  event.preventDefault();
}

function del(element) {
  element.remove();

  noAllergens.style.display = (ul.innerHTML == "") ? "block" : "none"; //Pas d'allergenes

  localStorage.setItem("list", ul.innerHTML) //Recuperation de la list
}

