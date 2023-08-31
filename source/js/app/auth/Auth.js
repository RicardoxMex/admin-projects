document.addEventListener('alpine:init', () => {
    Alpine.data('Auth', () => ({
        url: Alpine.store('ENV').URL + '/auth',
        data: {
            email: '',
            password: '',
        },
        showSingIn: true,
        showSingUp: false,
        init() {
            console.log(this.url);
        },
        login() {
            console.log(this.data.email);
            var header = {
                headers: {
                    'Content-type': 'application/json',
                },
                method: 'POST',
                body: JSON.stringify(this.data)
            };
            fetch(this.url, header)
                .then(data => data.json())
                .then((response) => {
                    console.log(response.data.token);
                    if (response.status == 200) {
                        Alpine.store('ENV').setToken(response.data.token);
                        Turbolinks.visit("/", { action: "replace" })
                    }
                }).catch((error) => console.log(error));

        }
    }))
})