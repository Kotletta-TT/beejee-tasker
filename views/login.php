<div class="container text-center pt-4">
    <div class="row">
      <div class="col-sm">
      </div>
      <div class="col-sm">
        
        <form method="post" action="/login/check">
          <div class="form-group">
            <label for="username">Username</label>
            <input type="username" name="username" class="form-control <?= isset($data['errors']['username']) ? 'is-invalid' : '';?>" id="username" aria-describedby="emailHelp" required>
              <small id="username" class="form-text text-danger"><?=$data['errors']['username'] ?? '';?></small>
          </div>
          <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" class="form-control <?= isset($data['errors']['password']) ? 'is-invalid' : '';?>" id="password" required>
              <small id="password" class="form-text text-danger"><?=$data['errors']['password'] ?? '';?></small>
          </div>
          <div class="form-group form-check">
            <input type="checkbox" class="form-check-input" name="remember" id="remember">
            <label class="form-check-label" for="remember">Remember me</label>
          </div>
          <button type="submit" class="btn btn-primary">Enter</button>
        </form>

      </div>
      <div class="col-sm">
      </div>
    </div>
  </div>