document.addEventListener('alpine:init', () => {
    Alpine.data('AdminProjects', () => ({
        init() {
            console.log('init AdminProjects');
        },
        
    }))
})

