<?php

if(isset($_POST['delete'])){
    unlink("upload/".$_POST['nomImg']);

}

if(isset($_POST['submit'])){
    if(count($_FILES['upload']['name']) > 0){
        //Loop through each file
        for($i=0; $i<count($_FILES['upload']['name']); $i++) {
            //Get the temp file path
            $tmpFilePath = $_FILES['upload']['tmp_name'][$i];

                //save the filename
                $shortname = $_FILES['upload']['name'][$i];

                //save the url and the file
                $filePath = "upload/" .'image'.$i.$shortname;

                //Upload the file into the temp dir
                move_uploaded_file($tmpFilePath, $filePath);

        }
    }
}
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="Page Description">
    <meta name="author" content="sylvain">
    <title>Page Title</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">


    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<h1>Quete Files</h1>



<form action="" enctype="multipart/form-data" method="post">

    <div>
        <input id='upload' name="upload[]" type="file" multiple="multiple" value="Upload"/>
        <input type="submit" name="submit" value="Submit">
    </div>

</form>


<?php
$dir    = "upload/";
$files = array_diff(scandir($dir), array('..', '.'));
?>

<?php foreach($files as $key=>$value): ?>
<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
    <div class="thumbnail">
        <img src="upload/<?php echo $value; ?>" alt="">
        <div class="caption">
            <h3><?php echo $value; ?></h3>


            <form method="post" action="">
                <input type="hidden" value="<?php echo $value; ?>" name="nomImg">
                <input type="submit" class="btn-danger" name="delete" value="Delete" />
            </form>


        </div>
    </div>
</div>
<?php endforeach; ?>


</body>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.min.js"></script>

</html>
