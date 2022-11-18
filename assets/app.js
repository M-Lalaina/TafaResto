/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */

// any CSS you import will output into a single css file (app.css in this case)
import "./styles/app.css";
require("bootstrap");
require("./js/mdb.min.js");

// start the Stimulus application
import "./bootstrap";

window.addEventListener("scroll", () => {
    const nav = document.querySelector("nav");
    nav.classList.toggle("sticky", window.scrollY > 0);
});

var menuToggle = document.querySelector(".menuToggle");

menuToggle.addEventListener("click", () => {
    const navigation = document.querySelector(".navigation");
    menuToggle.classList.toggle("active");
    navigation.classList.toggle("active");
});
