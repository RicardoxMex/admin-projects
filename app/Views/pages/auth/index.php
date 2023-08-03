<?= warning("validateUser") ?>
<div class="container">
    <section class="container-auth login background-body center">
        
        <div class="container login-menu">
            <a id="menu-sign-in" href="#sign-in" class="login-menu-button select-button-login"  data-turbolinks="false">SIGN IN</a>
            <a id="menu-sign-up" href="#sign-up"  class="login-menu-button"  data-turbolinks="false">SIGN UP</a>
        </div>
        <form id="form-sign-in" class="container form-content" method="post"  action="<?=route("auth/signIn")?>">
            <div class="login-form login-username">
                <label for="username_sing_in">USERNAME</label>
                <input type="text" name="username" id="username" value="<?= isset($data->username) ? $data->username : '' ?>">
            </div>
            <div class="login-form login-password">
                <label for="password_sing_in">PASSWORD</label>
                <input type="password" name="password" id="password" value="">
            </div>
            <div class="login-form login-bottom">
                <div class="remember">
                    <input type="checkbox" name="" id=""><p>Remenber</p>
                </div>
                <button class="login-bottom-button">SING IN</button>
            </div>
        </form>
        <form id="form-sign-up" class="container form-content hidden" method="post" action="<?=route("auth/signUp")?>">
            
            <div class="login-form login-username">
                <label for="username">USERNAME</label>
                <input type="text" name="username" id="username_sing_up" value="<?= isset($data->username) ? $data->username : '' ?>">
                <?= component("validation", ["input"=>"username"]) ?>
            </div>
            <div class="login-form login-username">
                <label for="email">EMAIL</label>
                <input type="email" name="email" id="email_sing_up" value="<?= isset($data->email) ? $data->email : ''  ?>" >
                <?= component("validation", ["input"=>"email"]) ?>
            </div>
            <div class="login-form login-password">
                <label for="password">PASSWORD</label>
                <input type="password" name="password" id="password_sing_up" value="<?= isset($data->password) ? $data->password : ''  ?>" >
                <?= component("validation", ["input"=>"password"]) ?>
            </div>
            <div class="login-form login-password">
                <label for="onfirm_password">CONFIRM PASSWORD </label>
                <input type="password" name="confirm_password" id="confirm_password_sing_up" value="<?= isset($data->confirm_password) ? $data->confirm_password : '' ?>" >
                <?= component("validation", ["input"=>"confirm_password"]) ?>
            </div>
            <div class="login-form login-bottom">
                <button class="login-bottom-button">SING UP</button>
            </div>
        </form>
    </section>
</div>

<script data-turbolinks="false">
    const menuSignIn = document.getElementById('menu-sign-in');
const menuSignUp = document.getElementById('menu-sign-up');
const formSignIn = document.getElementById('form-sign-in');
const formSignUp = document.getElementById('form-sign-up');

menuSignIn.addEventListener('click', function(){
    showSignIn();

})

menuSignUp.addEventListener('click', function(){
    showSignUp();
})

const showSignIn = () =>{
    formSignUp.classList.add('hidden');
    formSignUp.classList.remove('show');
    menuSignUp.classList.remove('select-button-login');

    formSignIn.classList.remove('hidden');
    formSignIn.classList.add('show');
    menuSignIn.classList.add('select-button-login');
}

const cleanSingIn = () =>{

}

const cleanSingUp = () =>{
    document.getElementById("username_sing_up").value = "";
    document.getElementById("email_sing_up").value = "";
    document.getElementById("password_sing_up").value = "";
    document.getElementById("confirm_password_sing_up").value = "";
}

const showSignUp = () =>{
    formSignIn.classList.add('hidden');
    formSignIn.classList.remove('show');
    menuSignIn.classList.remove('select-button-login');

    formSignUp.classList.remove('hidden');
    formSignUp.classList.add('show');
    menuSignUp.classList.add('select-button-login');
}

window.addEventListener("DOMContentLoaded", function(){
    var hash = window.location.hash;
    if(hash=="#sign-up"){
        showSignUp();
        cleanSingIn();
    }else if(hash=="#sign-in"){
        showSignIn();
        cleanSingUp();
    }
    var url = window.location.href;
    var path = url.split('/');
    var page = path[path.length - 1];
    if(page=="signUp"){
        showSignUp();
        cleanSingIn();
    }else if(page=="signIn"){
        showSignIn();
        cleanSingUp();
    }
})
</script>