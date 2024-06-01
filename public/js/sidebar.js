document.addEventListener("DOMContentLoaded", function () {
    setActive("beranda");
});

function setActive(elementId) {
    let navLinks = document.querySelectorAll(".nav-link");
    navLinks.forEach(function (navLink) {
        navLink.classList.remove("active");
        let text = navLink.querySelector("span");
        text.style.color = "white";
        text.style.fontWeight = "normal";
    });
    let clickedLink = document.getElementById(elementId);
    clickedLink.classList.add("active");
    let clickedText = clickedLink.querySelector("span");
    clickedText.style.color = "#40E0D0";
    clickedText.style.fontWeight = "bold";
}
