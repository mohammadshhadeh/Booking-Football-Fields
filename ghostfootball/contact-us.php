<?php

include_once('includes/public_header.php');


?>


<section class="innerPage">
    <div class="page-header">
        <div class="container">
            <ul class="header-link">
                <li><a href="about-us.php">About Us</a></li>
                <li><a href="how-things-work.php">How Things Work</a></li>
                <li><a href="contact-us.php" class="active">Contact Us</a></li>

            </ul>
        </div>
    </div>
    <div class="contentMain">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-xs-12 template-main">
                    <div class="col-xs-12 block-box">
                        <div class="col-sm-12 col-xs-12">
                            <h4>TO BOOK A PITCH, ORGANIZE A GAME, OR FOR ANY OTHER ENQUIRIES, CONTACT US AT:</h4> 
                            <p><i class="fa fa-envelope circle-ic" aria-hidden="true"></i> contact@Ghostfootball.com</p>
                            <p><i class="fa fa-phone circle-ic" aria-hidden="true"></i> +65 9726 9110</p>
                            <p><i class="fa fa-mobile circle-ic" aria-hidden="true"></i> +65 9726 9110</p>     
                        </div>
                    </div>
                    <div class="col-xs-12 block-box margin-top10">
                            <div class="col-sm-12 col-xs-12">
                                <h4>QUICK CONTACT</h4>
                                <div class="row">
                                    <div class="col-sm-8 form-set">
                                        <form id="contact_form" action="mailto:al.wahdeet@gmail.com">
                                            <input class="form-control" name="name" placeholder="Name" type="text">
                                            <input class="form-control margin-top10" name="email" placeholder="Email" type="text">
                                            <input class="form-control margin-top10" name="phone" placeholder="Mobile Number" type="text">
                                            <input class="form-control margin-top10" name="title" placeholder="Title" type="text">
                                            <input type="hidden" value="contact" name="purpose">
                                            <textarea class="form-control margin-top10" name="message" placeholder="Message"></textarea>
                                            <button type="submit" class="btn btn-lg btn-primary min355 margin-top20imp">Send</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <?php
    include('includes/public_footer.php');
    ?>
