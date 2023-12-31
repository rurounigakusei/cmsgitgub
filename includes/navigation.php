<?php include "includes/dibi/db.php"; ?>
<?php include "includes/header.php"; ?>
<?php //include "admin/functions.php";
?>

<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">

        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php">(CMS) Content Management System</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <?php
                $query = "SELECT * FROM categories";
                $show_all_categories_sidebar = mysqli_query($connection, $query);
                while ($row = mysqli_fetch_assoc($show_all_categories_sidebar)) {
                    $cat_title = $row['cat_title'];
                    $cat_id = $row['cat_id'];

                    $category_class = '';
                    $registration_class = '';
                    $contact_class = '';

                    $pagename = basename($_SERVER['PHP_SELF']);

                    if (isset($_GET['category']) && $_GET['category'] == $cat_id) {
                        $category_class = 'active';
                    } else if ($pagename == 'registration.php') {
                        $registration_class = 'active';
                    } else if ($pagename == 'contact.php') {
                        $contact_class = 'active';
                    }

                    //echo "<li class ='$category_class'><a href='category.php?category={$cat_id}'>{$cat_title}</a></li>";
                } ?>

                <!-- lesson 289
                 we can execute html code between php using form like below : -->
                <!--
                    <'?php if(any condition/ function()): ?>
                some html code,,...
                and open again like below : 
                <'?php else;?> etc...
                <'?php endif;?>
                -->
                <?php //if (isLoggedIn()) :
                ?>
                <li>
                    <a href='admin/index.php'>Admin</a>
                </li>
                <!-- <li>
                        <a href='admin/includes/logout.php'>Logout</a>
                    </li> -->

                <?php //else :
                ?>
                <li>
                    <!-- skipped cz have been served by previous login feature -->
                    <!-- <a href='login.php'>Login</a> -->
                </li>

                <?php //endif;
                ?>


                <li class='<?php echo $registration_class; ?>'>
                    <a href="registration.php">Registration</a>
                    <!-- <a><?php //$pagename = basename($_SERVER['PHP_SELF']); {
                            //echo $pagename;
                            // } 
                            ?></a> -->
                </li>
                <li class='<?php echo $contact_class; ?>'>
                    <a href="contact.php">Contact</a>
                </li>


            </ul>
        </div>

        <!-- /.navbar-collapse -->

    </div>

    <!-- /.container -->

</nav>