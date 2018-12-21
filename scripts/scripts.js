function YNconfirm() {
  if (window.confirm('¿Estas seguro de que quieres cerrar la sesion?'))
  {
    window.location.href = 'localhost/logout.php';
  }
}