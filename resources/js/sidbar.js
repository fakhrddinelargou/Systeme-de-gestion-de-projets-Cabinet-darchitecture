const sidbar = document.getElementById("sidbar");
const btn = document.getElementById("btn");
const handleUsers = document.getElementById("handleUsers");
const user_container = document.getElementById("user_container");

// Toggle Menu
window.handleSidbar = (e) => {
    let status = sidbar.dataset.open === "false" ? "true" : "false";
    sidbar.dataset.open = status;

    sidbar.style.left = status === "true" ? "0" : "";
    e.style.left = status === "true" ? "49%" : "";
};

// Toggle Setting Button
window.toggleMenu = ()=> {
    const menu = document.getElementById("myMenu");
    menu.classList.toggle("open");
}
