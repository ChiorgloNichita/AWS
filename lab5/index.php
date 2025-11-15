<?php
require "config-replica.php";
$tasks = $pdo->query("
    SELECT t.id, t.title, t.status, c.name AS category 
    FROM todos t 
    JOIN categories c ON t.category_id = c.id
")->fetchAll(PDO::FETCH_ASSOC);
?>

<h2>Список задач (чтение из реплики)</h2>

<a href="create.php">Добавить задачу</a>
<br><br>

<table border="1" cellpadding="10">
<tr>
    <th>ID</th>
    <th>Title</th>
    <th>Status</th>
    <th>Category</th>
    <th>Actions</th>
</tr>

<?php foreach ($tasks as $t): ?>
<tr>
    <td><?= $t['id'] ?></td>
    <td><?= $t['title'] ?></td>
    <td><?= $t['status'] ?></td>
    <td><?= $t['category'] ?></td>
    <td>
        <a href="delete.php?id=<?= $t['id'] ?>">Удалить</a>
    </td>
</tr>
<?php endforeach; ?>

</table>
