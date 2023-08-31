<div class="container" x-data="Auth" x-init>
    <section class="container-auth login background-body center">

        <div class="container login-menu">
            <button @click="showSingIn = true; showSingUp = false" id="menu-sign-in" class="login-menu-button" x-bind:class="showSingIn ? 'select-button-login' : '' ">SIGN IN</button>
            <button @click="showSingIn = false; showSingUp = true"  id="menu-sign-up" class="login-menu-button" x-bind:class="showSingUp ? 'select-button-login' : '' ">SIGN UP</button>
        </div>
        <form class="container form-content" x-show="showSingIn" x-cloak>
            <div class="login-form login-username">
                <label for="username_sing_in">EMAIL</label>
                <input x-model="data.email" type="text" name="email" id="email">
            </div>
            <div class="login-form login-password">
                <label for="password_sing_in">PASSWORD</label>
                <input x-model="data.password" type="password" name="password" id="password">
            </div>
            <div class="login-form login-bottom">
                <div class="remember">
                    <input type="checkbox" name="" id="">
                    <p>Remenber</p>
                </div>
                <button x-on:click="login" type="button" class="login-bottom-button">SING IN</button>
            </div>
        </form>
        <p x-text="data.username"></p>
        <form id="form-sign-up" class="container form-content" x-show="showSingUp" x-cloak>

            <div class="login-form login-username">
                <label for="username">USERNAME</label>
                <input type="text" name="username" id="username_sing_up">
            </div>
            <div class="login-form login-username">
                <label for="email">EMAIL</label>
                <input type="email" name="email" id="email_sing_up">
            </div>
            <div class="login-form login-password">
                <label for="password">PASSWORD</label>
                <input type="password" name="password" id="password_sing_up">
            </div>
            <div class="login-form login-password">
                <label for="onfirm_password">CONFIRM PASSWORD </label>
                <input type="password" name="confirm_password" id="confirm_password_sing_up">
            </div>
            <div class="login-form login-bottom">
                <button class="login-bottom-button">SING UP</button>
            </div>
        </form>
    </section>
</div>