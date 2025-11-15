<?php
require "config-master.php";

if ($_POST) {
    $title = $_POST['title'];
    $status = $_POST['status'];
    $cat = $_POST['category'];

    $stmt = $pdo->prepare("INSERT INTO todos (title, status, category_id) VALUES (?, ?, ?)");
    $stmt->execute([$title, $status, $cat]);

    header("Location: index.php");
    exit;
}

$categories = $pdo->query("SELECT * FROM categories")->fetchAll(PDO::FETCH_ASSOC);
?>

<h2>Добавить задачу</h2>

<form method="POST">
    <label>Название</label><br>
    <input name="title" required><br><br>

    <label>Статус</label><br>
    <select name="status">
        <option value="pending">pending</option>
        <option value="in_progress">in_progress</option>
        <option value="completed">completed</option>
    </select><br><br>

    <label>Категория</label><br>
    <select name="category">
        <?php foreach ($categories as $c): ?>
            <option value="<?= $c['id'] ?>"><?= $c['name'] ?></option>
        <?php endforeach; ?>
    </select><br><br>

    <button type="submit">Создать</button>
</form>

<br><a href="index.php">Назад</a>
