<?= component('projects.modal-create') ?>
<div class="container">
    <div class="header-content">
        <div>
            <h2 class="title-web">
                <?= $title ?>
            </h2>
        </div>
        <div>
            <button onclick="modalHandler(true, 'modal-projects-create' )" class="btn btn-icon-only btn-opacity">
                <span class="material-symbols-outlined">
                    add
                </span>
            </button>
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
        <?php foreach ($projects as $project) { ?>
            <a class="card glass" href="<?= route('projects/' . $project->slug) ?>">
                <div class="card-header">
                    <h2>
                        <?= $project->name ?>
                    </h2>
                    <p class="description">
                        <?= $project->description ?>
                    </p>
                </div>
                <div class="card-body">
                    <div class="status">
                        <p><strong>Status:</strong> <span class="status-badge in-progress">
                                <?= $project->status ?>
                            </span></p>
                    </div>
                    <div class="progress-container">
                        <div class="progress-bar" style="<?= "width: $project->progress %;" ?>">
                            <span class="progress-label">
                                <?= $project->progress ?>
                            </span>
                        </div>
                    </div>
                    <div class="end-date">
                        <p><strong>End Date:</strong>
                            <?= $project->end_date ?>
                        </p>
                    </div>
                </div>
            </a>
        <?php } ?>
        <!-- <div class="card glass">
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
        </div> -->


    </div>
    <div id="table">
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th class="td-name"></th>
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
                <?php foreach ($projects as $project) { ?>
                    <tr class="">
                        <td>
                            <?= $project->id ?>
                        </td>
                        <td>
                            <?= $project->name ?>
                        </td>
                        <td class="td-description">
                            <?= $project->description ?>
                        </td>
                        <td class="td-date">
                            <?= $project->start_date ?>
                        </td>
                        <td class="td-date">
                            <?= $project->end_date ?>
                        </td>
                        <td><span class="status-box status-success">
                                <?= $project->status ?>
                            </span></td>
                        <td>

                            <div class="w-full  rounded-full dark:bg-gray-400">
                                <div class="bg-green-600 text-xs font-medium text-blue-100 text-center p-0.5 leading-none rounded-full"
                                    style="width: 45%"> 45%</div>
                            </div>

                        </td>
                        <td>
                            <?= $project->priority ?>
                        </td>
                        <td>
                            <?= $project->budget ?>
                        </td>
                        <td>
                            <?= $project->estimated_time . ' HRS' ?>
                        </td>
                        <td class="btn-group">
                            <a class=" btn btn-success btn-icon-only" href="<?= route('projects/' . $project->slug) ?>">
                                <span class="material-symbols-outlined">
                                    visibility
                                </span>
                            </a>
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
                <?php } ?>
            </tbody>
        </table>


    </div>

    <div class="pagination">
        <?php
        $totalPages = ceil($totalProjects / $projectsPerPage);

        $currentPage = isset($_GET['page']) ? intval($_GET['page']) : 1;

        $numLinksToShow = 5; // Número de enlaces a mostrar en cada extremo
        
        echo '<a href="?page=1">First</a>';

        // Mostrar botón para la página anterior si no estamos en la primera página
        if ($currentPage > 1) {
            echo '<a href="?page=' . ($currentPage - 1) . '">Previous</a>';
        }

        // Mostrar enlaces de las páginas siguientes
        for ($i = $currentPage + 1; $i <= min($currentPage + $numLinksToShow, $totalPages); $i++) {
            echo '<a href="?page=' . $i . '">' . $i . '</a>';
        }

        // Si hay más de $numLinksToShow páginas después de la página actual, mostrar puntos suspensivos
        if ($totalPages > $currentPage + $numLinksToShow) {
            echo '<span>...</span>';
        }

        // Mostrar botón para la página siguiente si no estamos en la última página
        if ($currentPage < $totalPages) {
            echo '<a href="?page=' . ($currentPage + 1) . '">Next</a>';
        }

        echo '<a href="?page=' . $totalPages . '">Last</a>';
        ?>
    </div>
</div>

<style>
    .pagination {
        display: flex;
        justify-content: center;
        margin-top: 20px;
    }

    .pagination a {
        padding: 5px 10px;
        margin: 0 5px;
        border: 1px solid #ccc;
        text-decoration: none;
    }

    .pagination .active {
        background-color: #007bff;
        color: white;
        border: 1px solid #007bff;
    }
</style>