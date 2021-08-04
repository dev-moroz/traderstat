<div class="bg_login_popup display_none">

 	<div class="login_popup_form display_none" id="login_popup_form">
 		<h4 class="tac">Login to Application</h4>
 		<form action="<?php bloginfo('url')?>/wp-login.php" name="loginform" method="post">
 			<label>Email</label>
 			<input name="log" type="text" placeholder="Enter your email...">
 			<label>Password</label>
 			<input name="pwd" type="password" placeholder="Enter your password...">

            <input type="hidden" name="redirect_to" value="<?php bloginfo('url')?>" />
            <input type="hidden" name="testcookie" value="1" />

 			<div class="login_popup_form_btn">
 				<div ><a href="#" id="fogot_ac">Forgot password?</a></div>
 				<button name="submit" type="submit" class="btn btn-nav-menu btn__close_popup" >LOGIN</button>
 			</div>
 		</form>
 		<hr>
 		<p class="tac">No have a account?<a href="#" id="create_new_ac" > Create new account</a></p>
 	</div>

<!-- =-========================================== -->




 	<div class="login_popup_form display_none" id="register_popup_form">
 		<h4 class="tac">Create new account</h4>
 		

    <form action="" method="POST">
        <?php wp_nonce_field( 'registration', 'registration_nonce' ) ?>
        <label>Email</label>
        <input type="email" name="email" placeholder="Enter your email..." required="required"/>
        <label>Password</label>
        <input type="password" name="password" placeholder="Enter your password..." required="required"/>
        <label>Name (oprional)</label>
        <input type="text" name="username" placeholder="Your full name" required="required"/>
        <button  name="submit" type="submit" class="btn btn-nav-menu btn__close_popup" id="btn__close_popup2" >CREATE ACCOUNT</button>
    </form>

 		<hr>
 		<p class="tac">Already have a account? <a href="#" id="login_to_ac1" >Login</a></p>
 	</div>


 	<div class="login_popup_form display_none" id="restore_popup_form">
 		<h4 class="tac">Restore password</h4>
 		<div>

 		</div>
        <form name="resetpassform" id="resetpassform" action="<?php bloginfo('url')?>/wp-login.php?action=lostpassword" method="post" autocomplete="off">
 			<div id="restore_popup_form-mess">Enter the email you provided when creating. We will send a letter to him with further instructions.</div> 		
 			<div class="login_popup_form_btn" id="restore_popup_form_btn">
 				<label>Email</label>
 				<div style="color:#ff375d;" id="invalid_email_popup"></div>
 			</div>
 			<input name="user_login" type="email" placeholder="Enter your email..." class="input_restore_popup_form">
 			<button  name="submit" type="submit" class="btn btn-nav-menu btn__close_popup" id="btn__close_popup3">Send email</button>
 		</form>
 		<hr>
 		<p class="tac">I remembered my password!  <a href="#" id="login_to_ac2" >Login</a></p>

 	</div>


    <div class="login_popup_form display_none" id="new_pass_popup_form">
        <h4 class="tac">Set new password</h4>
        <div>

        </div>
        <form action="">
            <div id="restore_popup_form-mess">Enter the email you provided when creating. We will send a letter to him with further instructions.</div>
            <!-- <label>Email</label> -->
            <div class="login_popup_form_btn" id="new_pass_popup_form_btn">
                <label>New password</label>
                <div style="color:#ff375d;" id="invalid_email_popup"></div>
            </div>
            <input type="email" placeholder="Enter new password…" class="input_restore_popup_form">
             <div class="login_popup_form_btn" id="new_pass_popup_form_btn">
                <label>Confirm new password</label>
                <div style="color:#ff375d;" id="invalid_email_popup"></div>
            </div>
            <input type="email" placeholder="Confirm new password…" class="input_restore_popup_form">
            <button  type="button" class="btn btn-nav-menu btn__close_popup" id="btn__close_popup4">SET PASSWORD</button>
        </form>
        <hr>
    </div>


 </div>