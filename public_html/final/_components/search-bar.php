<?php
$search_value = '';
// If Search exist, make that the search value
if (isset($_GET['search'])) {
    $search_value = $_GET['search'];
}
?>
<form class="searchbar text-center" action="<?php echo site_url(); ?>/admin/search" method="GET">
<div class="container">
  <label for="3293"></label> 
  <input class="border-black border-2" type="text" name="search" placeholder="Searchs for Recipe" value="<?php echo $search_value; ?>">
  <input type="submit" value="Search" class="btn btn-primary">
  </div>
</form>


