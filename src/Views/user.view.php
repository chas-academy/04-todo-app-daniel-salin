<section class="todo-section">
  <ul class="todo-list">
    <?php foreach ($userTodos as $todo): ?>
    <?= includeWith('/partials/user/todo.php', compact('todo', $todo)) ?>
    <?php endforeach; ?>
  </ul>
</section>