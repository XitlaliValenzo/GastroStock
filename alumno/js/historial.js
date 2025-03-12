document.addEventListener("DOMContentLoaded", function() {
  // Datos de ejemplo para demostración
  var requisiciones = [
    { fechaEntrega: "2024-03-02", fechaSolicitud: "2024-02-29", quienSolicito: "Juan Pérez", estatus: "Activa", productos: ["Producto 1", "Producto 2"], comentarios: ["", ""] },
    { fechaEntrega: "2024-02-14", fechaSolicitud: "2024-01-10", quienSolicito: "María Gómez", estatus: "Desactivada", productos: ["Producto 3", "Producto 4"], comentarios: ["", ""] }
  ];

  // Obtener el cuerpo de la tabla
  var tbody = document.getElementById("historial-body");

  // Generar filas de la tabla con los datos de las requisiciones
  requisiciones.forEach(function(requisicion) {
    requisicion.productos.forEach(function(producto, index) {
      var row = document.createElement("tr");
      if (index === 0) {
        row.innerHTML = `
          <td rowspan="${requisicion.productos.length}">${requisicion.fechaEntrega}</td>
          <td rowspan="${requisicion.productos.length}">${requisicion.fechaSolicitud}</td>
          <td rowspan="${requisicion.productos.length}">${requisicion.quienSolicito}</td>
          <td rowspan="${requisicion.productos.length}">${requisicion.estatus}</td>
          <td>${producto}</td>
          <td><button onclick="agregarComentario(${requisicion.productos.length}, ${index})">Agregar Comentario</button></td>
        `;
      } else {
        row.innerHTML = `
          <td>${producto}</td>
          <td><button onclick="agregarComentario(${requisicion.productos.length}, ${index})">Agregar Comentario</button></td>
        `;
      }
      tbody.appendChild(row);
    });
  });
});

function agregarComentario(rowspan, index) {
  var comentario = prompt("Ingrese un comentario:");
  if (comentario !== null) {
    var comentarios = document.querySelectorAll("#historial-body tr td:nth-child(6) button");
    var row = Math.ceil((index + 1) / rowspan) * rowspan - rowspan + 1;
    comentarios[row - 1].textContent = "Comentario agregado";
    comentarios[row - 1].disabled = true;
  }
}
