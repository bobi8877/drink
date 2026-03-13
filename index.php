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
<?php endif; ?>
<?php
$userID = isset($_SESSION['id']) ? intval($_SESSION['id']) : 0;
$sql = "
    SELECT
        d.*,
        COALESCE(AVG(r.rating), 0) AS avg_rating,
        MAX(CASE WHEN r.user_id = $userID THEN r.rating ELSE 0 END) AS user_rating
    FROM tbl_drinks d
    LEFT JOIN tbl_rating r ON d.id = r.drink_id
    GROUP BY d.id
    ORDER BY avg_rating DESC, d.drinkname ASC
";
$result = mysqli_query($conn, $sql);
?>
<?php while($row=mysqli_fetch_assoc($result)):?>
<details>
    <summary>
        <div>
            <h2><?=$row['drinkname']?>&nbsp;&nbsp;<span><?=isAlcoholic(intval($row['alcoholic']))?></span></h2>
            <h4><?=$row['description']?></h4></div> 
            <div class="filler"></div>  
            
            <div class="ratingdiv">
                Rated: <?=showRating($row['avg_rating'])?>
            <?php if(isLevel(10)): ?>
            <?php $userRating = isset($row['user_rating']) ? intval($row['user_rating']) : 0; ?>
            <div class="yourRating">
                <?php for($i = 5; $i >= 1; $i--): ?>
                    <a href="rate.php?rating=<?=$i?>&drinkID=<?=$row['id']?>"
                    class="olive <?= ($userRating >= $i) ? 'selected' : 'grey' ?>"
                    title="Rate <?=$i?>">🫒</a>
                <?php endfor; ?>
                <span class="yrlabel">Your rating:</span>
            </div>
            <?php endif; ?>
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