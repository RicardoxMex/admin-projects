function toggleDrawer() {
  const drawer = document.getElementById("drawer");
  drawer.classList.toggle("show-drawer");
}

window.addEventListener("click", function (event) {
  const drawer = document.getElementById("drawer");
  if (drawer) {
    const menuIcon = document.querySelector(".menu-icon");

    if (!drawer.contains(event.target) && event.target !== menuIcon) {
      drawer.classList.remove("show-drawer");
    }
  }
});

