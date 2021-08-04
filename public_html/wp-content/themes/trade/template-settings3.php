<?php
/*
Template Name: Settings3
Template Post Type: post, page, product
 */

get_header();
?>

<br>
<div class="signals">
   <!-- <h1><?php echo get_the_title();?></h1>
   <?php echo the_content()?><br><br>
   <hr>-->
   <br> 
</div>
<div class="settings">
    <div class="setting_sidebar">
     <h5>Settings</h5>
     <hr style="width: 90%;margin: 30px auto;">
        <!-- <ul style="t">
            <li><a href="#">Account & Profile</a></li>
            <li><a href="#">Refferal</a></li>
            <li><a href="#">Subscription & Billing</a></li>
        </ul> -->
        <!-- setting_menu -->

        <?php 

        wp_nav_menu( [
            'theme_location'  => 'setting_menu',
            'menu'            => '',
            'container'       => false,
            'container_class' => '',
            'container_id'    => '',
            'menu_class'      => 'setting_menu_ul',
            'menu_id'         => '',
            'echo'            => true,
            'fallback_cb'     => 'wp_page_menu',
            'before'          => '',
            'after'           => '',
            'link_before'     => '',
            'link_after'      => '',
            'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
            'depth'           => 0,
            'walker'          => '',
        ] );

        ?>

    </div>
    <div class="setting_field">
        <div class="login_popup_form" id="login_popup_form">
            <h4>Forex Business</h4>
            <form action="">
                <p>Your subscription has 17 (included) signals per day. Your next payment of $20 (monthly) occurs on June 16, 2021</p>
                <div class="login_popup_form_btn">
                    <button  type="button" class="btn btn-nav-menu">MANAGE YOUR SUBSCRIPTION</button>
                </div>
            </form>
        </div>
        <hr>


        <div class="login_popup_form" id="login_popup_form" style="margin-bottom: 30px;">
            <h4>Order History</h4>
            <table class="referal_table">
                <thead>
                    <tr>
                        <th class="black03">Date</th>
                        <th class="black03">Type</th>
                        <th class="black03">Receipt</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>29 Apr 2021</td>
                        <td>Renewal</td>
                        <td class="col_039cfc"><a href="#">HTML</a> / <a href="#">PDF</a></td>
                        
                    </tr>
                    <tr>
                        <td>29 Apr 2021</td>
                        <td>Renewal</td>
                        <td class="col_039cfc"><a href="#">HTML</a> / <a href="#">PDF</a></td>
                    </tr>
                    <tr>
                        <td>29 Apr 2021</td>
                        <td>Renewal</td>
                        <td class="col_039cfc"><a href="#">HTML</a> / <a href="#">PDF</a></td>
                    </tr>
                    <tr>
                        <td>29 Apr 2021</td>
                        <td>Renewal</td>
                        <td class="col_039cfc"><a href="#">HTML</a> / <a href="#">PDF</a></td>
                    </tr>
                    <tr>
                        <td>29 Apr 2021</td>
                        <td>Renewal</td>
                        <td class="col_039cfc"><a href="#">HTML</a> / <a href="#">PDF</a></td>
                    </tr>
                    <tr>
                        <td>29 Apr 2021</td>
                        <td>Renewal</td>
                        <td class="col_039cfc"><a href="#">HTML</a> / <a href="#">PDF</a></td>
                    </tr>
                </tbody>
            </table>
        </div>

        <hr>


<!--   <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script>
  $( function() {
    $( "#datepicker" ).datepicker();
  } );
  </script>
 
 <input type="text" placeholder="mm/yy" id="datepicker">  -->


        <div class="login_popup_form" id="login_popup_form">
            <div >
                <h4>Payment Method On File</h4>
                <p>Visa ending in 2475 expiring 3/2024</p>

                <form action="" style="display: flex; flex-direction: column;" id="payment_method-card">
                    <label for="" class="label_text">Card Number</label>
                    <input id="number1" type="text" required placeholder="XXXX-XXXX-XXXX-XXXX" style="padding-left: 65px;">

                    <label for="" class="label_text">Expiration</label> 
                    <div style="display: flex; justify-content: space-between;" class="payment_method_num_cvc">

                        <input id="date" type="text" required placeholder="mm/yy">
                        <input id="date1" type="text" required placeholder="mm/yy">
                        <input id="cvc" type="text" required placeholder="XXX">
                    </div>

                    <label for=""  class="label_text">Postal / ZIP code</label>
                    <input id="zip_num" type="text" required placeholder="XXXXXX">

                    <div style="margin-top: 20px;">
                        <button style="margin-right: 20px;" type="button" class="btn btn-nav-menu">SAVE CHANGES</button>
                        <button  type="button" class="btn btn-outline-light" style="padding: 10px 36px; color: #000;">CLOSE</button>
                    </div>

                </form>
            </div>
        </div>
        <hr>

        <div class="login_popup_form" id="login_popup_form">
            <div >
                <h4>Receipt Info</h4>
                <p>We does not provide invoices, but if you need additional contact or tax information added to your receipts (business address, VAT number, etc.), enter it below and it will appear on all of your receipts.</p>
            </div>
        </div>

    </div>
</div>

<?php 
    do_action('eup_edit_options');
 ?>

<script src="https://unpkg.com/imask"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri() ?>/js/mack_form.js"></script>





<?php
get_footer();
