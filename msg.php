<?php

if(!empty($_GET['msg']) && $_GET['msg']=="add"){
    $msg = "The user has added successfully";
}else if(!empty($_GET['msg']) && $_GET['msg']=="error"){
    $msg ="Something is wrong";
}

?>
<?php include('header.php'); ?>
 <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1><?php echo $msg; ?></h1>
                </div>
            </div>
 </div>
 </body>
</html>