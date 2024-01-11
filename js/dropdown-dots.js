// dashboard.js

function toggleOptions(icon) {
    const cardOption = icon.nextElementSibling;
    cardOption.style.display = (cardOption.style.display === 'none' || cardOption.style.display === '') ? 'block' : 'none';
}
