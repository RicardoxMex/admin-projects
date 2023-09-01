
document.addEventListener('alpine:init', () => {
    Alpine.store('ENV', {
        token: (localStorage.getItem("token")) ? localStorage.getItem("token") : '',
        URL: 'https://admin-projects-production.up.railway.app/api',
        setToken(token) {
            this.token = token;
            localStorage.setItem('token', token);
        }
    })

    Alpine.store('Toast', {
        show(type = 'success', message = 'OK') {
            toastr.options = {
                "closeButton": true,
                "debug": false,
                "newestOnTop": false,
                "progressBar": false,
                "positionClass": "toast-top-right",
                "preventDuplicates": false,
                "onclick": null,
                "showDuration": "300",
                "hideDuration": "1000",
                "timeOut": "5000",
                "extendedTimeOut": "1000",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            }

            switch (type) {
                case "error":
                    toastr.error(message, "Error");
                    break;
                case "success":
                    toastr.success(message, "Success");
                    break;
                case "warning":
                    toastr.warning(message, "Warning");
                    break;
                default:
                    toastr.error(message, "Error");
                    break
            }
        }
    });

    Alpine.store('DisplayMode', {
        mode: (localStorage.getItem("DisplayMode")) ? localStorage.getItem("DisplayMode") : 'table',
        setMode(mode) {
            this.mode = mode;
            localStorage.setItem("DisplayMode", mode);
        }
    })

    Alpine.store('ProjectStore', {
        projects: [],
        updateState(projects) {
            this.projects = projects;
        }
    })

    Alpine.store('Tasks', {
        tasks: "Hola que hace",
        updateState() {
            console.log("Hola que hace uwu xd");
        }
    })
})