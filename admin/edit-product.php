<?php require_once("inc/header.php"); ?>
<?php

use Techstore\Classes\Models\Product;
use Techstore\Classes\Models\Cat;

if ($request->get_has('id')) {
    $id = $request->get('id');
} else {
    $id = 1;
}
$pr = new Product;
$prod = $pr->select_id($id , " products.name AS pname,`desc`,cats.name AS cname ,img,pieces_no,price,cat_id");
print_r($prod); 
isset($prod['prod_name']) ;

//get getegories


$c = new Cat;
$cats = $c->select_all("id,name");
?>

<div class="container py-5">
    <div class="row">

        <div class="col-md-6 offset-md-3">
            <!-- <h3 class="mb-3 ">Edit Product : <?= $prod['pname']; ?></h3> -->
            <div class="card">
                <div class="card-body p-5">
                    <form method="POST" action="<?= AURL ?>handlers/edit_product.php" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="<?= $id; ?>">
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="name" value="<?= $prod['pname']; ?>" class="form-control">
                        </div>

                        <div class="form-group">
                            <label>Category</label>
                            <select name="cat_id" class="form-control">
                                <?php foreach ($cats as $cat) : ?>
                                    <option name="cat_id" value="<?= $cat['id']; ?>" <?php if ($cat['id'] == $prod['cat_id']) {echo "selected";} ?>>
                                        <?= $cat['name']; ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>


                        <div class="form-group">
                            <label>Price</label>
                            <input type="number" name="price" value="<?= $prod['price']; ?>" class="form-control">
                        </div>

                        <div class="form-group">
                            <label>Pieces</label>
                            <input type="number" name="pieces" value="<?= $prod['pieces_no']; ?>" class="form-control">
                        </div>

                        <div class="form-group ">
                            <label>Description</label>
                            <textarea name="desc" class="form-control text-left" rows="3">
                                <?= $prod['desc']; ?>
                            </textarea>
                        </div>
                        <div class="d-flex justify-content-center my-3">
                            <img src="<?= URL . "uploads/" . $prod['img']; ?>" height="100px" alt="">
                        </div>

                        <div class="custom-file">
                            <input name="file" type="file" class="custom-file-input" id="customFile">
                            <label class="custom-file-label" for="customFile">Choose Image</label>
                        </div>

                        <div class="text-center mt-5">
                            <button type="submit" name="submit" value="submit" class="btn btn-primary">Submit</button>
                            <a class="btn btn-dark" href="#">Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>
<?php require_once("inc/footer.php"); ?>