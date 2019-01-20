<header class="header" role="banner">
    <h1>Login</h1>
</header>

<main role="main">

    <form class="view" method="POST" action="login">
        <input type="text" name="username" placeholder="username" minlength="4" maxlength="8" required>
        <input type="password" name="password" placeholder="password" minlength="6" required>
        <button type=submit>Login</button>
    </form>

    <?php
if (isset($status)) {
    echo '<div class="small-container" id="error">Password or username is incorrect</div>';
}
