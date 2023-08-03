<aside class="sidebar" data-turbolinks-permanent>
    <header>
        <img src="<?= img('logo.svg')?>" />
        <span> DataHub </span>
    </header>
    <a href="/">
        <button>
            <span class="material-symbols-outlined"> home </span>
            <span>Home</span>
        </button>
    </a>

    <?php if(isAuth()) { ?>
    <a href="/board">
        <button>
            <span class="material-symbols-outlined">
                grid_view
            </span>
            <span>Activity Board</span>
        </button>
    </a>

    <a href="/projects">
        <button>
            <span class="material-symbols-outlined">
                folder_special
            </span>
            <span>Projects</span>
        </button>
    </a>

    <a href="/tasks">
        <button>
            <span class="material-symbols-outlined">
                list_alt
            </span>
            <span>Tasks</span>
        </button>
    </a>
    <a href="/profile">
        <button>
            <span class="material-symbols-outlined"> account_circle </span>
            <span>Profile</span>
        </button>
    </a>
    <a href="/auth/logout" data-turbolinks="false">
        <button>
            <span class="material-symbols-outlined"> logout </span>
            <span>Sign Out</span>
        </button>
    </a>

    <?php }else{ ?>
    <a href="/auth" data-turbolinks="false">
        <button>
            <span class="material-symbols-outlined"> logout </span>
            <span>Sign In</span>
        </button>
    </a>
    <?php } ?>
</aside>