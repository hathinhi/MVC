<div style="margin:20px">
    <?php if (isset($this->authUrl)){?>
        <div align="center">
            <h3>Login with Google -- Demo</h3>
           <div>Please click login button to connect to Google.</div>
           <a class="login" href="' . $authUrl . '"><img src="' . base_url('public/images/google-login-button.png') . '" /></a>
            </div>
    <?php } ?>
</div>