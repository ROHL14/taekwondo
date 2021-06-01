//Variables y Selectores
const tableContent = document.querySelector("#contentTable table tbody");
const tableContent2 = document.querySelector("#contentTable2 table tbody");
const pagination = document.querySelector(".pagination");
const searchText = document.querySelector("#txtSearch");
const btnNew = document.querySelector("#btnAgregar");
const panelDatos = document.querySelector("#panelDatos");
const panelFormulario = document.querySelector("#panelFormulario");
const idAlumno = document.querySelector("#id_alumno");
const miForm = document.querySelector("#miform");
const btnCancelar = document.querySelector("#btnCancelar");
const recordShow = 4;
const API = new Api();
const objDatos = {
  records: [],
  recordsFilter: [],
  currentPage: 1,
  filter: "",
};
//Eventos
eventListeners();

function eventListeners() {
  document.addEventListener("DOMContentLoaded", cargarDatos);
  searchText.addEventListener("input", aplicarFiltro);
  btnCancelar.addEventListener("click", cancelarParticipante);
}

//Funciones

function cancelarParticipante() {
  panelDatos.classList.remove("d-none");
  panelFormulario.classList.add("d-none");
  cargarDatos();
}

function cargarDatos() {
  API.loadTorneosPar()
    .then((data) => {
      if (data.success) {
        //console.log(data);
        objDatos.records = data.records;
        objDatos.currentPage = 1;
        crearTabla();
        //return API.loadAlumnos();
      } else {
        mensaje.textContent = data.msg;
      }
    })
    .catch((error) => {
      console.error("Error:", error);
    });
}

function rellenarAlumnos(records, idtorneo) {
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
    } = item;
    html += `
    <tr>
      <th scope="col">${index + 1}</th>
      <th scope="col">${nombre} ${apellido}</th>
      <th scope="col">${email}</th>
      <th scope="col">${color}</th>
      <th scope="col">
        <form id="miform${index}">
          <div class="form-check form-switch">
            <input 
              class="form-check-input" 
              type="checkbox" 
              id="participa${index}" 
              name="participa" 
              onchange='handleChange("${id_alumno}","${index}","${idtorneo}","miform${index}")'
            >
            <input type="hidden" id="id_alumno${index}" name="id_alumno" value="${id_alumno}" class="campo">
            <input type="hidden" id="id_torneo${index}" name="id_torneo" value="${idtorneo}" class="campo">
            <input type="hidden" id="id_participante${index}" name="id_participante" value="0" class="campo">
            <label class="form-check-label" for="participa">Participa</label>
          </div>
        </form>
      </th>
		</tr>`;
    API.getOneParticipante(id_alumno, idtorneo).then((data) => {
      if (data.success) {
        document.getElementById("participa" + index).checked = true;
      } else {
        document.getElementById("participa" + index).checked = false;
      }
    });
  });
  tableContent2.innerHTML = html;
  btnSwitch = document.getElementsByName("participa");
}

function handleChange(idAlumno, index, idTorneo, formindex) {
  if (btnSwitch[index].checked == true) {
    const miForm = document.getElementById("miform" + index);
    console.log(miForm);
    const formdata = new FormData(miForm);
    API.saveParticipante(formdata);
  } else {
    API.deleteParticipante(idAlumno, idTorneo);
  }
}

function aplicarFiltro(e) {
  e.preventDefault();
  objDatos.filter = this.value;
  crearTabla();
}

function crearTabla() {
  if (objDatos.filter == "") {
    objDatos.recordsFilter = objDatos.records.map((item) => item);
  } else {
    objDatos.recordsFilter = objDatos.records.filter((item) => {
      const { nombre_torneo, direccion, pais } = item;
      if (
        nombre_torneo.toUpperCase().search(objDatos.filter.toUpperCase()) !=
          -1 ||
        direccion.toUpperCase().search(objDatos.filter.toUpperCase()) != -1 ||
        pais.toUpperCase().search(objDatos.filter.toUpperCase()) != -1
      ) {
        return item;
      }
    });
  }
  const recordIni = objDatos.currentPage * recordShow - recordShow;
  const recordFin = recordIni + recordShow - 1;
  let html = "";
  objDatos.recordsFilter.forEach((item, index) => {
    if (index >= recordIni && index <= recordFin) {
      const {
        id_torneo,
        nombre_torneo,
        fecha,
        estado_torneo,
        direccion,
        pais,
      } = item;
      html += `<tr>
			      <th scope="col">${nombre_torneo}</th>
			      <th scope="col">${fecha}</th>
            <th scope="col">${direccion}</th>
            <th scope="col">${pais}</th>
			      <th scope="col">
              <button class='btn btn-primary btn-xs' onclick='agregarParticipantes("${id_torneo}")'>
                Agregar Participantes
              </button>
            </th>
			    </tr>`;
    }
  });
  tableContent.innerHTML = html;
  crearPaginacion();
}

function crearPaginacion() {
  while (pagination.firstElementChild) {
    pagination.removeChild(pagination.firstElementChild);
  }
  const elAnterior = document.createElement("li");
  elAnterior.classList.add("page-item");
  elAnterior.innerHTML = `<a class="page-link" href="#">Anterior</a>`;
  elAnterior.onclick = () => {
    objDatos.currentPage =
      objDatos.currentPage == 1 ? 1 : --objDatos.currentPage;
    crearTabla();
  };
  pagination.append(elAnterior);
  const totalPage = Math.ceil(objDatos.recordsFilter.length / recordShow);
  for (let i = 1; i <= totalPage; i++) {
    const el = document.createElement("li");
    el.classList.add("page-item");
    el.innerHTML = `<a class="page-link" href="#">${i}</a>`;
    el.onclick = () => {
      objDatos.currentPage = i;
      crearTabla();
    };
    pagination.append(el);
  }
  const elSiguiente = document.createElement("li");
  elSiguiente.classList.add("page-item");
  elSiguiente.innerHTML = '<a class="page-link" href="#">Siguiente</a>';
  elSiguiente.onclick = () => {
    objDatos.currentPage =
      objDatos.currentPage == totalPage ? totalPage : ++objDatos.currentPage;
    crearTabla();
  };
  pagination.append(elSiguiente);
}

function agregarParticipantes(id) {
  limpiarForm(1);
  panelDatos.classList.add("d-none");
  panelFormulario.classList.remove("d-none");
  API.loadAlumnosPar()
    .then((data) => {
      if (data.success) {
        console.log(data, id);
        objDatos.records = data.records;
        objDatos.currentPage = 1;
        rellenarAlumnos(data.records, id);
        return API.loadTorneosPar();
      } else {
        mensaje.textContent = data.msg;
      }
    })
    .then((data) => {
      console.log(data.records);
    })
    .catch((error) => {
      console.error("Error:", error);
    });
}

function limpiarForm(op) {
  miForm.reset();
  document.querySelector("#id_participante").value = "0";
}
