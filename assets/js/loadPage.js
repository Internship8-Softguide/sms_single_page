$(() => {
    let page = $("#loadPage");
    let menus = document.querySelectorAll(".menu-item");

    menus.forEach(menu => {
        let screen = menu.getAttribute("data-page");
        menu.addEventListener("click", () => loadPage(screen))
    });




    const loadPage = (screen) => {
        page.load(`./pages/${screen}.html`);
    }
    loadPage("home");
});