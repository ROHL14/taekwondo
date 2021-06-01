//Variables y Selectores
const tableContent2 = document.querySelector("#contentTable2 table tbody");
const panelDatos = document.querySelector("#panelDatos");
const panelFormulario = document.querySelector("#panelFormulario");
const idAlumno = document.querySelector("#id_alumno");
const btnCancelar = document.querySelector("#btnCancelar");
const API = new Api();
const objDatos = {
  records: [],
  recordsFilter: [],
  currentPage: 1,
  filter: "",
};

var calendarEl = document.getElementById("calendar");
var calendar = new FullCalendar.Calendar(calendarEl, {
  initialView: "dayGridMonth",
});
calendar.render();

calendar.on("dateClick", function (info) {
  fecha = info.dateStr;
  console.log(fecha);
  agregarAsistentes(fecha);
});

eventListeners();

function eventListeners() {
  btnCancelar.addEventListener("click", cancelarAsistencia);
}

function cancelarAsistencia() {
  panelDatos.classList.remove("d-none");
  panelFormulario.classList.add("d-none");
  console.log("press");
}

function agregarAsistentes(fecha) {
  limpiarForm(1);
  panelDatos.classList.add("d-none");
  panelFormulario.classList.remove("d-none");
  API.loadAlumnosAsis()
    .then((data) => {
      if (data.success) {
        console.log(data, fecha);
        objDatos.records = data.records;
        objDatos.currentPage = 1;
        rellenarAlumnos(data.records, fecha);
      } else {
        mensaje.textContent = data.msg;
      }
    })
    .catch((error) => {
      console.error("Error:", error);
    });
}

function rellenarAlumnos(records, fechaasis) {
  //idAlumno.innerHTML = "";
  //console.log(records);
  let html = "";
  records.forEach((item, index) => {
    const {
      id_alumno,
      nombre,
      apellido,
      dui,
      fechanac,
      email,
      telefono,
      direccion,
      color,
      hora,
    } = item;
    html += `
    <tr>
      <th scope="col">${index + 1}</th>
      <th scope="col">${nombre} ${apellido}</th>
      <th scope="col">${color}</th>
      <th scope="col">${hora}</th>
      <th scope="col">
        <form id="miform${index}">
          <div class="form-check form-switch">
            <input 
              class="form-check-input" 
              type="checkbox" 
              id="asistencia${index}" 
              name="asistencia" 
              onchange='handleChange("${id_alumno}","${index}","${fechaasis}")'
            >
            <input type="hidden" id="id_alumno${index}" name="id_alumno" value="${id_alumno}" class="campo">
            <input type="hidden" id="fecha${index}" name="fecha" value="${fechaasis}" class="campo">
            <input type="hidden" id="id_asistencia${index}" name="id_asistencia" value="0" class="campo">
            <label class="form-check-label" for="asistencia">Asistencia</label>
          </div>
        </form>
      </th>
		</tr>`;
    API.getOneAsistencia(id_alumno, fechaasis).then((data) => {
      if (data.success) {
        document.getElementById("asistencia" + index).checked = true;
      } else {
        document.getElementById("asistencia" + index).checked = false;
      }
    });
  });
  tableContent2.innerHTML = html;
  btnSwitch = document.getElementsByName("asistencia");
}

function handleChange(idAlumno, index, fecha) {
  if (btnSwitch[index].checked == true) {
    const miForm = document.getElementById("miform" + index);
    console.log(miForm);
    const formdata = new FormData(miForm);
    API.saveAsistencia(formdata);
  } else {
    API.deleteAsistencia(idAlumno, fecha);
  }
}

function limpiarForm(op) {
  document.querySelector("#id_asistencia").value = "0";
}
