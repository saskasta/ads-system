<?php include_once(dirname(__FILE__)."\php\db.php"); ?>
<!DOCTYPE html>

<html>
    <head>
        <title>Ads system</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="bootstrap/bootstrap.css" type="text/css">
        
        <script src="jquery/jquery-1.11.3.min.js"></script>
        <script src="bootstrap/bootstrap.min.js"></script>
    </head>
    <body>
        <header>
            <nav class="navbar navbar-default navbar-static-top" role="navigation" id="navbar">
                <div class="container">
                    <div class="navbar-header">
                            <a class="navbar-brand" href="home.php">Ads system</a>
                    </div>
                     <ul class="nav navbar-nav navbar-right"> 
                        <?php if(!empty($_SESSION['Id'])): ?> 
                         <li><a>Welcome, <?php echo $_SESSION['user_name']; ?></a></li>
                         <li><a href="create-ad.php">New Add</a></li>
                         <li><a href="php/logout.php">Log out</a></li>
                        <?php else: ?> 
                         <li><a href="login.php">Log in</a></li>
                         <li><a href="register.php">Register</a></li>
                        <?php endif; ?>  
                     </ul>
                </div>
            </nav>
                
            
        </header>