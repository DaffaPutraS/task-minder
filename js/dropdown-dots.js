// Fungsi untuk menampilkan atau menyembunyikan opsi kartu
function toggleOptions(icon) {
    // Mengakses elemen berikutnya dari elemen ikon (elemen opsi kartu)
    const cardOption = icon.nextElementSibling;
    // Mengatur tampilan elemen opsi kartu sesuai kondisi: jika sebelumnya disembunyikan atau tidak ditetapkan, maka ditampilkan; sebaliknya, disembunyikan.
    cardOption.style.display = (cardOption.style.display === 'none' || cardOption.style.display === '') ? 'block' : 'none';
}
