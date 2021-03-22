<form action="/account_edit" method="post">

    <div>
        <label for="first_name"> First Name</label>
        <br>
        <input type="text" name="first_name" value="<?= $_SESSION['first_name'] ?>">
    </div>
    <div>
        <label for="last_name">Last Name</label>
        <br>
        <input type="text" name="last_name" value="<?= $_SESSION['last_name'] ?>">
    </div>
    <div>
        <label for="email">email</label>
        <br>
        <input type="text" name="email" value="<?= $_SESSION['email'] ?>">
    </div>
    <div>
        <label for="phone">Phone</label>
        <br>
        <input type="number" name="phone" value="<?= $_SESSION['phone'] ?>">
    </div>
    <div>
        <label for="password"> Password </label>
        <br>
        <input type="password" name="password" required>
    </div>
    
    <p>Enter your password before submit</p>
    <input type="submit" value="Submit">

</form>

<?php

