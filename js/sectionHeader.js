var btnDemarches = document.getElementById("getDemarches");
var menuDemarches = document.getElementById("listDemarches");

btnDemarches.addEventListener("mouseover", function () {
    menuDemarches.style.display = "block";
});

menuDemarches.addEventListener("mouseleave", function () {
    menuDemarches.style.display = "none";
});