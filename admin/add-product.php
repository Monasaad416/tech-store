    <?php require_once("inc/header.php"); ?>
    <?php

    use Techstore\Classes\Models\Cat;

    $c = new Cat;
    $cats = $c->select_all("id,name");
    ?>

    <div class="container py-5">
        <div class="row">

            <div class="col-md-6 offset-md-3">
                <h3 class="mb-3">Add Product</h3>
                <div class="card">
                    <div class="card-body p-5">
                        <!-- display errors if exist -->
                        <?php include(APATH . "inc/errors.php");?>
                        <form method="POST" action="<?=AURL;?>handlers/add_product.php" enctype="multipart/form-data">
                            <div class="form-group">
                                <label>Name</label> 
                                <input type="text" name="name" class="form-control">
                            </div>

                            <div class="form-group">
                                <label>Category</label>
                                <select class="form-control" name="cat_id">
                                    <?php foreach ($cats as $cat) : ?>
                                        <option value="<?= $cat['id']; ?>"><?= $cat['name']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>


                            <div class="form-group">
                                <label>Price</label>
                                <input type="number" name="price" class="form-control">
                            </div>

                            <div class="form-group">
                                <label>Pieces</label>
                                <input type="number" name="pieces" class="form-control">
                            </div>

                            <div class="form-group">
                                <label>Description</label>
                                <textarea name="desc" class="form-control" rows="3"></textarea>
                            </div>

                            <div class="custom-file">
                                <input type="file" name="img" class="custom-file-input" id="customFile">
                                <label class="custom-file-label" for="customFile">Choose Image</label>
                            </div>

                            <div class="text-center mt-5">
                                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                                <a class="btn btn-dark" href="#">Back</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <?php require_once("inc/footer.php"); ?>