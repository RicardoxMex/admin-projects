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
    <button onclick="handleHeaderClicked('projects')">
        <span class="material-symbols-outlined">
            folder_special
        </span>
        <span>Projects</span>
        <span class="material-symbols-outlined"> expand_more </span>
    </button>
    <div id="projects" class="subnav">
        <div class="subnav-inner">
            <a href="/projects" data-turbolinks="true">
                <button>
                    <span>Projects</span>
                </button>
            </a>
            <a href="/projects" data-turbolinks="true">
                <button>
                    <span>Project Status</span>
                </button>
            </a>
            <a href="/projects/create" data-turbolinks="true">
                <button>
                    <span>Create Porject</span>
                </button>
            </a>
        </div>
    </div>
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


    <button onclick="handleHeaderClicked('projects')">
        <span class="material-symbols-outlined">
            folder_special
        </span>
        <span>Projects</span>
        <span class="material-symbols-outlined"> expand_more </span>
    </button>
    <div id="projects" class="subnav">
        <div class="subnav-inner">
            <a href="/projects" data-turbolinks="true">
                <button>
                    <span>Projects</span>
                </button>
            </a>
            <a href="/projects" data-turbolinks="true">
                <button>
                    <span>Project Status</span>
                </button>
            </a>
            <a href="/projects/create" data-turbolinks="true">
                <button>
                    <span>Create Porject</span>
                </button>
            </a>
        </div>
    </div>
    <button onclick="handleHeaderClicked('tasks')">
        <span class="material-symbols-outlined">
            list_alt
        </span>
        <span>Tasks</span>
        <span class="material-symbols-outlined"> expand_more </span>
    </button>
    <div id="tasks" class="subnav">
        <div class="subnav-inner">
            <a href="/tasks/create" data-turbolinks="true">
                <button>
                    <span>Tasks</span>
                </button>
            </a>
            <a href="/tasks/create" data-turbolinks="true">
                <button>
                    <span>Create Task</span>
                </button>
            </a>
        </div>
    </div>
    <a href="/<?= user() ?>">
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
 
    <a href="/auth" data-turbolinks="false">
        <button>
            <span class="material-symbols-outlined"> logout </span>
            <span>Sign In</span>
        </button>
    </a>

</aside>