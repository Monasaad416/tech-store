    <?php require_once("inc/header.php"); ?>
    <?php

    use Techstore\Classes\Models\Order;
    use Techstore\Classes\Models\Order_details;

    if ($request->get_has("id")) {
      $id = $request->get("id");
    }

    $ord = new Order;
    $order = $ord->select_id($id, "orders.* ,SUM(qty*price) AS total");

    $det = new Order_details;
    $details = $det->select_with_products($id);
    ?>

    <div class="container py-5">
      <div class="row">

        <div class="col-md-6 offset-md-3">
          <h3 class="mb-3">Show Order :</h3>
          <div class="card">
            <div class="card-body p-5">
              <table class="table table-bordered">
                <thead>
                  <th colspan="2" class="text-center">Customer</th>
                </thead>
                <tbody>
                  <tr>
                    <th scope="row">Name</th>
                    <td><?= $order['name'] ?></td>
                  </tr>
                  <tr>
                    <th scope="row">Email</th>
                    <td><?= $order['email'] ?? "..." ?></< /td>
                  </tr>
                  <tr>
                    <th scope="row">Phone</th>
                    <td><?= $order['phone'] ?></< /td>
                  </tr>
                  <tr>
                    <th scope="row">Address</th>
                    <td><?= $order['address'] ?? "..." ?></< /td>
                  </tr>
                  <tr>
                    <th scope="row">Time</th>
                    <td><?= date("d M,Y:ina", strtotime($order['created_at'])); ?></td>
                  </tr>
                  <tr>
                    <th scope="row">Status</th>
                    <td><?= $order['status']; ?></td>
                  </tr>
                </tbody>
              </table>

              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th>Product name</th>
                    <th>Quantity</th>
                    <th>Price</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($details as $item) : ?>
                    <tr>
                      <td><?= $item['name'] ?></td>
                      <td><?= $item['qty'] ?></td>
                      <td>$<?= $item['price'] ?></td>
                    </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>

              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th>Total</th>
                    <?php if ($order['status'] == 'pending') : ?>
                      <th>Change Status</th>
                    <?php endif; ?>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>$<?= $order['total'] ?></td>
                    <?php if ($order['status'] == 'pending') : ?>
                      <td>
                        <a class="btn btn-success" href="<?= AURL . "handlers/aprove_order.php?id=" . $order['id']; ?>">Approve</a>
                        <a class="btn btn-danger" href="<?= AURL . "handlers/cancle_order.php?id=" . $order['id']; ?>">Cancel</a>
                      </td>
                    <?php endif; ?>

                  </tr>
                </tbody>
              </table>

              <a class="btn btn-dark" href="<?= AURL . "orders.php"; ?>">Back</a>
            </div>
          </div>
        </div>

      </div>
    </div>
    <?php require_once("inc/footer.php"); ?>