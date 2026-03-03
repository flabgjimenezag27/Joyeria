<?php 
/**
 * Register Page - Adapted
 * 
 * @package Jewelry Store
 * @path /account/register.php
 */
require_once('includes/config.php');
require_once(ROOT_PATH . 'core/init.php');
include('includes/loginheader.php');
require_once(ROOT_PATH . 'account/accountController.php');
?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <form class="needs-validation" novalidate action="" method="post">
                <h3 class="text-center text-uppercase mb-4"><strong>Create Your Account</strong></h3>
                <p class="text-center text-muted mb-4">Join our jewelry community today</p>

                <!-- Optional PHP error message -->
                <?php if(isset($_SESSION['error'])): ?>
                    <div class="alert alert-danger alert-dismissible fade show mb-4">
                        <?php echo $_SESSION['error']; unset($_SESSION['error']); ?>
                        <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
                    </div>
                <?php endif; ?>

                <!-- Personal Information -->
                <div class="form-row mb-3">
                    <div class="form-group col-md-6">
                        <label for="firstName">First Name <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="firstName" name="firstName" required>
                        <div class="invalid-feedback">Please provide your first name</div>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="lastName">Last Name <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="lastName" name="lastName" required>
                        <div class="invalid-feedback">Please provide your last name</div>
                    </div>
                </div>

                <!-- Email and Password -->
                <div class="form-row mb-3">
                    <div class="form-group col-md-6">
                        <label for="email">Email <span class="text-danger">*</span></label>
                        <input type="email" class="form-control" id="email" name="email" required>
                        <div class="invalid-feedback">Please provide a valid email</div>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="phone">Phone</label>
                        <input type="tel" class="form-control" id="phone" name="phone">
                    </div>
                </div>

                <div class="form-row mb-3">
                    <div class="form-group col-md-6">
                        <label for="password">Password <span class="text-danger">*</span></label>
                        <input type="password" class="form-control" id="password" name="password" required>
                        <div class="invalid-feedback">Password is required</div>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="confirmPassword">Confirm Password <span class="text-danger">*</span></label>
                        <input type="password" class="form-control" id="confirmPassword" name="confirmPassword" required>
                        <div class="invalid-feedback">Passwords must match</div>
                    </div>
                </div>

                <!-- Address Information -->
                <div class="form-group mb-3">
                    <label for="address">Address <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="address" name="address" required>
                </div>

                <div class="form-row mb-4">
                    <div class="form-group col-md-6">
                        <label for="city">City <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="city" name="city" required>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="state">State</label>
                        <input type="text" class="form-control" id="state" name="state">
                    </div>
                    <div class="form-group col-md-2">
                        <label for="zipcode">ZIP Code</label>
                        <input type="text" class="form-control" id="zipcode" name="zipcode">
                    </div>
                </div>

                <!-- Terms and Submit -->
                <div class="form-group form-check mb-4">
                    <input type="checkbox" class="form-check-input" id="terms" required>
                    <label class="form-check-label" for="terms">I agree to the <a href="#" data-toggle="modal" data-target="#termsModal">terms and conditions</a></label>
                    <div class="invalid-feedback">You must agree to the terms</div>
                </div>

                <button type="submit" class="btn btn-primary btn-block py-2" name="register">
                    <i class="fas fa-user-plus mr-2"></i> Register
                </button>

                <div class="text-center mt-3">
                    <p>Already have an account? <a href="<?php echo BASEURL; ?>index.php" class="font-weight-bold">Sign In</a></p>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Terms Modal -->
<div class="modal fade" id="termsModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Terms & Conditions</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
            </div>
            <div class="modal-body">
                <p>Your terms and conditions content here...</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<?php include(ROOT_PATH . 'includes/footer.php'); ?>

<script>
// Bootstrap form validation + password match
document.addEventListener('DOMContentLoaded', function() {
    // Password matching
    const password = document.getElementById('password');
    const confirmPassword = document.getElementById('confirmPassword');

    confirmPassword.addEventListener('input', function () {
        if (password.value !== confirmPassword.value) {
            confirmPassword.setCustomValidity("Passwords don't match");
            confirmPassword.classList.add('is-invalid');
        } else {
            confirmPassword.setCustomValidity('');
            confirmPassword.classList.remove('is-invalid');
        }
    });

    // Bootstrap validation
    const forms = document.querySelectorAll('.needs-validation');
    Array.from(forms).forEach(function (form) {
        form.addEventListener('submit', function (event) {
            if (!form.checkValidity()) {
                event.preventDefault();
                event.stopPropagation();
            }

            form.classList.add('was-validated');
        }, false);
    });
});
</script>
