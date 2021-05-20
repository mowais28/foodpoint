<div class="col-md-12">
    <div class="row">
        <div class="order">
            <h2><i class="fa fa-shopping-cart"></i> Get your Favorite Item</h2>
            <hr class="heading_line">
            <div class="food_items">
                <?php
                $query = "SELECT * FROM fp_items";
                $exec = mysqli_query($connect, $query);
                while ($data = mysqli_fetch_assoc($exec)) {
                    echo '
                            <div class="card float-left" style="width: 18rem;">
                            <img class="card-img-top" src="./admin/Item_images/' . $data['Img'] . '" alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title">' . $data['Item_Title'] . '</h5>
                                <p>Rs.' . $data['Price'] . ' <span class="float-right">Total Orders <i class="fa fa-angle-right"></i> ' . $data['Total_Orders'] . '</span></p>
                                <a href="order_form.php?name=' . $data['Item_Title'] . '&id=' . $data['ID'] . '"><button class="btn btn-warning text-white"><i class="fa fa-shopping-cart"></i> Get Now</button></a>
                            </div>
                        </div>
                        ';
                }
                ?>
            </div>
        </div>
    </div>
</div>