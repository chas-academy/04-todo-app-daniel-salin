<footer class="footer">
  <span class="todo-count"><?= count(array_filter($userTodos, function ($todo) {
    return $todo['completed'] === "false";
})) ?>
    item<?= "".count($userTodos) !== 1 ? "s" : "" ?>
    left</span>

  <form class="view" method="POST" action="/usertodos/<?= $_SESSION['userId'] ?>/complete">
    <button class="clear-completed" type=submit>Completed</button>
  </form>
  <form class="view" method="POST" action="/usertodos/<?= $_SESSION['userId'] ?>/incomplete">
    <button class="clear-completed" type=submit>Incomplete</button>
  </form>
  <form class="view" method="GET" action="/usertodos/<?= $_SESSION['userId'] ?>">
    <button class="clear-completed" type=submit>All</button>
  </form>
  <form class="view" method="POST" action="/usertodos/<?= $_SESSION['userId'] ?>/clear-completed">
    <button class="clear-completed" type=submit>Clear completed</button>
  </form>
</footer>

</main>
<div class="small-container">
  <p><a href="/logout">Logout</a></p>
</div>

<footer class="site-footer">
  <div class="small-container">
    <p class="text-center">Made by <a href="http://danielsalin.chas.academy">Daniel Salin</a></p>
  </div>
</footer>

<script type="module" src="<?= $this->getScript('scripts'); ?>"></script>

</body>

</html>