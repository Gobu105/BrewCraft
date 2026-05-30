<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Login | BrewCraft</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&family=Playfair+Display:wght@600;700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="<?php echo BASE_URL; ?>/public/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo BASE_URL; ?>/public/css/style.css" rel="stylesheet">
</head>
<body style="background-color: var(--bg-beige);">
    <div class="container min-vh-100 d-flex justify-content-center align-items-center py-5">
        <div class="auth-card p-5 w-100" style="max-width: 480px;">
            <div class="text-center mb-4">
                <a href="<?php echo BASE_URL; ?>/" class="text-decoration-none d-inline-flex align-items-center mb-3">
                    <i class="fa fa-coffee fa-2x me-2 text-primary"></i>
                    <h2 class="mb-0 text-primary">BrewCraft</h2>
                </a>
                <h3 class="fw-bold text-dark">Welcome back</h3>
                <p class="text-muted">Enter your credentials to access your account</p>
            </div>
            
            <?php if (isset($_SESSION['error'])): ?>
                <div class="alert alert-danger py-2"><?php echo $_SESSION['error']; unset($_SESSION['error']); ?></div>
            <?php endif; ?>

            <form method="post" action="<?php echo BASE_URL; ?>/login">
                <div class="mb-3">
                    <label class="form-label fw-bold text-dark">Email</label>
                    <input type="email" class="form-control form-control-lg" name="email" placeholder="m@example.com" required>
                </div>
                <div class="mb-4">
                    <label class="form-label fw-bold text-dark">Password</label>
                    <input type="password" class="form-control form-control-lg" name="password" required>
                </div>
                
                <button class="w-100 btn btn-primary btn-lg rounded-3 mb-4" type="submit">Sign in</button>
                
                <div class="text-center">
                    <p class="text-muted mb-0">Don't have an account? <a href="<?php echo BASE_URL; ?>/register" class="text-primary text-decoration-none fw-bold">Sign up</a></p>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
