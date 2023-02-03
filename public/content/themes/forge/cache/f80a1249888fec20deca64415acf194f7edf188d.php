<nav class="navbar navbar-expand-lg">

      

      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">

            <?php echo wp_forge()->menu->render('location_header', function($item) {
                // dump($item);
                return sprintf('
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="%s">%s</a>
                    </li>
                    ',
                    $item->url,
                    $item->title,
                );
            }); ?>

      </div>

  </nav><?php /**PATH /var/www/html/forge/public/content/themes/forge/templates/partials/navbar.blade.php ENDPATH**/ ?>