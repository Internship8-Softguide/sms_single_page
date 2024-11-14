$(() => {
    let page = $("#loadPage");
    let menus = document.querySelectorAll(".menu-item");

    menus.forEach(menu => {
        let screen = menu.getAttribute("data-page");
        menu.addEventListener("click", () => loadPage(screen))
    });
    const loadPage = (screen = "home") => {
        if (screen.endsWith("list")) {
            console.log("list page")
            localStorage.removeItem("temp");
            temp = undefined;
        }
        page.load(`./pages/${screen}.html`, (response, status, xhr) => {
            if (status === "success") {
                localStorage.setItem("currentPage", screen);
            } else {
                location.replace("./404.html")
            }
        });

    }
    let currentPage = localStorage.getItem("currentPage");
    if (currentPage) {
        loadPage(currentPage);
    } else {
        loadPage();
    }
});