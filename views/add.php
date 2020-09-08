<?php if (isset($data['success'])): ?>
    <div class="container center pt-2">
        <div class="alert alert-success pt-2" role="alert">
            Задача добавлена
        </div>
    </div>
<?php endif; ?>
<form method="post" action="/tasks/save">
    <div class="form-row pt-4">
        <div class="form-group col-md-6">
            <label for="inputUsername">Userame</label>
            <input type="username" class="form-control <?= isset($data['errors']['username']) ? 'is-invalid' : ''; ?>"
                   id="inputUsername" name="inputUsername" value="" placeholder="Please enter your name">
            <small id="inputUsername" class="form-text text-danger"><?= $data['errors']['username'] ?? ''; ?></small>
        </div>
        <div class="form-group col-md-6">
            <label for="inputEmail">Email</label>
            <input type="email" class="form-control <?= isset($data['errors']['email']) ? 'is-invalid' : ''; ?>"
                   id="inputEmail" name="inputEmail" value="" placeholder="Please enter your E-mail">
            <small id="inputEmail" class="form-text text-danger"><?= $data['errors']['email'] ?? ''; ?></small>
        </div>
    </div>
    <div class="form-group">
        <label for="inputText">Описание задачи</label>
        <textarea class="form-control <?= isset($data['errors']['text']) ? 'is-invalid' : ''; ?>" id="inputText"
                  name="inputText" rows="3" placeholder="Enter text task"></textarea>
        <small id="inputText" class="form-text text-danger"><?= $data['errors']['text'] ?? ''; ?></small>

    </div>
    <div class="text-right">
        <button type="submit" class="btn btn-primary">Создать задачу</button>
    </div>
</form>