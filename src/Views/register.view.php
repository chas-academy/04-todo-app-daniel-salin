<header class="header" role="banenr">
    <h1>Register</h1>
</header>

<form class="view" method="POST" action="register">
    <input type="text" name="username" placeholder="username" minlength="4" maxlength="8" required>
    <input type="password" name="password" placeholder="password" minlength="6" required>
    <button type=submit>Submit</button>
</form>

<?php
if(isset($status)) {
    echo '<div class="small-container" id="error">Username is already taken</div>';
}
?>