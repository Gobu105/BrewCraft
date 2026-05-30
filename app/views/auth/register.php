<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Sign Up | BrewCraft</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&family=Playfair+Display:wght@600;700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="<?php echo BASE_URL; ?>/public/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo BASE_URL; ?>/public/css/style.css" rel="stylesheet">
</head>
<body style="background-color: var(--bg-beige);">
    <div class="container min-vh-100 d-flex justify-content-center align-items-center py-5">
        <div class="auth-card p-5 w-100" style="max-width: 550px;">
            <div class="text-center mb-4">
                <a href="<?php echo BASE_URL; ?>/" class="text-decoration-none d-inline-flex align-items-center mb-3">
                    <i class="fa fa-coffee fa-2x me-2 text-primary"></i>
                    <h2 class="mb-0 text-primary">BrewCraft</h2>
                </a>
                <h3 class="fw-bold text-dark">Create an account</h3>
                <p class="text-muted">Join BrewCraft to discover or manage coffee shops</p>
            </div>
            
            <?php if (isset($_SESSION['error'])): ?>
                <div class="alert alert-danger py-2"><?php echo $_SESSION['error']; unset($_SESSION['error']); ?></div>
            <?php endif; ?>

            <form method="post" action="<?php echo BASE_URL; ?>/register">
                <div class="mb-3">
                    <label class="form-label fw-bold text-dark">Full Name</label>
                    <input type="text" class="form-control form-control-lg" name="name" placeholder="John Doe" required>
                </div>
                <div class="mb-3">
                    <label class="form-label fw-bold text-dark">Email</label>
                    <input type="email" class="form-control form-control-lg" name="email" placeholder="m@example.com" required>
                </div>
                <div class="mb-4">
                    <label class="form-label fw-bold text-dark">Password</label>
                    <input type="password" class="form-control form-control-lg" name="password" required>
                </div>
                
                <div class="mb-4">
                    <label class="form-label fw-bold text-dark mb-2">I want to...</label>
                    <div class="row g-3">
                        <div class="col-6">
                            <label class="role-select-btn active d-flex flex-column align-items-center justify-content-center text-center w-100 cursor-pointer">
                                <input type="radio" name="role" value="customer" class="d-none" checked>
                                <i class="fa fa-coffee fa-2x mb-2 text-primary"></i>
                                <span class="fw-bold text-dark">Discover Coffee</span>
                            </label>
                        </div>
                        <div class="col-6">
                            <label class="role-select-btn d-flex flex-column align-items-center justify-content-center text-center w-100 cursor-pointer">
                                <input type="radio" name="role" value="owner" class="d-none">
                                <i class="fa fa-store fa-2x mb-2 text-primary"></i>
                                <span class="fw-bold text-dark">Manage a Shop</span>
                            </label>
                        </div>
                    </div>
                </div>
                
                <button class="w-100 btn btn-primary btn-lg rounded-3 mb-4" type="submit">Sign up</button>
                
                <div class="text-center">
                    <p class="text-muted mb-0">Already have an account? <a href="<?php echo BASE_URL; ?>/login" class="text-primary text-decoration-none fw-bold">Login here</a></p>
                </div>
            </form>
        </div>
    </div>
    
    <script>
        // Simple JS for toggle effect
        document.querySelectorAll('.role-select-btn input[type="radio"]').forEach(radio => {
            radio.addEventListener('change', function() {
                document.querySelectorAll('.role-select-btn').forEach(btn => btn.classList.remove('active'));
                if(this.checked) {
                    this.parentElement.classList.add('active');
                }
            });
        });
    </script>
</body>
</html>
