//Variables y Selectores
const btnViewReportAlumno = document.querySelector("#btnViewReportAlumno");
const btnViewReportTorneo = document.querySelector("#btnViewReportTorneo");
const btnViewReportParticipante = document.querySelector(
  "#btnViewReportParticipante"
);
const btnViewReportEquipo = document.querySelector("#btnViewReportEquipo");
const btnViewReportPrestamo = document.querySelector("#btnViewReportPrestamo");
const btnViewReportAsistencia = document.querySelector(
  "#btnViewReportAsistencia"
);

const sectionAlumno = document.querySelector("#centroAlumno");
const sectionTorneo = document.querySelector("#centroTorneo");
const sectionPartcipante = document.querySelector("#centroParticipante");
const sectionEquipo = document.querySelector("#centroEquipo");
const sectionPrestamo = document.querySelector("#centroPrestamo");
const sectionAsistencia = document.querySelector("#centroAsistencia");

const verAlumno = document.querySelector("#buttonAlumno");
const verTorneo = document.querySelector("#buttonTorneo");
const verParticipante = document.querySelector("#buttonParticipante");
const verEquipo = document.querySelector("#buttonEquipo");
const verPrestamo = document.querySelector("#buttonPrestamo");
const verAsistencia = document.querySelector("#buttonAsistencia");

const idCinta = document.querySelector("#id_cinta");
const idPais = document.querySelector("#id_pais");
const idTorneo = document.querySelector("#id_torneo");
const idCategoria = document.querySelector("#id_categoria");
const idEquipo = document.querySelector("#id_equipo");
const idAlumno = document.querySelector("#id_alumno");
const idHorario = document.querySelector("#id_horario");
const idFecha = document.querySelector("#fecha");
const idAlumno2 = document.querySelector("#id_alumno2");

const frameReporteAlumno = document.querySelector("#framereporteAlumno");
const frameReporteTorneo = document.querySelector("#framereporteTorneo");
const frameReporteParticipante = document.querySelector(
  "#framereporteParticipante"
);
const frameReporteEquipo = document.querySelector("#framereporteEquipo");
const frameReportePrestamo = document.querySelector("#framereportePrestamo");
const frameReporteAsistencia = document.querySelector(
  "#framereporteAsistencia"
);

const API = new Api();

//Eventos
eventListeners();

function eventListeners() {
  document.addEventListener("DOMContentLoaded", cargarDatosAlumnos);

  btnViewReportAlumno.addEventListener("click", verReporteAlumno);
  btnViewReportTorneo.addEventListener("click", verReporteTorneo);
  btnViewReportParticipante.addEventListener("click", verReporteParticipante);
  btnViewReportEquipo.addEventListener("click", verReporteEquipo);
  btnViewReportPrestamo.addEventListener("click", verReportePrestamo);
  btnViewReportAsistencia.addEventListener("click", verReporteAsistencia);

  verAlumno.addEventListener("click", verSectionAlumno);
  verTorneo.addEventListener("click", verSectionTorneo);
  verParticipante.addEventListener("click", verSectionParticipante);
  verEquipo.addEventListener("click", verSectionEquipo);
  verPrestamo.addEventListener("click", verSectionPrestamo);
  verAsistencia.addEventListener("click", verSectionAsistencia);
}

//Funciones

function verSectionAlumno() {
  sectionAlumno.classList.remove("d-none");
  sectionTorneo.classList.add("d-none");
  sectionPartcipante.classList.add("d-none");
  sectionEquipo.classList.add("d-none");
  sectionPrestamo.classList.add("d-none");
  sectionAsistencia.classList.add("d-none");
}

function verSectionTorneo() {
  sectionAlumno.classList.add("d-none");
  sectionTorneo.classList.remove("d-none");
  sectionPartcipante.classList.add("d-none");
  sectionEquipo.classList.add("d-none");
  sectionPrestamo.classList.add("d-none");
  sectionAsistencia.classList.add("d-none");
}

function verSectionParticipante() {
  sectionAlumno.classList.add("d-none");
  sectionTorneo.classList.add("d-none");
  sectionPartcipante.classList.remove("d-none");
  sectionEquipo.classList.add("d-none");
  sectionPrestamo.classList.add("d-none");
  sectionAsistencia.classList.add("d-none");
}

function verSectionEquipo() {
  sectionAlumno.classList.add("d-none");
  sectionTorneo.classList.add("d-none");
  sectionPartcipante.classList.add("d-none");
  sectionEquipo.classList.remove("d-none");
  sectionPrestamo.classList.add("d-none");
  sectionAsistencia.classList.add("d-none");
}

function verSectionPrestamo() {
  sectionAlumno.classList.add("d-none");
  sectionTorneo.classList.add("d-none");
  sectionPartcipante.classList.add("d-none");
  sectionEquipo.classList.add("d-none");
  sectionPrestamo.classList.remove("d-none");
  sectionAsistencia.classList.add("d-none");
}

function verSectionAsistencia() {
  sectionAlumno.classList.add("d-none");
  sectionTorneo.classList.add("d-none");
  sectionPartcipante.classList.add("d-none");
  sectionEquipo.classList.add("d-none");
  sectionPrestamo.classList.add("d-none");
  sectionAsistencia.classList.remove("d-none");
}

