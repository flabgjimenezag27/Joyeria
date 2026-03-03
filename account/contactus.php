
<?php
require_once('../includes/config.php');
require_once(ROOT_PATH . 'core/init.php');
include(ROOT_PATH .'includes/header.php');
include(ROOT_PATH .'model/database.php');
include(ROOT_PATH .'model/accountsDB.php');
?>

<div class="d-flex flex-column min-vh-100">
    <main class="container my-auto py-5">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-10">
                <div class="card shadow-sm border-0">
                    <div class="card-header bg-white border-0 pt-4">
                        <h1 class="text-center text-uppercase text-gold mb-2"><strong>Contact Us</strong></h1>
                        <p class="text-center text-muted mb-0">We'd love to hear from you</p>
                    </div>
                    
                    <div class="card-body px-5 pb-5 pt-4">
                        <!-- Success Message -->
                        <?php if(isset($_SESSION['contact_success'])): ?>
                            <div class="alert alert-success alert-dismissible fade show">
                                <?php echo $_SESSION['contact_success']; unset($_SESSION['contact_success']); ?>
                                <button type="button" class="close" data-dismiss="alert">
                                    <span>&times;</span>
                                </button>
                            </div>
                        <?php endif; ?>
                        
                        <!-- Error Message -->
                        <?php if(isset($_SESSION['contact_error'])): ?>
                            <div class="alert alert-danger alert-dismissible fade show">
                                <?php echo $_SESSION['contact_error']; unset($_SESSION['contact_error']); ?>
                                <button type="button" class="close" data-dismiss="alert">
                                    <span>&times;</span>
                                </button>
                            </div>
                        <?php endif; ?>
                        
                        <!-- Contact Form -->
                        <form class="needs-validation" novalidate action="<?php echo BASE_URL; ?>account/contact_process.php" method="post">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="contactName">Your Name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="contactName" name="name" required>
                                    <div class="invalid-feedback">Please provide your name</div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="contactEmail">Email <span class="text-danger">*</span></label>
                                    <input type="email" class="form-control" id="contactEmail" name="email" required>
                                    <div class="invalid-feedback">Please provide a valid email</div>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label for="contactSubject">Subject <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="contactSubject" name="subject" required>
                                <div class="invalid-feedback">Please provide a subject</div>
                            </div>
                            
                            <div class="form-group">
                                <label for="contactMessage">Message <span class="text-danger">*</span></label>
                                <textarea class="form-control" id="contactMessage" name="message" rows="5" required></textarea>
                                <div class="invalid-feedback">Please write your message</div>
                            </div>
                            
                            <button type="submit" class="btn btn-gold btn-block py-2 mt-3" name="send_message">
                                <i class="fas fa-paper-plane mr-2"></i> Send Message
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Contact Information -->
        <div class="row justify-content-center mt-4">
            <div class="col-lg-8 col-md-10">
                <div class="card shadow-sm border-0">
                    <div class="card-body text-center">
                        <h4 class="text-gold mb-4">Our Contact Information</h4>
                        
                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <i class="fas fa-map-marker-alt fa-2x text-gold mb-2"></i>
                                <h5>Address</h5>
                                <p>123 Jewelry Street<br>Boston, MA 02115</p>
                            </div>
                            <div class="col-md-4 mb-3">
                                <i class="fas fa-phone fa-2x text-gold mb-2"></i>
                                <h5>Phone</h5>
                                <p>+1 (617) 555-0123<br>Mon-Fri: 9am-6pm</p>
                            </div>
                            <div class="col-md-4 mb-3">
                                <i class="fas fa-envelope fa-2x text-gold mb-2"></i>
                                <h5>Email</h5>
                                <p>info@yourjewelry.com<br>support@yourjewelry.com</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <?php include(ROOT_PATH . 'includes/footer.php'); ?>
</div>

<!-- Form Validation Script -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Bootstrap validation
    var forms = document.querySelectorAll('.needs-validation');
    
    Array.prototype.slice.call(forms).forEach(function(form) {
        form.addEventListener('submit', function(event) {
            if (!form.checkValidity()) {
                event.preventDefault();
                event.stopPropagation();
            }
            form.classList.add('was-validated');
        }, false);
    });
});
</script>