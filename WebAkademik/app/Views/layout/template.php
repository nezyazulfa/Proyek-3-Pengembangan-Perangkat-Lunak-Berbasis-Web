<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $this->renderSection('title') ?? 'Web Akademik' ?></title>
    <style>
        /* CSS Sederhana untuk Template */
        body { font-family: sans-serif; margin: 0; }
        .navbar { background-color: #333; overflow: hidden; }
        .navbar a { float: left; display: block; color: white; text-align: center; padding: 14px 16px; text-decoration: none; }
        .navbar a:hover { background-color: #ddd; color: black; }
        .navbar .logout { float: right; }
        .content { padding: 2rem; }
    </style>
</head>
<body>

    <nav class="navbar">
        <a href="/">Home</a>

        <?php if(session()->get('isLoggedIn')): ?>
            
            <?php if(session()->get('role') == 'Admin'): ?>
                <a href="/admin/dashboard">Dashboard Admin</a>
                <a href="/admin/courses">Kelola Mata Kuliah</a>
                <a href="/admin/students">Kelola Mahasiswa</a>
            
            <?php elseif(session()->get('role') == 'Mahasiswa'): ?>
                <a href="/student/dashboard">Dashboard</a>
                <a href="/student/courses">Lihat Mata Kuliah</a>
                <a href="/student/my-courses">Mata Kuliah Saya</a>
            <?php endif; ?>

            <a href="/logout" class="logout">Logout</a>

        <?php else: ?>
            <a href="/login">Login</a>
            <a href="/register">Register</a>
        <?php endif; ?>
    </nav>
    
    <main class="content">
        <?= $this->renderSection('content') ?>
    </main>
    
</body>
</html>