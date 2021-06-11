const BASE_API = "/taekwondo/";

class Api {
  async validarLogin(form) {
    const query = await fetch(`${BASE_API}login/validar`, {
      method: "POST",
      body: form,
    });
    const data = await query.json();
    return data;
  }

  // Load
  async loadData() {
    const query = await fetch(`${BASE_API}usuarios/getAll`);
    const data = await query.json();
    return data;
  }
  async loadCategorias() {
    const query = await fetch(`${BASE_API}categorias/getAll`);
    const data = await query.json();
    return data;
  }
  async loadPaises() {
    const query = await fetch(`${BASE_API}paises/getAll`);
    const data = await query.json();
    return data;
  }
  async loadCintas() {
    const query = await fetch(`${BASE_API}cintas/getAll`);
    const data = await query.json();
    return data;
  }
  async loadHorarios() {
    const query = await fetch(`${BASE_API}horarios/getAll`);
    const data = await query.json();
    return data;
  }
  async loadEncargados() {
    const query = await fetch(`${BASE_API}encargados/getAll`);
    const data = await query.json();
    return data;
  }
  async loadTorneos() {
    const query = await fetch(`${BASE_API}torneos/getAll`);
    const data = await query.json();
    return data;
  }
  async loadEquipo() {
    const query = await fetch(`${BASE_API}equipo/getAll`);
    const data = await query.json();
    return data;
  }
  async loadAlumnos() {
    const query = await fetch(`${BASE_API}alumnos/getAll`);
    const data = await query.json();
    return data;
  }
  async loadParticipantes() {
    const query = await fetch(`${BASE_API}participantes/getAll`);
    const data = await query.json();
    return data;
  }
  async loadTorneosPar() {
    const query = await fetch(`${BASE_API}participantes/getAllTorneos`);
    const data = await query.json();
    return data;
  }
  async loadAlumnosPar() {
    const query = await fetch(`${BASE_API}participantes/getAllAlumnos`);
    const data = await query.json();
    return data;
  }
  async loadPrestamos() {
    const query = await fetch(`${BASE_API}prestamos/getAll`);
    const data = await query.json();
    return data;
  }
  async loadAsistencia() {
    const query = await fetch(`${BASE_API}asistencia/getAll`);
    const data = await query.json();
    return data;
  }
  async loadHorariosAsis() {
    const query = await fetch(`${BASE_API}asistencia/getAllHorarios`);
    const data = await query.json();
    return data;
  }
  async loadAlumnosAsis() {
    const query = await fetch(`${BASE_API}asistencia/getAllAlumnos`);
    const data = await query.json();
    return data;
  }

  // Save
  async saveUser(form) {
    const query = await fetch(`${BASE_API}usuarios/save`, {
      method: "POST",
      body: form,
    });
    const data = await query.json();
    return data;
  }
  async saveCategoria(form) {
    const query = await fetch(`${BASE_API}categorias/save`, {
      method: "POST",
      body: form,
    });
    const data = await query.json();
    return data;
  }
  async savePais(form) {
    const query = await fetch(`${BASE_API}paises/save`, {
      method: "POST",
      body: form,
    });
    const data = await query.json();
    return data;
  }
  async saveCinta(form) {
    const query = await fetch(`${BASE_API}cintas/save`, {
      method: "POST",
      body: form,
    });
    const data = await query.json();
    return data;
  }
  async saveHorario(form) {
    const query = await fetch(`${BASE_API}horarios/save`, {
      method: "POST",
      body: form,
    });
    const data = await query.json();
    return data;
  }
  async saveEncargado(form) {
    const query = await fetch(`${BASE_API}encargados/save`, {
      method: "POST",
      body: form,
    });
    const data = await query.json();
    return data;
  }
  async saveTorneo(form) {
    const query = await fetch(`${BASE_API}torneos/save`, {
      method: "POST",
      body: form,
    });
    const data = await query.json();
    return data;
  }
  async saveEquipo(form) {
    const query = await fetch(`${BASE_API}equipo/save`, {
      method: "POST",
      body: form,
    });
    const data = await query.json();
    return data;
  }
  async saveAlumno(form) {
    const query = await fetch(`${BASE_API}alumnos/save`, {
      method: "POST",
      body: form,
    });
    const data = await query.json();
    return data;
  }
  async saveParticipante(form) {
    console.log(form);
    const query = await fetch(`${BASE_API}participantes/save`, {
      method: "POST",
      body: form,
    });
    const data = await query.json();
    return data;
  }
  async savePrestamo(form) {
    const query = await fetch(`${BASE_API}prestamos/save`, {
      method: "POST",
      body: form,
    });
    const data = await query.json();
    return data;
  }
  async updatePrestamo(form) {
    const query = await fetch(`${BASE_API}prestamos/update`, {
      method: "POST",
      body: form,
    });
    const data = await query.json();
    return data;
  }
  async saveAsistencia(form) {
    const query = await fetch(`${BASE_API}asistencia/save`, {
      method: "POST",
      body: form,
    });
    const data = await query.json();
    return data;
  }

