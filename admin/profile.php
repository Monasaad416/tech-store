    <?php require_once("inc/header.php"); ?>

    <div class="container py-5">
      <div class="row">

        <div class="col-md-6 offset-md-3">
          <h3 class="mb-3">Edit Profile</h3>
          <div class="card">
            <div class="card-body p-5">
              <form method="POST" action="<?= AURL; ?>handlers/handle_profile.php ?>">
                <div class="form-group">
                  <label>Name</label>
                  <input type="text" name="name" class="form-control">
                </div>

                <div class="form-group">
                  <label>Email</label>
                  <input type="email" name="email" class="form-control">
                </div>

                <div class="form-group">
                  <label>Password</label>
                  <input type="password" name="password" class="form-control">
                </div>

                <div class="form-group">
                  <label>Confrim Password</label>
                  <input type="password" name="confirm_password" class="form-control">
                </div>

                <div class="text-center mt-5">
                  <button type="submit" name="submit" value="submit" class="btn btn-primary">Submit</button>
                  <a class="btn btn-dark" href="<?=AURL;?>">Back</a>
                </div>
              </form>
            </div>
          </div>
        </div>

      </div>
    </div>
    <?php require_once("inc/footer.php"); ?>