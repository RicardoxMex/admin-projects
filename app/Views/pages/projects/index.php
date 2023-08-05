<div class="container">
    <div class="header-content">
        <div>
            <h2 class="title-web"><?= $title ?></h2>
        </div>
        <div>
            <a href="<?= route('projects/create') ?>" class="btn btn-icon-only btn-opacity">
                <span class="material-symbols-outlined">
                    add
                </span>
            </a>
            <button id="btn-grid" class="btn btn-icon-only btn-opacity">
                <span class="material-symbols-outlined">
                    grid_view
                </span>
            </button>
            <button id="btn-list" class="btn btn-icon-only btn-opacity">
                <span class="material-symbols-outlined">
                    list
                </span>
            </button>
        </div>
    </div>

    <div id="grid" class="grid">
        <a class="card glass" href="#">
            <div class="card-header">
                <h2>Project Name</h2>
                <p class="description">Project Description Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
            </div>
            <div class="card-body">
                <div class="status">
                    <p><strong>Status:</strong> <span class="status-badge in-progress">In Progress</span></p>
                </div>
                <div class="progress-container">
                    <div class="progress-bar" style="width: 75%;">
                        <span class="progress-label">75%</span>
                    </div>
                </div>
                <div class="end-date">
                    <p><strong>End Date:</strong> 2023-12-31</p>
                </div>
            </div>
        </a>
        <div class="card glass">
            <div class="card-header">
                <h2>Project Name</h2>
                <p class="description">Project Description Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
            </div>
            <div class="card-body">
                <div class="status">
                    <p><strong>Status:</strong> <span class="status-badge in-progress">In Progress</span></p>
                </div>
                <div class="progress-container">
                    <div class="progress-bar" style="width: 75%;">
                        <span class="progress-label">75%</span>
                    </div>
                </div>
                <div class="end-date">
                    <p><strong>End Date:</strong> 2023-12-31</p>
                </div>
            </div>
        </div>
        <div class="card glass">
            <div class="card-header">
                <h2>Project Name</h2>
                <p class="description">Project Description Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
            </div>
            <div class="card-body">
                <div class="status">
                    <p><strong>Status:</strong> <span class="status-badge in-progress">In Progress</span></p>
                </div>
                <div class="progress-container">
                    <div class="progress-bar" style="width: 75%;">
                        <span class="progress-label">75%</span>
                    </div>
                </div>
                <div class="end-date">
                    <p><strong>End Date:</strong> 2023-12-31</p>
                </div>
            </div>
        </div>

    </div>
    <div id="table">
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th class="td-name">Name</th>
                    <th class="td-description">Description</th>
                    <th class="td-date">Start Date</th>
                    <th class="td-date">End Date</th>
                    <th class="td-status">Status</th>
                    <th>Progress</th>
                    <th>Priority</th>
                    <th>Budget</th>
                    <th>Estimated Time</th>
                    <th></th>

                </tr>
            </thead>
            <tbody>
                <tr class="opacity-5">
                    <td>1</td>
                    <td>Calendario de actividades</td>
                    <td class="td-description">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quis commodi nobis excepturi eveniet, sunt incidunt nemo facilis. Aliquid ex repellendus quia, ipsum in dicta velit fugit eveniet tempore quisquam animi.</td>
                    <td class="td-date">2023-08-01</td>
                    <td class="td-date">2023-12-31</td>
                    <td><span class="status-box status-success"> In Progress</span></td>
                    <td>
                        <progress class="progress" value="75" max="100">75%</progress>
                    </td>
                    <td>High</td>
                    <td>$10000.00</td>
                    <td>120 hours</td>
                    <td class="btn-group">
                        <button class=" btn btn-success btn-icon-only">
                            <span class="material-symbols-outlined">
                                visibility
                            </span>
                        </button>
                        <button class=" btn btn-icon-only">
                            <span class="material-symbols-outlined">
                                edit
                            </span>
                        </button>
                        <button class="btn btn-danger btn-icon-only">
                            <span class="material-symbols-outlined">
                                delete
                            </span>
                        </button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

