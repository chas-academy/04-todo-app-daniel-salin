<header class="header">
    <h1>todos</h1>
    <form id="create-todo" method="post" action="/usertodos/<?= $_SESSION['userId'] ?>/add">
        <input name="title" class="new-todo" placeholder="What needs to be done?" autofocus>
    </form>
</header>

<section class="main">
    <form method="post" method="POST" action="/usertodos/<?= $_SESSION['userId'] ?>/toggle-all">
        <input id="toggle-all" class="toggle-all" type="checkbox" name="toggle" value=<?= (count(array_filter($userTodos, function ($todo) {
    return $todo['completed'] === "false";
})) !== 0) ?  "true" : "false"; ?>
        onChange="this.form.submit()">
        <label for="toggle-all">Mark all as complete</label>
    </form>
</section>