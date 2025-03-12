/*para el regustro de alumno*/
document.addEventListener("DOMContentLoaded", function() {
  var formulario = document.getElementById("formulario-alumno");
  var container = document.querySelector(".alumnos-container");

  formulario.addEventListener("submit", function(event) {
    event.preventDefault();
    var nombre = document.getElementById("nombre").value;
    var matricula = document.getElementById("matricula").value;
    var correo = document.getElementById("correo").value;
    var grado = document.getElementById("grado").value;
    var grupo = document.getElementById("grupo").value;
    var contrasena = Math.floor(Math.random() * 8) + 1; // Contraseña predeterminada del 1 al 8

    agregarAlumno(nombre, matricula, correo, grado, grupo, contrasena);
    formulario.reset();
  });

  function agregarAlumno(nombre, matricula, correo, grado, grupo, contrasena) {
    var card = document.createElement("div");
    card.classList.add("alumno-card");
    card.innerHTML = `
      <h3>${nombre}</h3>
      <p>Matrícula: ${matricula}</p>
      <p>Correo: ${correo}</p>
      <p>Grado: ${grado}</p>
      <p>Grupo: ${grupo}</p>
      <p>Contraseña: ${contrasena}</p>
      <button class="eliminar">Eliminar</button>
      <button class="editar">Editar</button>
    `;
    container.appendChild(card);

    var eliminarBtn = card.querySelector(".eliminar");
    var editarBtn = card.querySelector(".editar");

    eliminarBtn.addEventListener("click", function() {
      container.removeChild(card);
    });

    editarBtn.addEventListener("click", function() {
      var nuevaContrasena = prompt("Ingrese la nueva contraseña:");
      if (nuevaContrasena !== null) {
        card.querySelector("p:nth-child(6)").textContent = "Contraseña: " + nuevaContrasena;
      }
    });
  }
});

/*solicitud*/
    // Datos de ejemplo (pueden ser obtenidos de una base de datos o API)
    const solicitudes = [
        { matriculaID: "001", hora: "10:00", fechaSolicitud: "2024-02-18", fechaRequerida: "2024-02-20", estatus: "En espera", comentarios: "Ninguno" },
        { matriculaID: "002", hora: "12:30", fechaSolicitud: "2024-02-18", fechaRequerida: "2024-02-21", estatus: "En progreso", comentarios: "Requiere revisión" },
        { matriculaID: "003", hora: "15:45", fechaSolicitud: "2024-02-17", fechaRequerida: "2024-02-19", estatus: "Aceptada", comentarios: "Listo para entrega" },
        { matriculaID: "004", hora: "09:15", fechaSolicitud: "2024-02-16", fechaRequerida: "2024-02-18", estatus: "Entregada", comentarios: "Completado" },
        { matriculaID: "005", hora: "11:20", fechaSolicitud: "2024-02-15", fechaRequerida: "2024-02-17", estatus: "Devuelta", comentarios: "Correcciones necesarias" }
    ];

    const tableBody = document.getElementById("solicitud-table-body");

    solicitudes.forEach(solicitud => {
        const row = document.createElement("tr");
        row.innerHTML = `
            <td>${solicitud.matriculaID}</td>
            <td>${solicitud.hora}</td>
            <td>${solicitud.fechaSolicitud}</td>
            <td>${solicitud.fechaRequerida}</td>
            <td>
                <select class="status-select" onchange="updateStatus(this)">
                    <option value="En espera" ${solicitud.estatus === "En espera" ? "selected" : ""}>En espera</option>
                    <option value="En progreso" ${solicitud.estatus === "En progreso" ? "selected" : ""}>En progreso</option>
                    <option value="Aceptada" ${solicitud.estatus === "Aceptada" ? "selected" : ""}>Aceptada</option>
                    <option value="Entregada" ${solicitud.estatus === "Entregada" ? "selected" : ""}>Entregada</option>
                    <option value="Devuelta" ${solicitud.estatus === "Devuelta" ? "selected" : ""}>Devuelta</option>
                </select>
            </td>
            <td>${solicitud.comentarios}</td>
        `;
        tableBody.appendChild(row);
    });

    function updateStatus(selectElement) {
        const selectedStatus = selectElement.value;
        // Aquí podrías enviar una solicitud HTTP para actualizar el estado en la base de datos o realizar otras acciones según sea necesario
        console.log("Nuevo estado seleccionado:", selectedStatus);
    }
