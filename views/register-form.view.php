<?php
include BASE_PATH . '/inc/views.functions.php';
?>

<div class="container">
    <h1>Please enter your information</h1>
    <?php if (isSuccessState()): ?>
        <div class="alert alert-success" role="alert">
            <?= successMessage(); ?>
        </div>
    <?php endif; ?>
    <form method="post" action="<?= htmlspecialchars($_SERVER['PHP_SELF']); ?>">
        <div class="mb-3">
            <label for="exampleInputFullName" class="form-label">Full name</label>
            <input
                type="text"
                name="fullname"
                class="form-control <?= isFullNameInvalid() ? invalidClassSelector() : ''; ?>"
                id="exampleInputPassword1"
                value="<?= inputs('fullname'); ?>">
            <?php if (isFullNameInvalid()): ?>
                <div class="invalid-feedback">
                    <?= errorMessage('fullname'); ?>
                </div>
            <?php endif; ?>
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email address</label>
            <input
                type="email"
                name="email"
                class="form-control <?= isEmailInvalid() ? invalidClassSelector() : ''; ?>"
                id="exampleInputEmail1"
                aria-describedby="emailHelp"
                value="<?= inputs('email'); ?>">
            <?php if (isEmailInvalid()): ?>
                <div class="invalid-feedback">
                    <?= errorMessage('email'); ?>
                </div>
            <?php endif; ?>
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input
                type="password"
                name="password"
                class="form-control <?= isPasswordInvalid() ? invalidClassSelector() : ''; ?>"
                id="exampleInputPassword1"
                value="<?= inputs('password'); ?>">
            <?php if (isPasswordInvalid()): ?>
                <div class="invalid-feedback">
                    <?= errorMessage('password'); ?>
                </div>
            <?php endif; ?>
        </div>
        <button type="submit" name="submit" value="btn-register" class="btn btn-primary">Register</button>
    </form>
</div>