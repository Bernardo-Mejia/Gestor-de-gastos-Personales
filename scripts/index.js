import menu from "./menu.js";
import scrollTopButton from "./scrollTopButton.js";

const d = document;

d.addEventListener("DOMContentLoaded", e=>{
    menu(".panel-btn", ".panel", ".menu a");
    scrollTopButton(".scroll-top-btn");
})