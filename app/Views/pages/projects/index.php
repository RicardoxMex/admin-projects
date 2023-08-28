<div class="container" x-data="crudProjects" x-init="init">
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
        holas
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
                            <a class=" btn btn-success btn-icon-only" :href="'<?= HTTP_HOST?>/projects/'+project.slug">
                                <span class="material-symbols-outlined">
                                    visibility
                                </span>
                            </a>
                            <button class=" btn btn-icon-only"
                                @click="showModalProject = true; edit=true; editProject(project)">
                                <span class="material-symbols-outlined">
                                    edit
                                </span>
                            </button>
                            <button @click="showConfirm = true; id_project=project;"
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




    <script>
        function crudProjects() {
            return {
                id: 0,
                name: '',
                description: '',
                start_date: '',
                end_date: '',
                priority: 'low',
                budget: 0,
                estimated_time: 0,
                validation: null,
                edit: false,

                showConfirm: false,
                showModalProject: false,
                datosCargados: false,
                id_project: 0,

                projects: [],

                url: '<?= HTTP_HOST . "/api/projects" ?>',
                token: '<?= token() ?>',
                user_id: '<?= user_id() ?>',

                init: function () {
                    console.log('init');
                    this.fetchProjects();
                },
                fetchProjects: function () {
                    const header = {
                        headers: {
                            'Content-type': 'application/json',
                            Authorization: `Bearer ${this.token}`
                        },
                        method: "GET",
                    };

                    fetch(this.url, header)
                        .then(data => data.json())
                        .then((response) => {
                            this.datosCargados = (response[0].id != undefined)
                            if (this.datosCargados) {
                                this.projects = response
                                Alpine.store('ProjectStore').projects = response
                            }
                        })
                        .catch(responseError => console.log(responseError))
                },
                addProject: function () {

                    var dataForm = {
                        user_id: this.user_id,
                        name: this.name,
                        description: this.description,
                        start_date: this.start_date,
                        end_date: this.end_date,
                        priority: this.priority,
                        budget: this.budget,
                        estimated_time: this.estimated_time
                    }
                    this.crud(this.url, "POST", dataForm, "Project created successfully")

                    this.fetchProjects();
                },
                editProject: function (project) {
                    this.id = project.id;
                    this.name = project.name;
                    this.description = project.description;
                    this.start_date = project.start_date;
                    this.end_date = project.end_date;
                    this.priority = project.priority;
                    this.budget = project.budget;
                    this.estimated_time = project.estimated_time;
                },
                updateProject: function () {
                    var dataForm = {
                        id: this.id,
                        user_id: this.user_id,
                        name: this.name,
                        description: this.description,
                        start_date: this.start_date,
                        end_date: this.end_date,
                        priority: this.priority,
                        budget: this.budget,
                        estimated_time: this.estimated_time
                    };
                    this.crud(this.url + '/' + this.id, "PUT", dataForm, "Project updated successfully");
                    this.fetchProjects();
                },
                deleteProject: function () {
                    this.crud(this.url + '/' + this.id_project.id, "DELETE", null, "Project deleted successfully")
                    this.fetchProjects();
                },
                crud: function (url, method = "POST", dataForm, message = "OK") {
                    var header = {
                        headers: {
                            'Content-type': 'application/json',
                            Authorization: `Bearer ${this.token}`
                        },
                        method: method,
                        body: JSON.stringify(dataForm)
                    };
                    fetch(url, header)
                        .then(data => data.json())
                        .then((response) => {
                            console.log(response);
                            if (response.status == "200") {
                                toastr.success(message);
                                this.resetData();
                            } else if (response.status == "400") {
                                console.log(response.message);
                                this.validation = null;
                                this.validation = response.message
                            } else {
                                toastr.success(response.message);
                            }
                        })
                        .catch(responseError => console.log(responseError))
                },
                resetData: function () {
                    this.name = '';
                    this.description = '';
                    this.start_date = '';
                    this.end_date = '';
                    this.priority = 'low';
                    this.budget = 0;
                    this.estimated_time = 0;
                    this.validation = null;
                    this.showModalProject = false;
                    this.edit = false;
                }
            }
        }
    </script>