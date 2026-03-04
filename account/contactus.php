<?php
session_start();
require_once('../includes/config.php');
require_once(ROOT_PATH . 'core/init.php');
include(ROOT_PATH .'includes/header.php');
?>
<?php
$successMessage = "";

if($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = $_POST["name"];
    $email = $_POST["email"];
    $subject = $_POST["subject"];
    $message = $_POST["message"];

    // Aquí después puedes guardar en base de datos si quieres

    $successMessage = "Your message has been sent successfully!";
}
?>

<div class="container mt-5 mb-5">

    <div class="card shadow-sm border-0">
        <div class="card-body p-5">

            <h1 class="text-center mb-3">Contact Us</h1>
            <p class="text-center text-muted mb-5">We'd love to hear from you</p>

            <!-- FORM -->
            <?php if($successMessage != ""): ?>
            <div class="alert alert-success text-center">
                <?php echo $successMessage; ?>
            </div>
            <?php endif; ?>

            <form method="post">
                
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <input type="text" class="form-control" name="name" placeholder="Your Name" required>
                    </div>

                    <div class="col-md-6 mb-3">
                        <input type="email" class="form-control" name="email" placeholder="Your Email" required>
                    </div>
                </div>

                <div class="mb-3">
                    <input type="text" class="form-control" name="subject" placeholder="Subject" required>
                </div>

                <div class="mb-3">
                    <textarea class="form-control" name="message" rows="4" placeholder="Your Message" required></textarea>
                </div>

                <button type="submit" class="btn btn-primary w-100">
                    Send Message
                </button>
            </form>

            <hr class="my-5">

            <!-- CONTACT INFO -->
            <div class="row text-center">

                <div class="col-md-4 mb-4">
                    <h5>Location</h5>
                    <p>
                        Aurora Collection<br>
                        Santa Cruz, Bolivia<br>
                        <a href="https://maps.app.goo.gl/g9YyHB3suWjmtHYw7" 
                           target="_blank" 
                           rel="noopener noreferrer">
                           View on Google Maps
                        </a>
                    </p>
                </div>

                <div class="col-md-4 mb-4">
                    <h5>Phone</h5>
                    <p>
                        <a href="tel:63313783">63313783</a><br>
                        Mon-Fri: 9am-6pm
                    </p>
                </div>

                <div class="col-md-4 mb-4">
                    <h5>Email</h5>
                    <p>
                        <a href="mailto:auroracollection@gmail.com">
                            auroracollection@gmail.com
                        </a>
                    </p>
                </div>

            </div>

            <hr class="my-4">

            <!-- SOCIAL MEDIA -->
            <div class="text-center">
                <h5 class="mb-3">Follow Us</h5>

                <a href="https://www.instagram.com/auroracollection" target="_blank" class="mx-3">
                    <i class="fab fa-instagram fa-2x"></i>
                </a>

                <a href="https://www.facebook.com/auroracollection" target="_blank" class="mx-3">
                    <i class="fab fa-facebook fa-2x"></i>
                </a>

                <a href="https://www.tiktok.com/@auroracollection" target="_blank" class="mx-3">
                    <i class="fab fa-tiktok fa-2x"></i>
                </a>
            </div>

        </div>
    </div>

</div>

<?php include(ROOT_PATH .'includes/footer.php'); ?>