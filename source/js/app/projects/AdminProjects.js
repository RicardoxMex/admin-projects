document.addEventListener('alpine:init', () => {
    const Holas = Alpine.data('AdminProjects', () => ({
        init(){
            console.log('init AdminProjects');
        }
    }))
})

