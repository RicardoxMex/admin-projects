<nav class="drawer" id="drawer">
    <ul>
        <li>
            <a href="/" class="text-lg">
                <i class="material-icons">home</i>
                Home
            </a>
        </li> 
        <li>
            <a href="/projects" class="text-lg">
                <i class="material-icons">folder_special</i>
                Projects
            </a>
        </li> 
        <?php if (isAuth()) { ?>
            <div class="drawer-footer">
                <div class="logout-section">

                    <a href="/auth/logout" data-turbolinks="false"><i class="material-icons">logout</i>Sign Out </a>
                </div>
            </div>
        <?php } else { ?>
            <div class="drawer-footer">
                <div class="logout-section">
                    <a href="/auth" data-turbolinks="false"><i class="material-icons">logout</i>Sign In</a>
                </div>
            </div>
        <?php } ?>
</nav>