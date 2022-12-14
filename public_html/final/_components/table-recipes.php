<?php
if (!isset($recipes)) {
    echo '$recipes variable is not defined. Please check the code.';
}
?>
<div class="my-table">
<table class="table text-white">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Title</th>
      <th scope="col">Images</th>
      <th scope="col">
        <span class="sr-only">Setting</span>
      </th>
    </tr>
  </thead>
  <tbody>
    <?php
    // Cant combine functions with string so we have to assign the function to a variable here.
    $site_url = site_url();
    while ($recipe = mysqli_fetch_array($recipes)) {
        echo "
          <tr>
            <td>{$recipe['id']}</td>
            <td>{$recipe['recipe_title']}</td>
            <td><img src='{$site_url}{$recipe['image_path']}' alt=''></td>
            
            <td>
              <a href='{$site_url}/admin/recipes/edit.php?id={$recipe['id']}'>Edit</a>
              <a href='{$site_url}/admin/recipes/delete.php?id={$recipe['id']}'>Delete</a>
            </td>
          </tr>";
    }
    ?>
  </tbody>
</table>
  </div>