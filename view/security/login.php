<h1 class="login-heading">Se connecter</h1>
<div class="login-container">
    <form class="form-login" action="index.php?ctrl=security&action=login" method="POST">

        <label for="email" class="form-label">Email</label>
        <input type="email" name="email" id="email" class="form-input" placeholder="Entrez votre email" required><br>
        
        <label for="password" class="form-label">Mot de passe</label>
        <input type="password" name="password" id="password" class="form-input" placeholder="Entrez votre mot de passe" required><br>

        <input type="submit" name="submit" value="Se connecter" class="form-button">

    </form>
</div>