<header class="container top-bar">
    <div class="wrap clearfix">
        <h1>UYAAG</h1>
        <div class="actions clearfix">
			<?php if($sf_user->isAuthenticated()) { ?>
				<?php echo "Hello, ".$sf_user->getAttribute('name')."!&nbsp;&nbsp;"; ?>
				<a href="<?php echo "" ?>">Log Out</a>
			<?php } else { ?>
				<a href="<?php echo url_for('register') ?>">Sign Up</a>
				<a href="<?php echo url_for('login') ?>">Log In</a>
			<?php } ?>
        </div>        
    </div>
</header>