function cargarDatosAlumnos() {
  API.loadCintas()
    .then((data) => {
      rellenarCintas(data.records);
      return API.loadPaises();
    })
    .then((data) => {
      rellenarPais(data.records);
      return API.loadTorneos();
    })
    .then((data) => {
      rellenarTorneos(data.records);
      return API.loadCategorias();
    })
    .then((data) => {
      rellenarCategorias(data.records);
      return API.loadEquipo();
    })
    .then((data) => {
      rellenarEquipo(data.records);
      return API.loadAlumnos();
    })
    .then((data) => {
      rellenarAlumnos(data.records);
      rellenarAlumnos2(data.records);
      return API.loadHorarios();
    })
    .then((data) => {
      rellenarHorarios(data.records);
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

function rellenarPais(records) {
  idPais.innerHTML = "";
  const optionPais = document.createElement("option");
  optionPais.value = "0";
  optionPais.textContent = "Todos";
  idPais.append(optionPais);
  records.forEach((item) => {
    const { id_pais, pais } = item;
    const optionPais = document.createElement("option");
    optionPais.value = id_pais;
    optionPais.textContent = pais;
    idPais.append(optionPais);
  });
}

function rellenarTorneos(records) {
  idTorneo.innerHTML = "";
  const optionTorneo = document.createElement("option");
  optionTorneo.value = "0";
  optionTorneo.textContent = "Todos";
  idTorneo.append(optionTorneo);
  records.forEach((item) => {
    const { id_torneo, nombre_torneo } = item;
    const optionTorneo = document.createElement("option");
    optionTorneo.value = id_torneo;
    optionTorneo.textContent = nombre_torneo;
    idTorneo.append(optionTorneo);
  });
}

function rellenarCategorias(records) {
  idCategoria.innerHTML = "";
  const optionCategoria = document.createElement("option");
  optionCategoria.value = "0";
  optionCategoria.textContent = "Todos";
  idCategoria.append(optionCategoria);
  records.forEach((item) => {
    const { id_categoria, categoria } = item;
    const optionCategoria = document.createElement("option");
    optionCategoria.value = id_categoria;
    optionCategoria.textContent = categoria;
    idCategoria.append(optionCategoria);
  });
}

function rellenarEquipo(records) {
  idEquipo.innerHTML = "";
  const optionEquipo = document.createElement("option");
  optionEquipo.value = "0";
  optionEquipo.textContent = "Todos";
  idEquipo.append(optionEquipo);
  records.forEach((item) => {
    const { id_equipo, equipo } = item;
    const optionEquipo = document.createElement("option");
    optionEquipo.value = id_equipo;
    optionEquipo.textContent = equipo;
    idEquipo.append(optionEquipo);
  });
}

function rellenarAlumnos(records) {
  idAlumno.innerHTML = "";
  const optionAlumno = document.createElement("option");
  optionAlumno.value = "0";
  optionAlumno.textContent = "Todos";
  idAlumno.append(optionAlumno);
  records.forEach((item) => {
    const { id_alumno, nombre, apellido } = item;
    const optionAlumno = document.createElement("option");
    optionAlumno.value = id_alumno;
    optionAlumno.textContent = nombre + " " + apellido;
    idAlumno.append(optionAlumno);
  });
}

function rellenarHorarios(records) {
  idHorario.innerHTML = "";
  const optionHorario = document.createElement("option");
  optionHorario.value = "0";
  optionHorario.textContent = "Todos";
  idHorario.append(optionHorario);
  records.forEach((item) => {
    const { id_horario, hora } = item;
    const optionHorario = document.createElement("option");
    optionHorario.value = id_horario;
    optionHorario.textContent = hora;
    idHorario.append(optionHorario);
  });
}

function rellenarAlumnos2(records) {
  idAlumno2.innerHTML = "";
  const optionAlumno = document.createElement("option");
  optionAlumno.value = "0";
  optionAlumno.textContent = "Todos";
  idAlumno2.append(optionAlumno);
  records.forEach((item) => {
    const { id_alumno, nombre, apellido } = item;
    const optionAlumno = document.createElement("option");
    optionAlumno.value = id_alumno;
    optionAlumno.textContent = nombre + " " + apellido;
    idAlumno2.append(optionAlumno);
  });
}

function verReporteAlumno() {
  frameReporteAlumno.src = `${BASE_API}reportes/getReporteAlumnos?id_cinta=${idCinta.value}`;
}

function verReporteTorneo() {
  frameReporteTorneo.src = `${BASE_API}reportes/getReporteTorneos?id_pais=${idPais.value}`;
}

function verReporteParticipante() {
  frameReporteParticipante.src = `${BASE_API}reportes/getReporteParticipantes?id_torneo=${idTorneo.value}`;
}

function verReporteEquipo() {
  frameReporteEquipo.src = `${BASE_API}reportes/getReporteEquipo?id_categoria=${idCategoria.value}`;
}

function verReportePrestamo() {
  frameReportePrestamo.src = `${BASE_API}reportes/getReportePrestamos?id_equipo=${idEquipo.value}&id_alumno=${idAlumno.value}`;
}

function verReporteAsistencia() {
  frameReporteAsistencia.src = `${BASE_API}reportes/getReporteAsistencia?id_horario=${idHorario.value}&id_alumno=${idAlumno2.value}`;
}
