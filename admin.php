<?php include('php/header.php') ?>
<!-- End Header Area -->

<!-- Start Banner Area -->

<!-- End Banner Area -->

<!--================Cart Area =================-->
<section class="cart_area">
    <div class="container">
        <div class="cart_inner">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">AD</th>
                            <th scope="col">Status</th>
                            <th scope="col"></th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php
            $qry = "SELECT * FROM advertisement ";
             $result = $con->query($qry);
            if($result->num_rows > 0){

                while($row = $result->fetch_assoc()){

            ?>

                        <tr>
                            <td>
                                <div class="media">
                                    <div class="d-flex">
                                        <img src="img/product/<?php echo $row['ad_image']; ?>" alt="" height="100px" width="100px">
                                    </div>
                                    <div class="media-body">
                                        <h6><?php echo $row['ad_title']; ?></h6>
                                    </div>
                                </div>
                            </td>


                            <td>
                                <?php
                                    if($row['ad_approved'])
                                        echo '<span class="label label-success">Active</span>';
                                    else
                                        echo '<span class="label label-danger">Inactive</span>';
                            ?></td>

                            <td><?php
                                    if($row['ad_approved'])
                                        echo '<a href="apis/ad_add.php?sid='.$row['ad_id'].'&del=true" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>';
                                    else
                                        echo '<a href="apis/ad_add.php?sid='.$row['ad_id'].'&rev=true" class="btn btn-sm btn-success"><i class="fa fa-undo"></i></a>';
                            ?></td>


                        </tr>
                        <?php
                }
            }
?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
<!--================End Cart Area =================-->

<!-- start footer Area -->
<?php include './php/footer.php'; ?>
