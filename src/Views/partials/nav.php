<header class="header" role="banner">
    <h1>todos</h1>
    <form id="create-todo" method="post" action="todos">
        <input name="title" class="new-todo" placeholder="What needs to be done?" autofocus>
    </form>
</header>

<section class="main">
    <form method="post" method="POST" action="/todos/toggle-all">
        <input id="toggle-all" class="toggle-all" type="checkbox" name="toggle" value=<?= (count(array_filter($todos, function ($todo) {
    return $todo['completed'] === "false";
})) !== 0) ?  "true" : "false"; ?>
        onChange="this.form.submit()">
        <label for="toggle-all">Mark all as complete</label>
    </form>
</section>