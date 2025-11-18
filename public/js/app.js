function toggleSidebar()
{
    const body = document.body;
    const menuToggleBtn = document.getElementById("menu-toggle");
    const menuIcon = menuToggleBtn.querySelector('#img');

    body.classList.toggle("no-scroll");
    body.classList.toggle("sidebar-open");
    menuToggleBtn.classList.toggle("is-active");

    if (body.classList.contains('sidebar-open')){
        menuIcon.src = "/storage/header/header-close-menu.svg";
    } else {
        menuIcon.src = "/storage/header/header-burger-blue.svg";
    }
}

function toggleSidebarMobile()
{
    const body = document.body;
    const menuToggleBtn = document.getElementById("menu-toggle-mobile");
    const menuIcon = menuToggleBtn.querySelector('#img');

    body.classList.toggle("no-scroll");
    body.classList.toggle("sidebar-mobile-open");
    menuToggleBtn.classList.toggle("is-active");

    if (body.classList.contains('sidebar-mobile-open')){
        menuIcon.src = "/storage/header/header-close-menu-white.svg";
    } else {
        menuIcon.src = "/storage/header/header-burger-white.svg";
    }
}

