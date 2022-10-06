/**
 * Author: G13 - 2022-HS2-COS60010-Technology Enquiry Project
 * Target: index.html
 * Purpose: Design for onclick 
 * Created: 6/10/2022
 * Last updated: 6/10/2022
 */

"use strict";
window.addEventListener("load", init);

function init() {
    var loginBtn = document.getElementById("loginBtn");
    var registerBtn = document.getElementById("registerBtn");

    loginBtn.addEventListener("click", login);
    registerBtn.addEventListener("click", register);
}

function register() {
    var x = document.getElementById("login");
    var y = document.getElementById("register");
    var z = document.getElementById("btn");

    x.style.left = "-400px";
    y.style.left = "50px";
    z.style.left = "110px";
}

function login() {
    var x = document.getElementById("login");
    var y = document.getElementById("register");
    var z = document.getElementById("btn");

    x.style.left = "50px";
    y.style.left = "450px";
    z.style.left = "0";
}