<?php include("views/partials/header.php"); ?>

<section class="order_details section_gap">
    <div class="container">
     
        <div class="row order_d_inner">
            <div class="col-lg-4">
                <div class="details_item">
                    <h4>Order Info</h4>
                    <ul class="list">
                        <li><span>Order number</span> : <?= htmlspecialchars($order['order_id']) ?></li> <!-- Changed from order_id to id -->
                        <li><span>Date</span> : <?= htmlspecialchars($order['created_at']) ?></li>
                        <li><span>Total</span> : USD <?= number_format($order['order_total'], 2) ?></li>
                        <li><span>Payment method</span> : <?= htmlspecialchars($order['payment_status']) ?></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="details_item">
                    <h4>Customer Info</h4>
                    <ul class="list">
                    <li><span>Name</span> : <?= htmlspecialchars($order['first_name']) ?></li>
                    <li><span>Email</span> : <?= htmlspecialchars($order['email']) ?></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="details_item">
                    <h4>Shipping Address</h4>
                    <ul class="list">
                        <li><span>Address</span> : <?= htmlspecialchars($order['shipping_address']) ?></li>
                        <li><span>City</span> : <?= htmlspecialchars($order['city']) ?></li>
                        <li><span>Country</span> : <?= htmlspecialchars($order['country']) ?></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="order_details_table">
            <h2>Order Details</h2>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Product</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($items as $item): ?>
                        <tr>
                            <td>
                                <p><?= htmlspecialchars($item['name']) ?></p>
                            </td>
                            <td>
                                <h5>x <?= htmlspecialchars($item['quantity']) ?></h5>
                            </td>
                            <td>
                                <p>$<?= number_format($item['quantity'] * $item['price'], 2) ?></p>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                        <tr>
                            <td><h4>Total</h4></td>
                            <td></td>
                            <td><p>$<?= number_format($order['order_total'], 2) ?></p></td>
                        </tr>
                        <tr>
                           
                            <td>   <h3 class="title_confirmation">Thank you. Your order has been received.</h3></td>
                            <td>   <a class="primary-btn" href="/"> Confirm Order</a></td>
                            <td>   <a class="primary-btn" href="/cart"> Proceed to checkout</a></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
</section>

<?php include("views/partials/footer.php"); ?>
