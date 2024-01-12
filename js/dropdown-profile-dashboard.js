document.addEventListener('DOMContentLoaded', function () {
    var profileMenu = document.getElementById('profile-menu');
    var profileOptions = document.querySelector('.profile-options');

    profileMenu.addEventListener('click', function (event) {
        event.stopPropagation();
        profileOptions.classList.toggle('active');
    });

    // Close the dropdown when clicking outside of it
    document.addEventListener('click', function () {
        profileOptions.classList.remove('active');
    });

    // Prevent the dropdown from closing when clicking inside it
    profileOptions.addEventListener('click', function (event) {
        event.stopPropagation();
    });

    // Add logic for profile-link and logout-click events if needed
    var profileLink = document.getElementById('profile-link');
    profileLink.addEventListener('click', function () {
        alert('Selamat Datang');
    });
});

