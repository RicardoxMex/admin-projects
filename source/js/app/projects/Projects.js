document.addEventListener('alpine:init', () => {

    Alpine.data('Projects', () => ({
        url: Alpine.store('ENV').URL + '/projects',
        token: Alpine.store('ENV').token,
        project_id: 0,
        projectData: {
            id: 0,
            name: '',
            description: '',
            start_date: '',
            end_date: '',
            priority: 'low',
            budget: 0,
            estimated_time: 0,
            user_id: 0,
        },
        test:null,
        validation: null,
        edit: false,
        showConfirm: false,
        showModalProject: false,
        datosCargados: false,
        init() {
            this.fetchProjects();
        },
        fetchProjects() {
            axios.get(this.url, {
                headers: {
                    'Content-type': 'application/json',
                    Authorization: `Bearer ${this.token}`
                }
            })
            .then(response => {
                // Handle successful response here
                console.log(response.data); // Access response data
            })
            .catch(error => {
                // Handle error here
                console.error(error);
            });
        },
        async addProject () {
            let response = await axios.post(this.url, this.projectData, {
                'Content-type': 'application/json',
                Authorization: `Bearer ${this.token}`
            })
            console.log(response);
            this.fetchProjects();
        },
        updateProject(){
            this.crud(this.url + '/' + this.project_id, this.headerAPI('PUT', this.projectData), "Project updated successfully")
            this.fetchProjects();
        },
        deleteProject() {
            this.crud(this.url + '/' + this.project_id, this.headerAPI('DELETE', null), "Project deleted successfully")
            this.fetchProjects();
        },
        crud(url, header, mesage = "OK") {
            fetch(url, header)
                .then(response => response.json())
                .then(response => {
                    console.log(response.status)
                    if (response.status == 200) {
                        Alpine.store('Toast').show('success', mesage);
                        this.resetData()
                    } else if (response.status = 400) {
                        this.validation = response.message
                    } else if (response.status == 404) {
                        Alpine.store('Toast').show('error', response.message);
                    }
                }).catch(error => console.log(error))
        },
        headerAPI(method, dataForm) {
            return {
                headers: {
                    'Content-type': 'application/json',
                    Authorization: `Bearer ${this.token}`
                },
                method: method,
                body: JSON.stringify(dataForm)
            }
        },
        resetData() {
            this.projectData = {
                id: 0,
                name: '',
                description: '',
                start_date: '',
                end_date: '',
                priority: 'low',
                budget: 0,
                estimated_time: 0,
                user_id: 0,
            }
            this.showModalProject = false
            this.edit = false
        }
    }))
})
