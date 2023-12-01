import $ from "jquery";

import hola from "./hola.js";

import { Example, obj } from "./example.ts";

$(function () {
  hola();
});

// Password requirements
$(document).ready(function () {
  const regex =
    /^(?=.*[a-zA-Z])(?=.*\d)(?=.*[-!@#$%^&*()_+|~=`{}\[\]:";'<>?,.\/])[a-zA-Z0-9-!@#$%^&*()_+|~=`{}\[\]:";'<>?,.\/]{6,13}$/;

  const form = $("form");
  const passwordInput = $("#password");
  const confirmPasswordInput = $("#confirm-password");

  form.on("submit", function (event) {
    const password = passwordInput.val();
    const confirmPassword = confirmPasswordInput.val();

    if (!regex.test(password)) {
      alert(
        "La contrasenya ha de tenir entre 6 i 13 caràcters, almenys una majúscula, una minúscula, un número i un caràcter especial.",
      );
      event.preventDefault();
      return;
    }

    if (password !== confirmPassword) {
      alert("Les contrasenyes no coincideixen.");
      event.preventDefault();
      return;
    }
  });
});
