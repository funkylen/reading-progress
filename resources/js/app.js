import './bootstrap';
import {onDOMContentLoaded} from "bootstrap/js/src/util";

function autoChangeTheme() {
    const htmlElement = document.querySelector("html")
    if (htmlElement.getAttribute("data-bs-theme") === 'auto') {
        function updateTheme() {
            const isDark = window.matchMedia("(prefers-color-scheme: dark)").matches;

            document.querySelector("html")
                .setAttribute("data-bs-theme", isDark ? "dark" : "light")

            document.getElementById("logo-path")
                .setAttribute("fill", isDark ? "white" : "black")
        }

        window.matchMedia('(prefers-color-scheme: dark)').addEventListener('change', updateTheme)
        updateTheme()
    }
}

onDOMContentLoaded(autoChangeTheme)
