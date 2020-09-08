<div class="row justify-content-end mb-3 pt-3">
  <div class="col-lg-6 text-right">
    <form action="/tasks/index" method="get">

      <div class="input-group">
        <select class="custom-select" id="sortby" name="sortby">
          <option value="username" <?=($data['sortby'] == 'name') ? 'selected' : ''?>>По имени</option>
          <option value="email" <?=($data['sortby'] == 'email') ? 'selected' : ''?>>По почте</option>
          <option value="is_completed" <?=($data['sortby'] == 'status') ? 'selected' : ''?>>По статусу</option>
        </select>
        <select class="custom-select" id="order" name="order">
          <option value="asc" <?=($data['order'] == 'asc') ? 'selected' : ''?>>По возрастанию</option>
          <option value="desc" <?=($data['order'] == 'desc') ? 'selected' : ''?>>По убыванию</option>
        </select>
        <div class="input-group-append">
          <button class="btn btn-outline-primary" type="submit">Применить</button>
        </div>
      </div>
    </form>
  </div>
</div>
<?php if (count($data['tasks']) > 0): ?>
<div class="container pt-1 ml-4 center">
    <div class="row align-items-center">
    <?php foreach($data['tasks'] as $value): ?>
      <div class="col">
        <div class="card text-center text-white <?=($value['status']) ? 'bg-success' : 'bg-secondary'?> mb-3" style="max-width: 18rem;">
            <div class="card-header"><?=$value['email']?></div>
            <div class="card-body">
              <h5 class="card-title"><?=$value['username']?></h5>
              <p class="card-text"><?=$value['text']?></p>
              <?=($data['is_admin']) ? '<a href="/edit" class="btn btn-dark">Редактировать</a>' : ''?>
              <p class="card-text"><small class="text-white"><?=($value['is_edit']) ? 'Отредактированно' : 'Не редактировалось'?></small></p>
            </div>
          </div>
      </div>
    <?php endforeach; ?>
    </div>
  </div>
    <?php if ($data['countPages'] > 1): ?>
  <nav aria-label="Page navigation example">
    <ul class="pagination justify-content-center">
        <?php for($i = 1; $i <= $data['countPages']; $i++): ?>
      <li class="page-item <?=($_GET['page'] == $i || (!isset($_GET['page']) && $i == 1)) ? 'active' : '' ?>"><a class="page-link" href="?page=<?=$i?>"><?=$i?></a></li>
        <?php endfor ?>
    </ul>
  </nav>
    <?php endif;?>
<?php else: ?>
<h1 class="text-center">Задач нет</h1>
<?php endif; ?>