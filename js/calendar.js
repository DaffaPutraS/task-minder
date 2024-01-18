// Menanggapi saat dokumen telah dimuat
document.addEventListener('DOMContentLoaded', function() {
    // Mengambil elemen dengan ID 'calendar'
    var calendarEl = document.getElementById('calendar');
    // Membuat objek kalendar menggunakan FullCalendar
    var calendar = new FullCalendar.Calendar(calendarEl, {
      // Menetapkan tampilan awal kalendar ke 'dayGridMonth'
      initialView: 'dayGridMonth'
    });
    // Merender (menampilkan) kalendar
    calendar.render();
  });