function abrirModal() {
  var modal = document.getElementById("modal");
  modal.style.display = "block";
  cargarContenidoModal();
}

function cerrarModal() {
  var modal = document.getElementById("modal");
  modal.style.display = "none";
}

function cargarContenidoModal(idProducto) {
  var modalContent = document.querySelector(".modal-content");
  var xhr = new XMLHttpRequest();
  xhr.onreadystatechange = function () {
    if (xhr.readyState === 4 && xhr.status === 200) {
      modalContent.innerHTML = xhr.responseText;
    }
  };
  xhr.open("GET", "modificar_producto.php?id=" + idProducto, true);
  xhr.send();
}
