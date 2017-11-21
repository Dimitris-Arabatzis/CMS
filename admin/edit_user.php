<?php include("includes/header.php"); ?>
<?php if(!$session->is_signed_in()){redirect("login.php");} ?>
<?php
if(empty($_GET['id'])){
    redirect("users.php");
}else{
$user=User::find_by_id($_GET['id']);
    if(isset($_POST['submit'])){

        if($user){
            $user->username=$_POST['username'];
            $user->first_name=$_POST['first_name'];
            $user->last_name=$_POST['last_name'];
            $user->password=$_POST['password'];

            if(empty($_FILES['user_image'])){
                $user->save();
            }else{
                $user->set_file($_FILES['user_image']);

                $user->upload_photo();
                $user->save();
            }

        }
        redirect("users.php");
    }
}









?>
<!-- Navigation -->
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
        <a class="navbar-brand" href="index.html">SB Admin</a>
    </div>


    <?php include "includes/top-nav.php";?>
    <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
    <?php include "includes/side-nav.php";?>
    <!-- /.navbar-collapse -->
</nav>



<div id="page-wrapper">

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    users
                    <small>Subheading</small>
                </h1>
                <div class="col-md-6">
                       <div class="col-md-6 col-md-offset-3">
                        <img class="img-responsive thumbnail" src="<?php echo $user->image_path_and_placeholder(); ?>" alt="">
                        </div>
                    </div>
                <form action="" method="post" enctype="multipart/form-data">

                    <div class="col-md-6">

                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" name="username" class="form-control" value="<?php echo $user->username;?>">

                        </div>

                        <div class="form-group">

                            <input type="file" name="user_image">

                        </div>


                        <div class="form-group">
                            <label for="first_name">First Name</label>
                            <input type="text" name="first_name" class="form-control" value="<?php echo $user->first_name;?>">

                        </div>

                        <div class="form-group">
                            <label for="last_name">Last Name</label>
                            <input type="text" name="last_name" class="form-control" value="<?php echo $user->last_name;?>">

                        </div>

                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" name="password" class="form-control" value="<?php echo $user->password;?>">

                        </div>
                        <div class="form-group">
                            <input class="btn btn-primary pull-right" type="submit" name="submit" id="" value="Update">
                        </div>
                        <div class="form-group">
                            <a href="delete_user.php?id=<?php echo $user->id;?>" class="btn btn-danger pull-left">Delete</a>
                        </div>
                    </div>

                </form>

            </div>
        </div>
        <!-- /.row -->

    </div>
    <!-- /.container-fluid -->


</div>
<!-- /#page-wrapper -->

<?php include("includes/footer.php"); ?>
