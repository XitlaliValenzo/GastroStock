
document.addEventListener("DOMContentLoaded", function() {
  var dropdown = document.querySelector(".dropdown");
  var dropdownContent = document.querySelector(".dropdown-content");

  dropdown.addEventListener("click", function() {
    dropdownContent.classList.toggle("show");
  });

  window.addEventListener("click", function(event) {
    if (!event.target.matches(".dropbtn")) {
      var dropdowns = document.getElementsByClassName("dropdown-content");
      for (var i = 0; i < dropdowns.length; i++) {
        var openDropdown = dropdowns[i];
        if (openDropdown.classList.contains("show")) {
          openDropdown.classList.remove("show");
        }
      }
    }
  });
});

//items al carrito
function agregarItem(id) {
  var item = document.createElement('li');
  item.textContent = 'Utensilio ' + id;
  item.setAttribute('data-id', id);

  var cantidad = document.createElement('span');
  cantidad.textContent = '  1  ';

  var aumentar = document.createElement('button');
  aumentar.textContent = ' + ';
  aumentar.addEventListener('click', function() {
    aumentarCantidad(item);
  });

  var disminuir = document.createElement('button');
  disminuir.textContent = ' - ';
  disminuir.addEventListener('click', function() {
    disminuirCantidad(item);
  });

  item.appendChild(cantidad);
  item.appendChild(aumentar);
  item.appendChild(disminuir);

  document.getElementById('items').appendChild(item);
}

function aumentarCantidad(item) {
  var cantidad = parseInt(item.querySelector('span').textContent);
  cantidad++;
  item.querySelector('span').textContent = cantidad;
}

function disminuirCantidad(item) {
  var cantidad = parseInt(item.querySelector('span').textContent);
  if (cantidad > 1) {
    cantidad--;
    item.querySelector('span').textContent = cantidad;
  }
}

function vaciarCarrito() {
  document.getElementById('items').innerHTML = '';
}

//para buscar
function buscar() {
  var input, filtro, elemento;
  input = document.getElementById('inputBusqueda');
  filtro = input.value.toUpperCase();
  elemento = document.getElementById(filtro);

  if (elemento) {
    id = elemento.textContent.trim();
    document.getElementById('resultadoBusqueda').textContent = 'Elemento encontrado: ' + id;
  } else {
    document.getElementById('resultadoBusqueda').textContent = 'Elemento no encontrado';
  }
}


