<h1 class="register-heading">S'inscrire</h1>
<div class="register-container">
    <form class="form-register" action="index.php?ctrl=security&action=register" method="POST">

        <label for="email" class="form-label">E-mail</label>
        <input type="email" name="email" id="email" class="form-input" placeholder="Entrez votre email" required><br>

        <label for="nickname" class="form-label">Pseudo</label>
        <input type="text" name="nickname" id="nickname" class="form-input" placeholder="Choisissez un pseudo" required><br>

        <label for="pass1" class="form-label">Mot de passe</label>
        <input type="password" name="pass1" id="pass1" class="form-input" placeholder="Entrez un mot de passe" required><br>
 
        <label for="pass2" class="form-label">Confirmation du mot de passe</label>
        <input type="password" name="pass2" id="pass2" class="form-input" placeholder="Confirmez votre mot de passe" required><br>

        <input type="submit" name="submit" value="S'enregistrer" class="form-button">
    </form>
</div>