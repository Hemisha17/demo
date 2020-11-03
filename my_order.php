
<?php
  include('header.php');
$customer_id=$_SESSION['customer_data']['customer_id'];
  $q="select * from tbl_order join tbl_product on tbl_order.order_product_id=tbl_product.product_id join tbl_cart on tbl_cart.cart_id=tbl_order.order_cart_id where tbl_order.`order_customer_id`='$customer_id'";
  $q1=mysqli_query($con,$q);


?>
<br/><br/><br/>
<table class="table table-hover">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Product Image</th>
      <th scope="col">Product Name</th>
      <th scope="col">Product Price</th>
      <th scope="col">Quantity</th>
      <th scope="col">Total Amount</th>
      <th scope="col">Order Date</th>
      <th scope="col">Cancel Order</th>
    </tr>
  </thead>
  <tbody>
    <?php while($q2=mysqli_fetch_array($q1)) {?>
    <tr>
      <th><?php echo $q2['fullname']; ?></th>
      <td><?php echo $q2['email']; ?></td>
      <td><img src="img/products/wear/<?php echo $q2['product_image']; ?>" height="100px" width="100px"></td>
      <td><?php echo $q2['product_short_description']; ?></td>
      <td><?php echo $q2['product_price']; ?></td>
      <td><?php echo $q2['cart_qty']; ?></td>
      <td><?php echo $q2['order_total_amount']; ?></td>
      <td><?php echo $q2['order_date']; ?></td>
      <td><a href="#" class="btn btn-primary" role="button" aria-disabled="true">Cancel</a></td>
    </tr>
    <?php } ?>
  </tbody>
</table>