<?php
echo "<pre>";
print_r($_FILES['file']);
echo "</pre>";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>


   <form action="" method="post" enctype="multipart/form-data">
       <input type="file" name="file"><br>
       <input type="submit" name="submit">
   </form>

</body>
</html>
