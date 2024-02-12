const mostrarSeccion = (Id) => {
  const secciones = document.querySelectorAll(".section");
  secciones.forEach((seccion) => {
    seccion.classList.remove("flex");
  });
  const seccionMostrar = document.getElementById(Id);
  seccionMostrar.classList.add("flex");
};

const validationForm = () => {
  const formulario = document.querySelector(".register-form");
  const nombre = document.getElementById("nombre");
  const numero = document.getElementById("numero");
  const estado = document.getElementById("estado");
  const r_nombre = /^[a-zA-ZáéíóúÁÉÍÓÚñÑüÜ\s']+$/;
  const parrafo = document.getElementById("aviso");

  if (
    nombre.value.length == 0 ||
    !r_nombre.test(nombre.value) ||
    numero.value.length == 0 ||
    estado.value.length == 0
  ) {
    parrafo.innerHTML = "¡Campos no válidos!";
    if (nombre.value.length == 0 || !r_nombre.test(nombre.value)) {
      nombre.style.border = ".15rem solid red";
    } else {
      nombre.style.border = ".15rem solid green";
    }
    if (numero.value.length == 0) {
      numero.style.border = ".15rem solid red";
    } else {
      numero.style.border = ".15rem solid green";
    }
    if (estado.value.length == 0) {
      estado.style.border = ".15rem solid red";
    } else {
      estado.style.border = ".15rem solid green";
    }
  } else {
    formulario.submit();
  }
};

document.addEventListener("DOMContentLoaded", function () {
  var numberElement = document.getElementById("valor");
  var formattedNumber = parseFloat(numberElement.dataset.number).toLocaleString(
    "es-ES"
  );
  numberElement.textContent = formattedNumber;
});
