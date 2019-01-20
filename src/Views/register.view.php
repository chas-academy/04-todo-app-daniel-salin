<header class="header">
    <h1>Register</h1>
</header>

<form class="view" method="POST" action="register">
    <input type="text" name="username" placeholder="username">
    <input type="text" name="password" placeholder="password">
    <button type=submit>Submit</button>
</form>

<?php
if(isset($status)) {
    echo '<div class="small-container" id="error">Username is already taken</div>';
}
?>