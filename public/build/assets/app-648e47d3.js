window._=require("lodash");try{require("bootstrap")}catch{}window.axios=require("axios");window.axios.defaults.headers.common["X-Requested-With"]="XMLHttpRequest";const s=[],d=t=>{document.readyState==="loading"?(s.length||document.addEventListener("DOMContentLoaded",()=>{for(const n of s)n()}),s.push(t)):t()};function i(){if(document.querySelector("html").getAttribute("data-bs-theme")==="auto"){let o=function(){const a=window.matchMedia("(prefers-color-scheme: dark)").matches;if(document.querySelector("html").setAttribute("data-bs-theme",a?"dark":"light"),document.getElementById("logo-path").setAttribute("fill",a?"white":"black"),a)for(const e of document.getElementsByClassName("bg-light"))e.classList.remove("bg-light"),e.classList.add("bg-dark");else for(const e of document.getElementsByClassName("bg-dark"))e.classList.remove("bg-dark"),e.classList.add("bg-light")};var n=o;window.matchMedia("(prefers-color-scheme: dark)").addEventListener("change",o),o()}}d(i);
