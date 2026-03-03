<div class="d-flex flex-wrap flex-column justify-content-between h-100">
<div>
<?php
require_once('../includes/config.php');
require_once(ROOT_PATH . 'core/init.php');
include(ROOT_PATH .'includes/header.php');
include(ROOT_PATH .'model/database.php');
include(ROOT_PATH .'model/accountsDB.php');
?>
<div class="container mt-5 mb-5">
  <div class="text-center mt-4 mb-4">
    <h1 class="f-4">Sobre Nosotros</h1>
    <p>En <strong>Aurora Collection</strong> creemos que cada joya cuenta una historia. Desde nuestros inicios, nos hemos dedicado a crear piezas únicas que expresen elegancia, fuerza y belleza. Nuestro compromiso con la calidad y el diseño nos ha convertido en una referencia de estilo en el mundo de la joyería artesanal.</p>
  </div>
</div>

<div class="intro">
  <div class="row align-items-center">
    <!-- Imagen -->
    <div class="col-md-6">
      <img src="<?php echo BASEURL; ?>images/logojoyeria.jpeg" alt="Sobre Nosotros - Aurora Collection" class="img-fluid rounded shadow">
    </div>
    <!-- Texto -->
    <div class="col-md-6 p-5">
      <h3>Nuestra Historia</h3>
      <p>Desde nuestro estudio creativo, diseñamos joyas de alta gama hechas a mano con dedicación y precisión. Supervisamos cada paso del proceso, desde el boceto inicial hasta la pieza terminada, garantizando un producto final que cumpla con los más altos estándares.</p>
      <p>Cada joya de <strong>Aurora Collection</strong> es una fusión de arte, pasión y elegancia. Trabajamos con un equipo de joyeros expertos, enfocados en los detalles y comprometidos con la excelencia. Nos inspira crear joyas que acompañen tus momentos más importantes.</p>
      <p>Gracias a nuestra trayectoria, nuestras colecciones han llegado a personas de todo el mundo que buscan algo más que un accesorio: buscan una joya con alma. Y eso es lo que ofrecemos: piezas que brillan por dentro y por fuera.</p>
    </div>
  </div>
</div>

<?php include(ROOT_PATH . 'includes/footer.php'); ?>
</div>
</div>