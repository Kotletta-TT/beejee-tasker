<div class="row justify-content-end mb-3 pt-3">
  <div class="col-lg-6 text-right">
    <form action="/" method="get">

      <div class="input-group">
        <select class="custom-select" id="sortby" name="sortby">
          <option value="name">По имени</option>
          <option value="email">По почте</option>
          <option value="is_completed">По статусу</option>
        </select>
        <select class="custom-select" id="order" name="order">
          <option value="asc">По возрастанию</option>
          <option value="desc" selected="">По убыванию</option>
        </select>
        <div class="input-group-append">
          <button class="btn btn-outline-primary" type="submit">Применить</button>
        </div>
      </div>
    </form>
  </div>
</div>
<div class="container pt-1 ml-4 center">
    <div class="row">
      <div class="col">
        <div class="card text-center text-white bg-secondary mb-3" style="max-width: 18rem;">
            <div class="card-header">E-mail</div>
            <div class="card-body">
              <h5 class="card-title">Имя</h5>
              <p class="card-text">Текст</p>
              <a href="#" class="btn btn-dark">Редактировать</a>
              <p class="card-text"><small class="text-white">Отредактировано</small></p>
            </div>
          </div>
      </div>
      <div class="col">
        <div class="card text-center text-white bg-success mb-3" style="max-width: 18rem;">
            <div class="card-header">E-mail</div>
            <div class="card-body">
              <h5 class="card-title">Имя</h5>
              <p class="card-text">Текст</p>
              <a href="#" class="btn btn-dark">Редактировать</a>
              <p class="card-text"><small class="text-white">Не редактировалось</small></p>
            </div>
          </div>
      </div>
      <div class="col">
        <div class="card text-center text-white bg-success mb-3" style="max-width: 18rem;">
            <div class="card-header">E-mail</div>
            <div class="card-body">
              <h5 class="card-title">Имя</h5>
              <p class="card-text">Текст</p>
              <a href="#" class="btn btn-dark">Редактировать</a>
              <p class="card-text"><small class="text-white">Не редактировалось</small></p>
            </div>
          </div>
      </div>
    </div>
  </div>
  <nav aria-label="Page navigation example">
    <ul class="pagination justify-content-center">
      <li class="page-item"><a class="page-link" href="#">1</a></li>
      <li class="page-item"><a class="page-link" href="#">2</a></li>
      <li class="page-item"><a class="page-link" href="#">3</a></li>
    </ul>
  </nav>