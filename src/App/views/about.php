<?php include_once $headerPartial;?>

<!-- Start Main Content Area -->
<section class="container mx-auto mt-12 p-4 bg-white shadow-md border border-gray-200 rounded">
  <!-- Page Title -->
  <h3>About Page</h3>

  <hr />

  <!-- Escaping Data -->
  <p>Escaping Data:                    <?php echo e($dangerousData); ?></p>
</section>
<!-- End Main Content Area -->

<?php include_once $footerPartial;?>
