//Variables y Selectores
const btnViewReport = document.querySelector("#btnViewReport");
const idCinta = document.querySelector("#id_cinta");
const frameReporte = document.querySelector("#framereporte");
const API = new Api();

//Eventos
eventListeners();

function eventListeners() {
  document.addEventListener("DOMContentLoaded", cargarDatos);
  btnViewReport.addEventListener("click", verReporte);
}

//Funciones

function cargarDatos() {
  API.loadCintas()
    .then((data) => {
      rellenarCintas(data.records);
    })
    .catch((error) => {
      console.error("Error:", error);
    });
}

function rellenarCintas(records) {
  idCinta.innerHTML = "";
  const optionCinta = document.createElement("option");
  optionCinta.value = "0";
  optionCinta.textContent = "Todos";
  idCinta.append(optionCinta);
  records.forEach((item) => {
    const { id_cinta, color } = item;
    const optionCinta = document.createElement("option");
    optionCinta.value = id_cinta;
    optionCinta.textContent = color;
    idCinta.append(optionCinta);
  });
}

function verReporte() {
  frameReporte.src = `${BASE_API}reportes/getReporteAlumnos?id_cinta=${idCinta.value}`;
}
