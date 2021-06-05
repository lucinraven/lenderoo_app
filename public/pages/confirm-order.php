<?php
include '../includes/header.php';

if(isset($_POST['daterange']) && isset($_POST['delivery-method'])){

    $user_id = $_SESSION['user_id'];

    $dateRange = explode('-',$_POST['daterange']);
    $dateDeliver = $dateRange[0];
    $dateReturn = $dateRange[1];

    $deliverMethod = $_POST['delivery-method'];

    $sql = "SELECT cart_id FROM cart WHERE cart.user_id = $user_id AND is_active=1 LIMIT 1";
    $stmt = $con->prepare($sql);
    $stmt->execute();
    $result = $stmt->get_result();
    $cart_id = $result->fetch_assoc()['cart_id'];
    echo $cart_id;

    $sql = "UPDATE cart SET is_active = 0 WHERE cart_id = ?";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("i",$cart_id);
    $stmt->execute();

    $sql = "INSERT INTO orders (cart_id,payment_method,delivery_date,return_date,address,status,total_price) VALUES (?, ? , ? , ? , 'test', 'processing', (SELECT SUM(tmp_p.price * tmp_cp.quantity) as 'total_price' FROM cart_products tmp_cp INNER JOIN product tmp_p ON tmp_p.product_id = tmp_cp.product_id WHERE tmp_cp.cart_id = ?)) ";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("isssi",$cart_id,$deliverMethod,$dateDeliver,$dateReturn,$cart_id);
    $stmt->execute();

    $order_id = $stmt->get_result();
} else {
    header("Location: /lenderoo_app/public/pages/review-checkout.php"); 
}


?>

<div class="confirm-order-page">
    <div class="container-lg">
        <div class="confirm-order-content">
            <div class="content-header">
                <h4>Your order has been confirmed</h4>
            </div>

            <div class="content-body">
                <div class="order-text">
                    <h5>Your order <span>#<?php echo $order_id; ?></span> has been processed</h5>
                    <h6>You can view your ordery history by going into your orders tab under my account page.</h6>
                    <h6>Thank you for using our website!</h6>
                </div>


                <div class="order-details">
                    <p>Ordered Date: <?php echo date("Y-m-d"); ?> </p>
                    <p>Delivery Date: <?php echo $dateDeliver; ?>  </p>
                    <p>Return Date: <?php echo $dateReturn; ?> </p>
                    <p>Delivery Method: <?php echo $deliverMethod; ?>  </p>
                </div>
            </div>

            <div class="content-footer">
                <a class="btn btn-primary" href="index.php">Browse more</a>
            </div>
        </div>
    </div>
</div>


<?php
include '../includes/footer.php';
?>