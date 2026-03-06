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
    <main>
<h1 class="message"><?=$mess;?></h1>
<?php if(isLevel(5)):?>
<a href="add_drink.php" class="addDrink">Add new drink!</a>
<?php endif; ?>
<?php
    $sql="SELECT * FROM tbl_drinks ORDER BY rating DESC";
    $result=mysqli_query($conn, $sql);


?>
<?php while($row=mysqli_fetch_assoc($result)):?>
<details>
    <summary>
        <div>
            <h2><?=$row['drinkname']?>&nbsp;&nbsp;<span><?=isAlcoholic(intval($row['alcoholic']))?></span></h2>
            <h4><?=$row['description']?></h4></div> 
            <div class="filler"></div>  
            
            <div class="ratingdiv">
                Rated: <?=showRating($row['rating'])?>
            <div class="yourRating">
                <a href="rate.php?rating=5&drinkID=<?=$row['id']?>" class="olive">🫒</a>
                <a href="rate.php?rating=4&drinkID=<?=$row['id']?>" class="olive">🫒</a>
                <a href="rate.php?rating=3&drinkID=<?=$row['id']?>" class="olive">🫒</a>
                <a href="rate.php?rating=2&drinkID=<?=$row['id']?>" class="olive">🫒</a>
                <a href="rate.php?rating=1&drinkID=<?=$row['id']?>" class="olive">🫒</a>
                Your Rating:
            </div>
        </div>

    </summary>
    <div class="ingredients">
        <pre><?=$row['ingredients']?></pre>
    </div>
    <div class="recipe">
        <pre><?=$row['recipe']?></pre>
    </div>
</details>
<?php endwhile; ?>
    </main>
<?php require_once("_footer.php"); ?>
    <dialog id="login" popover>
        <form action="_login.php" method="POST">
            <label for="user">Username</label>
            <input type="text" name="user" placeholder="Username" required>
            <label for="pass">Password</label>
            <input type="password" name="pass" placeholder="Password" required>
            <input type="submit" name="btn_login" value="Log in">
        </form>
    </dialog>
</body>
</html>