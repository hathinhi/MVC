<div>
    <div class="form">
        <form class="login-form" method="post" action="<?php echo site_url("Auth/login/run") ?>">
            <input type="text" name="username" placeholder="username"/>
            <input type="password" name="pass" placeholder="password"/>
            <a href="<?php echo site_url('signIn/pass')?>">Lấy lại mật khẩu!</a>
            <button>Login</button>
        </form>
    </div>
</div>