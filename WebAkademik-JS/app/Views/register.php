<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register</title>
    <style>
        body { font-family: sans-serif; display: flex; justify-content: center; align-items: center; height: 100vh; background-color: #f4f4f4; }
        .register-container { background: white; padding: 2rem; border-radius: 8px; box-shadow: 0 4px 8px rgba(0,0,0,0.1); width: 320px; }
        .form-group { margin-bottom: 1rem; }
        label { display: block; margin-bottom: 0.5rem; }
        input { box-sizing: border-box; width: 100%; padding: 0.5rem; border: 1px solid #ccc; border-radius: 4px; }
        button { width: 100%; padding: 0.75rem; border: none; background-color: #28a745; color: white; border-radius: 4px; cursor: pointer; font-size: 1rem; }
        .errors { list-style: none; padding: 0; margin: 0 0 1rem 0; font-size: 0.9em; color: red; background-color: #ffebeb; border: 1px solid red; border-radius: 4px; padding: 0.75rem; }
    </style>
</head>
<body>
    <div class="register-container">
        <h2>Buat Akun Baru</h2>

        <?php if(session()->has('errors')): ?>
            <ul class="errors">
            <?php foreach (session('errors') as $error): ?>
                <li><?= esc($error) ?></li>
            <?php endforeach ?>
            </ul>
        <?php endif; ?>
        <form action="/register" method="post">
            <?= csrf_field() ?>
            <div class="form-group">
                <label for="full_name">Nama Lengkap</label>
                <input type="text" id="full_name" name="full_name" value="<?= old('full_name') ?>" required>
            </div>
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" value="<?= old('username') ?>" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
            </div>
            <button type="submit">Register</button>
        </form>
        <p style="text-align:center; margin-top:1rem;">Sudah punya akun? <a href="/login">Login di sini</a></p>
    </div>
</body>
</html>