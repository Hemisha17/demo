

<?php
 include('header.php');

//include("db.php");
 
    $q ="SELECT * FROM tbl_product WHERE `product_name`='t-shirt' And `shop_for`='girl'";
    //echo $q ="SELECT DISTINCT(product_image),product_name,product_price,product_short_description,product_long_description,product_brand ,product_category_id, product_size,product_color,shop_for FROM tbl_product WHERE `product_name`='t-shirt' And `shop_for`='girl'";
 
   $q1 = mysqli_query($con,$q);

?>

    <!-- Breadcrumb Section Begin -->
    <div class="breacrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                        <a href="#"><i class="fa fa-home"></i> Home</a>
                        <span>Shop</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section Begin -->

    <!-- Product Shop Section Begin -->
    <section class="product-shop spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-8 order-2 order-lg-1 produts-sidebar-filter">
                    <h4 class="fw-title">  Filter by : </h4>  

                  
        <div class="filter-widget">
            <h4 class="fw-title">Price</h4>
                <div class="filter-range-wrap">


                
                <input type="hidden" id="hidden_min_price" value="0" />
                <input type="hidden" id="hidden_max_price" value="2000" />
                         
                             <p id="price_show">0 - 2000</p>



                            <div class="price-range ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content"
                                data-min="0" data-max="2000" id="price_range">

                                <div class="ui-slider-range ui-corner-all ui-widget-header"></div>
                                <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"></span>
                                <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"></span>
                            </div>  
                            <!-- <div id="price_range"></div>  -->
                        </div>
                       <!--  <a href="#" class="filter-btn">Filter</a> -->
                    </div>

                  
                      <div class="filter-widget">
                        <h4 class="fw-title">Color</h4>
                        <div class="fw-color-choose">
                            <div class="cs-item">
                             <input type="radio" id="cs-black" class="filter_all color" value="black" name="color">
                                <label class="cs-black" for="cs-black" class="filter_all color" value="black">Black</label>
                            </div>
                            <div class="cs-item">
                                <input type="radio" id="cs-pink" class="filter_all color" value="pink" name="color">
                                <label class="cs-pink" for="cs-pink" class="filter_all color">Pink</label>
                            </div>
                            <div class="cs-item">
                                <input type="radio" id="cs-blue" class="filter_all color" value="blue" name="color">
                                <label class="cs-blue" for="cs-blue" class="filter_all color">Blue</label>
                            </div>
                            <div class="cs-item">
                                <input type="radio" id="cs-yellow" class="filter_all color" value="yellow" name="color">
                                <label class="cs-yellow" for="cs-yellow" class="filter_all color">Yellow</label>
                            </div>
                            <div class="cs-item">
                                <input type="radio" id="cs-red" class="filter_all color" value="red" name="color">
                                <label class="cs-red" for="cs-red" class="filter_all color">Red</label>
                            </div>
                            <div class="cs-item">
                                <input type="radio" id="cs-green" class="filter_all color" value="green" name="color">
                                <label class="cs-green" for="cs-green" class="filter_all color">Green</label>
                            </div>
                            <div class="cs-item">
                                <input type="radio" id="cs-white" class="filter_all color" value="white" name="color">
                                <label class="cs-white" for="cs-white" class="filter_all color">White</label>
                            </div>
                             <div class="cs-item">
                                <input type="radio" id="cs-orange" class="filter_all color" value="orange" name="color">
                                <label class="cs-orange" for="cs-orange" class="filter_all color">Orange</label>
                            </div>
                             
                           <!--  <div class="cs-item">
                                <input type="radio" id="cs-gray" class="filter_all color" value="gray" name="color">
                                <label class="cs-gray" for="cs-gray" class="filter_all color">Gray</label>
                            </div> -->
                             

                        </div>
                    </div>
               
                       <br/><br/><br/>
             
                    

                    
             <div class="filter-widget">
                <h4 class="fw-title">Size</h4>
                <?php
                 $qu="select DISTINCT(product_size) from tbl_product order by product_size ASC";
                   $qu1=mysqli_query($con,$qu);
                   while($qu2=mysqli_fetch_array($qu1)) { ?>

                    <input type="checkbox" class="filter_all chk_size" value="<?php echo $qu2['product_size']; ?>">&nbsp;&nbsp;&nbsp;&nbsp;<label><?php echo $qu2['product_size']; ?></label><br/>

                <?php }?>
            </div>




            <div class="filter-widget">
                <h4 class="fw-title">Brand</h4>
                <?php
                 $que="select DISTINCT(product_brand) from tbl_product order by product_brand ASC";
                   $que1=mysqli_query($con,$que);
                   while($que2=mysqli_fetch_array($que1)) { ?>

                    <input type="checkbox" class="filter_all brand" value="<?php echo  $que2['product_brand']; ?>">&nbsp;&nbsp;&nbsp;&nbsp;<label><?php echo $que2['product_brand']; ?></label><br/>

                <?php }?>
            </div>
        </div>


                <div class="col-lg-9 order-1 order-lg-2" id="product_all_div">
                    <div class="product-show-option">
                        <div class="row">


                            <div class="col-lg-7 col-md-7">

                                <div class="select-option">
                                  <!-- <span style="padding-right: 10px;font-size: 20px;">Sort by </span> -->
                                    <select  class="form-control" id="sortmenu">
                                        <option>Default Sorting</option>
                                         <option value="newest">Newest</option>
                                        <option value="product_name">Product Name</option> 
                                        <option value="h2l">Price ( High to Low ) </option>
                                        <option value="l2h">Price ( Low to High )</option>
                                    </select>
