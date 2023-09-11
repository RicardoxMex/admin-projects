document.addEventListener('alpine:init', () => {
    Alpine.data('Auth', () => ({
        url: Alpine.store('ENV').URL + '/auth',
        urlRegister: Alpine.store('ENV').URL + '/auth/signin',
        data: {
            email: '',
            password: '',
        },
        dataRegister: {
            username: '',
            email: '',
            password: '',
            confirm_password: ''
        },
        validation: [],
        showSingIn: true,
        showSingUp: false,
        init() {
            console.log(this.url);
        },
        login() {
            var header = {
                headers: {
                    'Content-type': 'application/json',
                },
                method: 'POST',
                body: JSON.stringify(this.data)
            };
            fetch(this.url, header)
                .then(data => {
                    return data.json()
                })
                .then((response) => {
                    if (response.status == 400) {
                        Alpine.store('Toast').show('error', response.message);
                    }
                    if (response.status == 200) {
                        Alpine.store('ENV').setToken(response.data.token);
                        Turbolinks.visit("/", { action: "replace" })
                    }
                }).catch((error) => console.log(error));

        },
        register() {
            var header = {
                headers: {
                    'Content-type': 'application/json',
                },
                method: 'POST',
                body: JSON.stringify(this.dataRegister)
            };
            fetch(this.urlRegister, header)
                .then(data => {
                    return data.json()
                })
                .then((response) => {
                    if (response.status == 200) {
                        Alpine.store('ENV').setToken(response.data.token);
                        Turbolinks.visit("/", { action: "replace" })
                    }

                    if (response.status == 400) {
                        this.validation = response.message;
                    }

                    if (response.status == 409) {
                        this.validation = []
                        Alpine.store('Toast').show('warning', response.message);
                    }
                }).catch((error) => console.log(error));
        },
        resetData(){
            this.data ={
                email: '',
                password: '',
            } 

            this.dataRegister= {
                username: '',
                email: '',
                password: '',
                confirm_password: ''
            }

            this.validation = []
        }
    }))
})