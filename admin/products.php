<?php require_once("inc/header.php"); ?>

<?php

use Techstore\Classes\Models\Product;

$pr = new Product;
$prods = $pr->select_all_prodcats("products.id AS prod_id ,products.name AS prod_name,cats.name AS cat_name ,img,pieces_no,price,products.created_at AS prod_created_at");

?>
<div class="container-fluid py-5">
  <div class="row">

    <div class="col-md-10 offset-md-1">

      <div class="d-flex justify-content-between align-items-center mb-3">
        <h3>All Products</h3>
        <a href="<?= AURL; ?>add-product.php" class="btn btn-success">
          Add new
        </a>
      </div>

      <table class="table table-hover">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Category</th>
            <th scope="col">Image</th>
            <th scope="col">Pieces</th>
            <th scope="col">Price</th>
            <th scope="col">Created At</th>
            <th scope="col">Actions</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($prods as $index => $prod) : ?>
            <tr>
              <th scope="row"><?= $index + 1; ?></th>
              <td><?= $prod['prod_name']; ?></td>
              <td><?= $prod['cat_name']; ?></td>
              <td>
                <img src="<?= URL . "uploads/" . $prod['img']; ?>" width="50px" height="50px" alt="<?= $prod['prod_name']; ?>">
              </td>
              <td><?= $prod['pieces_no']; ?></td>
              <td>$<?= $prod['price']; ?></td>
              <td><?= date("d M,Y h:i a", strtotime($prod['prod_created_at'])); ?></td>
              <td>
                <a class="btn btn-sm btn-info" href="<?= AURL."edit-product.php?id=" . $prod['prod_id'];?>">
                  <i class="fas fa-edit"></i>
                </a>
                <a class="btn btn-sm btn-danger" href="<?= AURL; ?>handlers/delete_product.php?id= <?=$prod['prod_id']; ?>">
                  <i class="fas fa-trash"></i>
                </a>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>

  </div>
</div>
<?php require_once("inc/footer.php"); ?>