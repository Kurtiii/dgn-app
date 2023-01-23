// function to toggle bootstrap dark mode using jquery and local storage
function toggleDarkMode() {
    if (localStorage.getItem('darkMode') === 'true') {
        localStorage.setItem('darkMode', 'false');
        $('#html').attr('data-bs-theme', 'light');
        $('.dark-mode-toggle').html('<i class="far fa-moon"></i> Dark Mode');
    } else {
        localStorage.setItem('darkMode', 'true');
        $('#html').attr('data-bs-theme', 'dark');
        $('.dark-mode-toggle').html('<i class="far fa-sun"></i> Light Mode');
    }
}

// set dark mode on page load
if (localStorage.getItem('darkMode') !== 'false') {
    $('#html').attr('data-bs-theme', 'dark');
    $('.dark-mode-toggle').html('<i class="far fa-sun"></i> Light Mode');
}else{
    $('#html').attr('data-bs-theme', 'light');
    $('.dark-mode-toggle').html('<i class="far fa-moon"></i> Dark Mode');
}