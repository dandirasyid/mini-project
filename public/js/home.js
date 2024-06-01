document.addEventListener("DOMContentLoaded", function () {
    // Membaca nilai elemen aktif dari Local Storage
    const activeElement = localStorage.getItem("activeElement");
    if (activeElement) {
        setActive(activeElement);
    } else {
        // Atur elemen aktif default jika tidak ada nilai di Local Storage
        setSidebarActive("beranda");
    }
});

function setActive(id) {
    // Menyimpan nilai elemen aktif ke Local Storage
    localStorage.setItem("activeElement", id);

    // Memeriksa dan mengatur elemen aktif di sidebar
    if (document.querySelector(`#${id}.nav-link`)) {
        setSidebarActive(id);
    }
    // Jangan mengatur elemen aktif di konten jika ID adalah "beranda"
    if (
        id !== "beranda" &&
        document.querySelector(`#${id}.text-white.text-decoration-none`)
    ) {
        setContentActive(id);
    }
}

function setSidebarActive(id) {
    let sidebarLinks = document.querySelectorAll(".nav-link");
    sidebarLinks.forEach(function (sidebarLink) {
        sidebarLink.classList.remove("active");
        let text = sidebarLink.querySelector("span");
        if (text) {
            text.style.color = "white";
            text.style.fontWeight = "normal";
        }
    });
    let sidebarActiveLink = document.getElementById(id);
    if (sidebarActiveLink) {
        sidebarActiveLink.classList.add("active");
        let activeText = sidebarActiveLink.querySelector("span");
        if (activeText) {
            activeText.style.color = "#3F9AA8"; // Warna sesuaikan dengan yang diinginkan
            activeText.style.fontWeight = "bold"; // Ketebalan teks sesuaikan dengan yang diinginkan
        }
    }
}

function setContentActive(id) {
    let contentLinks = document.querySelectorAll(
        ".text-white.text-decoration-none"
    );
    contentLinks.forEach(function (contentLink) {
        contentLink.classList.remove("active");
    });
    let contentActiveLink = document.getElementById(id);
    if (contentActiveLink) {
        contentActiveLink.classList.add("active");
    }
}
