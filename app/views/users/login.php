<?php require APPROOT . '/views/includes/header.php'; ?>

    <div class="row">
        <div class="col-md-6 mx-auto">
            <div class="card card-body bg-light mt-5">
                <h2>Login</h2>
                <p>Please fill in your credentials to login</p>
                <form action="<?php echo URLROOT; ?>/users/register" method="post">

                    <div class="form-group">
                        <label for="email">Email: <sup>*</sup></label>
                        <input type="email" email="email" class="form-control form-control-lg <?php echo(!empty($data['email_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['email']; ?>">
                        <span class="invalid-feedback"><?php echo $data['email_err'];?></span>
                    </div>

                    <div class="form-group">
                        <label for="name">Password: <sup>*</sup></label>
                        <input type="password" name="password" class="form-control form-control-lg <?php echo(!empty($data['password_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['password']; ?>">
                        <span class="invalid-feedback"><?php echo $data['password_err'];?></span>
                    </div>

                    <div class="row mt-3">
                        <div class="col col-md-6">
                            <input type="submit" value="Login" class="btn btn-success form-control">
                        </div>
                        <div class="col col-md-6">
                            <a href="<?php echo URLROOT; ?>/users/register" class="btn btn-light btn-block ">Don't have an account? Register</a>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>

<?php require APPROOT . '/views/includes/footer.php'; ?>
