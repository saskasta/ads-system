<?php 

      include('header.php'); 
      if(empty($_SESSION['Id'])){
          header("Location : home.php");
          die();
      }
      $myAds = $ads->getByUserId($_SESSION['Id']);
     
?>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>Create New Ad</h1>
                </div>
            </div>
            <div class="row">
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">New Ad</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="php/function.php" enctype="multipart/form-data">
                        <input type="hidden" name="user_id" value="<?php echo $_SESSION['Id']; ?>">
                        <div class="form-group">
                            <label for="title" class="col-md-4 control-label">Title</label>

                            <div class="col-md-7">
                                <input id="title" type="text" class="form-control" name="title" required autofocus>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="desc" class="col-md-4 control-label">Description</label>
                            <div class="col-md-7">
                                <textarea id="desc"  class="form-control" name="desc" required></textarea>
                            </div>
                        </div>
                         <div class="form-group">
                               <label for="photo" class="col-md-4 control-label"> Photograph (.png, .jpg): </label>
                               <div class="col-md-7">
                                    <input id="photo" type="file" name="photo" accept='.png, .jpg, .jpeg'>                               
                               </div>  
                        </div>  
                        

                        <div class="form-group">
                            <div class="col-md-7 col-md-offset-4">
                                <button type="submit" class="btn btn-primary" name="new_ad" value="Yes">
                                    Save
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
                <div class="col-md-6">
                    <h3>My Ads</h3>
                    <?php foreach($myAds as $ad): ?>
                    <div class="row">
                        <div class="col-md-12">
                            <h4><?php echo $ad['title']; ?></h4>
                        </div>
                        <div class="col-md-3">
                            <img src="imgs/<?php echo $ad['photo']; ?>" class="img-responsive"/>
                        </div>
                        <div class="col-md-8">
                            <p><?php echo substr($ad['desc'], 0, 250); ?><br><a href="show-ad.php?ad=<?php echo $ad['id']; ?>">read more...</a></p>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
    </div>
        </div>
    </body>
</html>