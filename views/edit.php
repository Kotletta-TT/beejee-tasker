<form action="/tasks/update" method="post">
    <div class="form-row pt-4">
        <div class="form-group col-md-6">
            <label for="inputUsername">Userame</label>
            <input type="username" class="form-control" id="inputUsername" name="inputUsername"
                   value="<?= $data['username'] ?>" required>
        </div>
        <div class="form-group col-md-6">
            <label for="inputEmail">Email</label>
            <input type="email" class="form-control" id="inputEmail" name="inputEmail" value="<?= $data['email'] ?>"
                   required>
        </div>
    </div>
    <div class="form-group">
        <label for="inputText">Описание задачи</label>
        <textarea class="form-control" id="inputText" name="inputText" rows="3" required><?= $data['text'] ?></textarea>
    </div>
    <div class="text-right">
        <div class="form-check">
            <input class="form-check-input" type="checkbox" value="1" id="status" name="status">
            <label class="form-check-label" for="status">
                Выполнено
            </label>
        </div>
        <button type="submit" class="btn btn-primary">Сохранить изменения</button>
    </div>
</form>