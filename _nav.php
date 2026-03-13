    <nav>
        <a href="index.php">Home</a>
        <a href="about.php">About</a>
        <?php if(isLevel(10)):?>
            <a href="add_drink.php">Add new drink</a>
        <?php endif; ?>
        <div class="fill"></div>
        <?php if(isLevel(1000)):?>
            <a href="useradmin.php">User Admin</a>
            <a href="drinkadmin.php">Drink Admin</a>
        <?php endif; ?>
        <?php if(!isLevel(10)):?>
        <a href="register.php">Register</a>
        <button popovertarget="login">Login</button>
        <?php else: ?>
        <a href="_login.php?logout=1">Logout</a>
        <?php endif; ?>
    </nav>