  // GET one
  async getOneUser(id) {
    const query = await fetch(`${BASE_API}usuarios/getOneUser?id=${id}`);
    const data = await query.json();
    return data;
  }
  async getOneCategoria(id) {
    const query = await fetch(`${BASE_API}categorias/getOneCategoria?id=${id}`);
    const data = await query.json();
    return data;
  }
  async getOnePais(id) {
    const query = await fetch(`${BASE_API}paises/getOnePais?id=${id}`);
    const data = await query.json();
    return data;
  }
  async getOneCinta(id) {
    const query = await fetch(`${BASE_API}cintas/getOneCinta?id=${id}`);
    const data = await query.json();
    return data;
  }
  async getOneHorario(id) {
    const query = await fetch(`${BASE_API}horarios/getOneHorario?id=${id}`);
    const data = await query.json();
    return data;
  }
  async getOneEncargado(id) {
    const query = await fetch(`${BASE_API}encargados/getOneEncargado?id=${id}`);
    const data = await query.json();
    return data;
  }
  async getOneTorneo(id) {
    const query = await fetch(`${BASE_API}torneos/getOneTorneo?id=${id}`);
    const data = await query.json();
    return data;
  }
  async getOneEquipo(id) {
    const query = await fetch(`${BASE_API}equipo/getOneEquipo?id=${id}`);
    const data = await query.json();
    return data;
  }
  async getOneAlumno(id) {
    const query = await fetch(`${BASE_API}alumnos/getOneAlumno?id=${id}`);
    const data = await query.json();
    return data;
  }
  async getOneParticipante(idalumno, idtorneo) {
    const query = await fetch(
      `${BASE_API}participantes/getOneParticipante?idalumno=${idalumno}&idtorneo=${idtorneo}`
    );
    const data = await query.json();
    return data;
  }
  async getOnePrestamo(id) {
    const query = await fetch(`${BASE_API}prestamos/getOnePrestamo?id=${id}`);
    const data = await query.json();
    return data;
  }
  async getOneAsistencia(idalumno, fecha) {
    const query = await fetch(
      `${BASE_API}asistencia/getOneAsistencia?idalumno=${idalumno}&fecha=${fecha}`
    );
    const data = await query.json();
    return data;
  }

  // Delete
  async deleteUser(id) {
    const query = await fetch(`${BASE_API}usuarios/deleteUser?id=${id}`);
    const data = await query.json();
    return data;
  }
  async deleteCategoria(id) {
    const query = await fetch(`${BASE_API}categorias/deleteCategoria?id=${id}`);
    const data = await query.json();
    return data;
  }
  async deletePais(id) {
    const query = await fetch(`${BASE_API}paises/deletePais?id=${id}`);
    const data = await query.json();
    return data;
  }
  async deleteCinta(id) {
    const query = await fetch(`${BASE_API}cintas/deleteCinta?id=${id}`);
    const data = await query.json();
    return data;
  }
  async deleteHorario(id) {
    const query = await fetch(`${BASE_API}horarios/deleteHorario?id=${id}`);
    const data = await query.json();
    return data;
  }
  async deleteEncargado(id) {
    const query = await fetch(`${BASE_API}encargados/deleteEncargado?id=${id}`);
    const data = await query.json();
    return data;
  }
  async deleteTorneo(id) {
    const query = await fetch(`${BASE_API}torneos/deleteTorneo?id=${id}`);
    const data = await query.json();
    return data;
  }
  async deleteEquipo(id) {
    const query = await fetch(`${BASE_API}equipo/deleteEquipo?id=${id}`);
    const data = await query.json();
    return data;
  }
  async deleteAlumno(id) {
    const query = await fetch(`${BASE_API}alumnos/deleteAlumno?id=${id}`);
    const data = await query.json();
    return data;
  }
  async deleteParticipante(idalumno, idtorneo) {
    const query = await fetch(
      `${BASE_API}participantes/deleteParticipante?idalumno=${idalumno}&idtorneo=${idtorneo}`
    );
    const data = await query.json();
    return data;
  }
  async deletePrestamo(id) {
    const query = await fetch(`${BASE_API}prestamos/deletePrestamo?id=${id}`);
    const data = await query.json();
    return data;
  }
  async deleteAsistencia(idalumno, fecha) {
    const query = await fetch(
      `${BASE_API}asistencia/deleteAsistencia?idalumno=${idalumno}&fecha=${fecha}`
    );
    const data = await query.json();
    return data;
  }
}
