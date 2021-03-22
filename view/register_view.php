<main>
<h2>Sign in</h2>
<form action="/login" method="post">
    
    <div>
        <label for="firstname">Prémon</label>
        <br>
        <input type="text" name="firstname" placeholder=" écrivez ici" required>
    </div>
    <div>
        <label for="lastname">Nom</label>
        <br>
        <input type="text" name="lastname" placeholder=" écrivez ici" required>
    </div>
    <div>
        <label for="email">email</label>
        <br>
        <input type="text" name="email" placeholder= "Votre email"required>
    </div>
        <div>
            <label for="phone">Téléphone</label>
            <br>
        <input type="number" name="phone" placeholder= "0123456789"required>
    </div>
    <div>
        <label for="password"> Mot-de-passe </label>
        <br>
        <input type="password" name="password" required>
    </div>
        <input type="submit" value="Send">

</form>    
</main>


