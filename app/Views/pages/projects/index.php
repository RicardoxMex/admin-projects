<div class="container" x-data="Projects" x-init>
    <div x-show="showConfirm" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50" x-cloak>
        <div x-show="showConfirm" class="bg-white p-4 rounded shadow" x-transition>
            <p class="mb-4">¿Deseas eliminar este elemento?</p>
            <div class="flex justify-end">
                <button @click="showConfirm = false" class="text-gray-600 mr-2">Cancelar</button>
                <button @click="showConfirm = false" x-on:click="deleteProject()"
                    class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded">
                    Confirmar
                </button>
            </div>
        </div>
    </div>
    <div x-show="showModalProject" x-cloak x-transition>
        <?= component('projects.modal-create') ?>
    </div>
    <div class="header-content">
        <div>
            <h2 class="title-web">
                <?= $title ?>
            </h2>
        </div>
        <div>
            <button @click="showModalProject = true" class="btn btn-icon-only btn-opacity" data-modal="modal">
                <span class="material-symbols-outlined">
                    add
                </span>
            </button>
            <button id="btn-list" class="btn btn-icon-only btn-opacity" @click="$store.DisplayMode.setMode('table')"
                x-bind:class="($store.DisplayMode.mode == 'table')? 'select-btn' : ''">
                <span class="material-symbols-outlined">
                    list
                </span>
            </button>
            <button id="btn-grid" class="btn btn-icon-only btn-opacity" @click="$store.DisplayMode.setMode('grid')"
                x-bind:class="($store.DisplayMode.mode == 'grid')? 'select-btn' : ''">
                <span class="material-symbols-outlined">
                    grid_view
                </span>
            </button>
        </div>
    </div>
    <div x-show="$store.DisplayMode.mode=='grid'" id="grid" class="grid">
        <template x-show="datosCargados" x-for="project in $store.ProjectStore.projects" :key="project.id">
            <a class="card glass" :href="'<?= HTTP_HOST ?>/projects/'+project.slug">
                <div class="card-header">
                    <h2 x-text="project.name"></h2>
                    <p class="description" x-text="project.description"></p>
                </div>
                <div class="card-body">
                    <div class="status">
                        <p><strong>Status:</strong> 
                        <span class="status-badge in-progress" x-text="project.status">
                            </span></p>
                    </div>
                    <div class="progress-container">
                        <div class="progress-bar" style="<?= "width: $project->progress %;" ?>">
                            </span>
                        </div>
                    </div>
                    <div class="end-date">
                        <p>
                            <strong x-text="'End Date:'+project.end_date"></strong>
                        </p>
                    </div>
                </div>
            </a>
        </template>
    </div>
    <div x-show="$store.DisplayMode.mode=='table'" id="table" x-cloak>
        <table class="table">
            <thead>
                <tr>
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
                <tr>
            </thead>
            <tbody>
                <template x-show="datosCargados" x-for="project in $store.ProjectStore.projects" :key="project.id">
                    <tr>
                        <td x-text="project.name"></td>
                        <td class="td-description" x-text="project.description"></td>
                        <td class="td-date" x-text="project.start_date"></td>
                        <td class="td-date" x-text="project.end_date"></td>
                        <td><span class="status-box status-success" x-text="project.status"></span></td>
                        <td>
                            <div class="w-full  rounded-full dark:bg-gray-400">
                                <div class="bg-green-600 text-xs font-medium text-blue-100 text-center p-0.5 leading-none rounded-full"
                                    style="width: 45%" x-text="project.progress+'%'"></div>
                            </div>
                        </td>
                        <td x-text="project.priority"></td>
                        <td x-text="project.budget"></td>
                        <td x-text="project.estimated_time+' HRS'"></td>
                        <td class="btn-group">
                            <a class=" btn btn-success btn-icon-only" :href="'<?= HTTP_HOST ?>/projects/'+project.slug">
                                <span class="material-symbols-outlined">
                                    visibility
                                </span>
                            </a>
                            <button class=" btn btn-icon-only"
                                @click="showModalProject = true; edit=true; projectData=project;">
                                <span class="material-symbols-outlined">
                                    edit
                                </span>
                            </button>
                            <button @click="showConfirm = true; project_id=project.id;"
                                class="btn btn-danger btn-icon-only">
                                <span class="material-symbols-outlined">
                                    delete
                                </span>
                            </button>
                        </td>
                    </tr>
                </template>
            </tbody>
        </table>

    </div>