<?php include "includes/dibi/db.php"; ?>
<?php include "includes/header.php"; ?>

<?php

if (isset($_POST['submit'])) {

    ini_set('display_errors', 1);
    error_reporting(E_ALL);

    $from = "rurouni@sinaudewek.online";
    $to = $_POST['email'];
    $subject = wordwrap($_POST['subject'], 70);
    $body = $_POST['body'];
    $header = "From :" . $from;

    mail($to, $subject, $body, $header);

    echo "Your Email Has Been Sent";
}


?>

<!-- Navigation -->

<?php include "includes/navigation.php"; ?>


<!-- Page Content -->
<div class="container">

    <section id="login">
        <div class="container">
            <div class="row">
                <div class="col-xs-6 col-xs-offset-3">
                    <div class="form-wrap">
                        <h1>Contact</h1>
                        <form role="form" action="contact.php" method="post" id="login-form" autocomplete="off">
                            <div class="form-group">
                                <label for="email" class="sr-only">username</label>
                                <input type="email" name="email" id="email" class="form-control" placeholder="Enter your email">
                            </div>
                            <div class="form-group">
                                <label for="subject" class="sr-only">Subject</label>
                                <input type="text" name="subject" id="subject" class="form-control" placeholder="Enter your email subject">
                            </div>
                            <div class="form-group">
                                <label for="password" class="sr-only">Message</label>
                                <textarea name="body" id="body" class="form-control" placeholder="Enter your message" cols="50" rows="10"></textarea>
                            </div>

                            <input type="submit" name="submit" id="btn-login" class="btn btn-primary btn-block" value="Send Email">
                        </form>

                    </div>
                </div> <!-- /.col-xs-12 -->
            </div> <!-- /.row -->
        </div> <!-- /.container -->
    </section>


    <hr>



    <?php include "includes/footer.php"; ?>