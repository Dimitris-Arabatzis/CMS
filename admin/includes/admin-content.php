<div class="container-fluid">
    <?php if($session->is_signed_in()){
    $signed_in_user_id=$session->user_id;
    $signed_in_user=User::find_user_by_id($signed_in_user_id);
}

    ?>
    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Blank Page
                <small><?php echo $signed_in_user->username?></small>
            </h1>




            <ol class="breadcrumb">
                <li>
                    <i class="fa fa-dashboard"></i> <a href="index.html">Dashboard</a>
                </li>
                <li class="active">
                    <i class="fa fa-file"></i> Blank Page
                </li>
            </ol>
        </div>
    </div>
    <!-- /.row -->

</div>
<!-- /.container-fluid -->
