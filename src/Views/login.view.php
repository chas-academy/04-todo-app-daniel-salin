<header class="header">
    <h1>Login</h1>
</header>

<main>

<form class="view" method="POST" action="login">
    <input type="text" name="username" placeholder="username">
    <input type="text" name="password" placeholder="password">
    <button type=submit>Login</button>
</form>

<?php
if(isset($status)) {
    echo '<div class="small-container" id="error">Password or username is incorrect</div>';
}
?>