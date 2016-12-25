<?php
/* @var $this yii\web\View */
$this->title = $page->title;
?>
<!-- Подключаем заголовок -->
<?= $this->render('../components/title', ['title' => $this->title]) ?>

<div class="row">
  <?php foreach($posts as $post): ?>
    <?= $this->render('../components/postCard', compact('post')) ?>
  <?php endforeach; ?>
</div>