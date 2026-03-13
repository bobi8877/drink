<!DOCTYPE html>
<?php require_once("asset.php"); ?>
<?php
$mess="";
if(isset($_SESSION['mess'])){
    $mess=$_SESSION['mess'];
}

?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>Drinks</h1>
    </header>
    <?php require_once("_nav.php"); ?>
    <main id="about">
        <div class="content-section">
            <div class="text-box">
                <h2>About Us</h2>
                <p>
                    Welcome to our cocktail community — a place dedicated to the art 
                    of alcoholic drinks. From timeless classics to modern creations, 
                    this website is built for cocktail enthusiasts who enjoy mixing, 
                    tasting, and sharing their favorite beverages. <br>You can find interesting thing and can also share your tips for Cocktails & Spirit Selections, Just go to the register page and register!
                </p>
                <p>
                    While our main focus is alcoholic cocktails, we also feature a 
                    selection of delicious non-alcoholic drinks so everyone can find 
                    something they enjoy.
                </p>
            </div>

        <div class="content-section">

            <div class="text-box">
                <h2>Create & Share Drink Recipes</h2>
                <p>
                    Registered users can share their own cocktail recipes with the 
                    community. Add ingredients, preparation steps, and upload an image 
                    to showcase your creation
                </p>
                <p>
                    Whether it’s a classic mix, a signature house cocktail, or a 
                    creative twist on a favorite drink, this platform allows you to 
                    contribute and inspire others.
                </p>
            </div>
        </div>

        <div class="card-container">
            <div class="card">
                <h3>Rate & Review</h3>
                <p>
                    Discover cocktails created by other users and leave ratings to 
                    help highlight the best recipes. Ratings make it easier for the 
                    community to find the most popular and top-rated drinks.
                </p>
            </div>

            <div class="card">
                <h3>User Accounts</h3>
                <p>
                    Create an account to unlock all features. Logging in allows you 
                    to add cocktail recipes, rate drinks, and interact with other 
                    members of the community.
                </p>
            </div>
        </div>
    </main>
    <?php require_once("_footer.php"); ?>
</body>
</html>