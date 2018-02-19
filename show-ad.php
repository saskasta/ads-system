<?php 
include('header.php'); 

if(isset($_GET['ad'])){
    $adId = $_GET['ad'];
    $ad = $ads->getById($adId);
    
    
}else{
     header("Location: home.php");
     die();
}

?>


<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>View Ad</h1>
        </div>
        <div class="col-md-8" col-md-offset-2>
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <h3><?php echo $ad['title']; ?></h3>
                </div>
               
               
                <div class='col-md-10 col-md-offset-1'>
                    <?php echo $ad['desc']; ?>
                </div> 
                <div class="col-md-5 col-md-offset-1">
                     <img src="imgs/<?php echo $ad['photo']; ?>" class="img-responsive"/>
                </div>
                <div class='col-md-4 col-md-offset-1'>
                    
                    <table class="table table-striped">
                        <tr><th colspan='2'>  Author: </th></tr>
                        <tr><th>Name: </th><td><?php echo $ad['name']; ?></td></tr>
                        <tr><th>Phone: </th><td><?php echo $ad['phone']; ?></td></tr>
                        <tr><th>Email: </th><td> <?php echo $ad['email']; ?></td></tr>
                    </table>
              
                </div>
            </div>
            
        </div>
    </div>
    
</div>

</div>
</body>
</html>