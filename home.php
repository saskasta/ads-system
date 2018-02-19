<?php 

include('header.php'); 
$allAds = $ads->all();

?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Home - Ads</h1>
        </div>
    </div>
    <?php foreach($allAds as $ad): ?>
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <h2><?php echo $ad['title']; ?></h2>
        </div>
        <div class="col-md-3 col-md-offset-1">
            <img src="imgs/<?php echo $ad['photo']; ?>" class="img-responsive"/>
        </div>
        <div class="col-md-7">
            <p><?php echo substr($ad['desc'], 0, 250); ?><br><a href="show-ad.php?ad=<?php echo $ad['id']; ?>">read more...</a></p>
        </div>
    </div>
    <?php endforeach; ?>
</div>

 </div>
    </body>
</html>