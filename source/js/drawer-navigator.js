function toggleDrawer() {
  const drawer = document.getElementById("drawer");
  drawer.classList.toggle("show-drawer");
}

window.addEventListener("click", function (event) {
  const drawer = document.getElementById("drawer");
  const menuIcon = document.querySelector(".menu-icon");

  if (!drawer.contains(event.target) && event.target !== menuIcon) {
    drawer.classList.remove("show-drawer");
  }
});
document.addEventListener("turbolinks:load", function() {
  let sortableLists = document.querySelectorAll(".sortable-list");

  // Crear una instancia de Sortable para cada lista
  sortableLists.forEach((list) => {
    new Sortable(list, {
      group: "column",
      animation: 150,
      ghostClass: "sortable-ghost",
      chosenClass: "sortable-chosen",
      dragClass: "sortable-drag",
      onUpdate: function (evt) {
        const column = list.getAttribute("data-column");
        const itemText = evt.item.textContent;
        console.log(`Elemento "${itemText}" movido a la columna ${column}`);
      },
      onAdd: function (evt) {
        const column = list.getAttribute("data-column");
        const itemText = evt.item.id;
        console.log(`Elemento "${itemText}" movido a la columna ${column}`);
      },
    });
  });
})