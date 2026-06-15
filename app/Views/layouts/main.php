<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($title ?? 'Ujian Semester') ?></title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#3b82f6',
                        secondary: '#64748b',
                        success: '#22c55e',
                        danger: '#ef4444',
                        warning: '#f59e0b',
                    }
                }
            }
        }
    </script>
</head>

<body class="bg-gray-50 min-h-screen flex flex-col">
    <nav class="bg-white shadow-md">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex items-center">
                    <a href="/" class="text-xl font-bold text-primary">
                        <i class="fas fa-graduation-cap mr-2"></i>UjianSemester
                    </a>
                </div>
                <div class="flex items-center space-x-4">
                    <?php if (isset($_SESSION['user'])): ?>
                        <a href="/dashboard" class="text-gray-700 hover:text-primary transition">
                            <i class="fas fa-tachometer-alt mr-1"></i>Dashboard
                        </a>
                        <a href="/posts" class="text-gray-700 hover:text-primary transition">
                            <i class="fas fa-newspaper mr-1"></i>Posts
                        </a>
                        <div class="relative group">
                            <button class="flex items-center space-x-2 text-gray-700 hover:text-primary">
                                <img src="<?= htmlspecialchars($_SESSION['user']['avatar'] ?? 'https://ui-avatars.com/api/?name=' . urlencode($_SESSION['user']['name'])) ?>"
                                    class="w-8 h-8 rounded-full" alt="Avatar">
                                <span><?= htmlspecialchars($_SESSION['user']['name']) ?></span>
                                <i class="fas fa-chevron-down text-xs"></i>
                            </button>
                            <div class="absolute right-0 mt-2 w-48 bg-white rounded-lg shadow-lg opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200">
                                <a href="/dashboard/profile" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">
                                    <i class="fas fa-user mr-2"></i>Profil
                                </a>
                                <form action="/logout" method="POST" class="block">
                                    <input type="hidden" name="_token" value="<?= $_SESSION['_token'] ?? '' ?>">
                                    <button type="submit" class="w-full text-left px-4 py-2 text-red-600 hover:bg-gray-100">
                                        <i class="fas fa-sign-out-alt mr-2"></i>Logout
                                    </button>
                                </form>
                            </div>
                        </div>
                    <?php else: ?>
                        <a href="/login" class="text-gray-700 hover:text-primary transition">
                            <i class="fas fa-sign-in-alt mr-1"></i>Login
                        </a>
                        <a href="/register" class="bg-primary text-white px-4 py-2 rounded-lg hover:bg-blue-600 transition">
                            <i class="fas fa-user-plus mr-1"></i>Daftar
                        </a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </nav>

    <?php if (isset($_SESSION['flash'])): ?>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-4">
            <?php foreach ($_SESSION['flash'] as $type => $message): ?>
                <div class="p-4 rounded-lg <?= $type === 'success' ? 'bg-green-100 text-green-700 border border-green-400' : 'bg-red-100 text-red-700 border border-red-400' ?> mb-2">
                    <i class="fas <?= $type === 'success' ? 'fa-check-circle' : 'fa-exclamation-circle' ?> mr-2"></i>
                    <?= htmlspecialchars($message) ?>
                </div>
            <?php endforeach; ?>
            <?php unset($_SESSION['flash']); ?>
        </div>
    <?php endif; ?>

    <main class="flex-grow">
        <?php if (isset($content)) {
            echo $content;
        } ?>
    </main>

    <footer class="bg-gray-800 text-white py-8 mt-auto">
        <div class="max-w-7xl mx-auto px-4 text-center">
            <p>&copy; <?= date('Y') ?> Ujian Semester OOP. Dibuat dengan <i class="fas fa-heart text-red-500"></i> oleh murid-murid hebat.</p>
        </div>
    </footer>

    <script>
        setTimeout(() => {
            document.querySelectorAll('[class*="bg-green-100"], [class*="bg-red-100"]').forEach(el => {
                el.style.opacity = '0';
                el.style.transition = 'opacity 0.5s';
                setTimeout(() => el.remove(), 500);
            });
        }, 5000);
    </script>
</body>

</html>
