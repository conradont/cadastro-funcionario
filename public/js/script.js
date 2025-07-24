document.addEventListener("DOMContentLoaded", function () {
  const toggleBtn = document.getElementById("toggle-filtros");
  const filtroContainer = document.getElementById("filtros");

  toggleBtn.addEventListener("click", function () {
    filtroContainer.classList.toggle("hidden");
  });
});
