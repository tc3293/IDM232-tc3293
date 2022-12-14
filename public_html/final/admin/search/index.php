<?php
include_once __DIR__ . '/../../app.php';
$page_title = 'Services';
include_once __DIR__ . '/../../_components/header.php';

$recipes = get_recipes();
include_once __DIR__ . '/../../_components/adminabar.php';

// Check if search exist in query
if (isset($_GET['search'])) {
    $search = $_GET['search'];
} else {
    $search = '';
}

$query = 'SELECT *';
$query .= ' FROM recipes';
$query .= " WHERE recipe_title LIKE '%{$search}%'";
$query .= " OR ingredients LIKE '%{$search}%'";
$query .= " OR instructions LIKE '%{$search}%'";
$results = mysqli_query($db_connection, $query);

// Check if was have more than 0 results from db
if ($results->num_rows > 0) {
    $recipe_results = true;
} else {
    $recipe_results = false;
}

?>

<br><br><br><br>
<div class="mx-auto my-16 max-w-7xl px-4">
  <div class="px-4 sm:px-6 lg:px-8">
    <div class="sm:flex sm:items-center">
      <div class="sm:flex-auto">
        <h1 class="text-xl font-semibold text-gray-900">Search Results</h1>
        <h2>You searched for "<?php echo $search; ?>"</h2>
        <?php
        // If no results, echo no results
        if (!$recipe_results) {
            echo '<p>No results found, make sure type correct name</p>';
        }
?>
        <?php
// If error query param exist, show error message
  if (isset($_GET['error'])) {
      echo '<p class="text-red-500">' . $_GET['error'] . '</p>';
  }?>
      </div>
    </div>

    <?php
    // If we have results, show them
      if ($recipe_results) {
          while ($recipe_results = mysqli_fetch_assoc($results)) {
              echo '<div class="flex flex-row justify-center items-center">';
              echo 
              
              
              '<div class="small-box-recipes">' 
              
              

              . '<a class="box-recipes-link" href="' . site_url() . '/recipe-detail.php?id=' . $recipe_results['id'] . '">'
              
              . '<div class="box-image-text">'

              . '<img src="' . site_url() . $recipe_results['image_path'] . '" class="my-images" alt="...">'

              . '<h4 class="text-center">' . $recipe_results['recipe_title'] . 
              
              '</h4>' . 

              '</div>' .

              '</a>' .
              
              '</div>';
              // echo '<h2>' . $recipes_results['recipe_title'] . ' ' . $recipes_results['ingredients'] . ' ' . $recipes_results['steps'] . '</h2>';
              echo '</div>';
          }
      }
?>

  </div>
</div>



<?php include_once __DIR__ . '/../../_components/footer.php';
?>