<!-- 
                                    <select class="p-show">
                                        <option value="">Show:</option>
                                    </select> -->

                                   
                                </div>
                            </div>
                            <div class="col-lg-5 col-md-5">
                               <input type="text" placeholder="Search here..." id="search" style="height: 40px;width:350px;border-radius: 3px;padding-left: 10px;">
                            </div> 
                        </div>
                    </div>



                    <div class="product-list">
                        <div class="row" id="filter_data_display">
 
                     <?php while($q2=mysqli_fetch_array($q1)) { ?>

                       <!--  <div class="grid-item"> -->
                            <div class="col-lg-4 col-sm-6">
                                <div class="product-item">

                                    <div class="pi-pic">
                                        <img src="img/products/wear/<?php echo $q2['product_image']; ?>" alt="">
                                       <!--  <div class="sale pp-sale">Sale</div> -->
                                        <div class="icon">
                                             <a href="product.php?product_id=<?php echo $q2['product_id'];?>" style="color: black;">
                                            <i class="icon_heart_alt" title="Add to Wishlist"></i>
                                          </a>
                                        </div>
                                        <ul>
                                            <li class="w-icon active">
                                                <a href="product.php?product_id=<?php echo $q2['product_id'];?>">
                                                    <i class="icon_bag_alt" title="Add to Cart"></i>
                                                </a>
                                            </li>

                                            <li class="quick-view">
                                                <a href="product.php?product_id=<?php echo $q2['product_id'];?>">+ Quick View</a>
                                            </li>

                                            <li class="w-icon">
                                                <a href="product.php?product_id=<?php echo $q2['product_id'];?>">
                                                    <i class="fa fa-random"></i>
                                                </a>
                                            </li>

                                        </ul>
                                    </div>

                                    <div class="pi-text">
                                       <!--  <div class="catagory-name">Towel</div> -->
                                        <a href="#">
                                            <h5>
                                            <?php echo $q2['product_short_description']; ?>        
                                            </h5>
                                        </a>
                                        <div class="product-price">
                                            Rs.<?php echo $q2['product_price']; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <!--  </div> -->
                          <?php } ?> 


                        </div>
                    </div>

                </div>

            </div>
        </div>
    </section>
    <!-- Product Shop Section End -->

   <?php
     include('footer.php');
   ?>

