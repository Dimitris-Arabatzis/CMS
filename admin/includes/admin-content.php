<div class="container-fluid">
    <?php if($session->is_signed_in()){
    $signed_in_user_id=$session->user_id;
    $signed_in_user=User::find_by_id($signed_in_user_id);
}



//    $usher = User::find_user_by_id(20);
//    $usher->password=123;
//    $usher->save();

//    $usher = new User();
//    $usher->username = "NEW USERS";
//    $usher->password = "123";
//    $usher->first_name = "Estudiante";
//    $usher->last_name = "Comemos";
//    $usher->create();

//    $usher = User::find_user_by_id(22);
//    $usher->first_name="CHAAAOOOs";
//    $usher->update();

//    $users =User::find_all();
//    foreach($users as $user){
//        echo $user->username;
//    }

//    $photos =Photo::find_all();
//    foreach($photos as $photo){
//        echo $photo->title;
//    }

//    $photo = new Photo();
//    $photo->title = "mommyy";
//    $photo->description = "some test";
//    $photo->filename = "some test";
//    $photo->type = "image";
//    $photo->size = 11;
//    $photo->create();
    //print_r($_FILES['uploaded_file']);



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
