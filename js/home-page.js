// Mengambil elemen menu dan navbar dari dokumen HTML
let menu = document.querySelector("#menu-btn");
let navbar = document.querySelector(".header .flex .navbar");

// Menanggapi klik pada ikon menu
menu.onclick = () => {
    // Menambah atau menghapus kelas 'fa-times' pada ikon menu
    menu.classList.toggle("fa-times");
    // Menambah atau menghapus kelas 'active' pada elemen navbar
    navbar.classList.toggle("active");
};

// Menanggapi peristiwa saat menggulir halaman
window.onscroll = () => {
    // Menghapus kelas 'fa-times' pada ikon menu dan kelas 'active' pada elemen navbar saat menggulir
    menu.classList.remove("fa-times");
    navbar.classList.remove("active");
};

// Mengakses elemen-elemen dengan kelas 'accordion'
var acc = document.getElementsByClassName("accordion");
var i;

// Menanggapi klik pada setiap elemen 'accordion'
for (i = 0; i < acc.length; i++) {
    acc[i].addEventListener("click", function () {
        // Menambah atau menghapus kelas 'active' pada elemen yang diklik
        this.classList.toggle("active");
    });
}
