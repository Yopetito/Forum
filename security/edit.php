

<h1>Edition du profil</h1>
<div class="edit-forms">
    <div class="register-container">
        <form class="form-register" action="index.php?ctrl=security&action=editUser" method="POST">

            <label for="email">New E-mail</label>
            <input type="email" name="email" id="email"><br>
            <input type="submit" name="submit-email" value="Modifier">
        </form>
    </div>
    <div class="register-container">
        <form class="form-register" action="index.php?ctrl=security&action=editUser" method="POST">
            <label for="nickname">New Nickname</label>
            <input type="nickname" name="nickname" id="nickname"><br>
            <input type="submit" name="submit-nickname" value="Modifier">
        </form>
    </div>
    <div class="register-container">
        <form class="form-register" action="index.php?ctrl=security&action=editUser" method="POST">

            <label for="pass1">Old Password</label>
            <input type="password" name="pass1" id="pass1"><br>
    
            <label for="pass2">New password</label>
            <input type="password" name="pass2" id="pass2"><br>
            
            <label for="pass3">Repeat your password</label>
            <input type="password" name="pass3" id="pass3"><br>

            <input type="submit" name="submit-password" value="Change password">
        </form>
    </div>
</div>