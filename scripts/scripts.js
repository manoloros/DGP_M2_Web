function YNconfirm() {
  if (window.confirm('¿Estas seguro de que quieres cerrar la sesion?'))
  {
    window.location.href = 'localhost/logout.php';
  }
}

function confirma_borrado_ruta() {
  if (window.confirm('Confirma que quieres borrar la ruta'))
  {
    window.location.href = 'localhost/gestionRutas.php';
  }
}

function confirma_borrado_parada() {
  if (window.confirm('Confirma que quieres borrar la parada'))
  {
    window.location.href = 'localhost/gestionLugares.php';
  }
}