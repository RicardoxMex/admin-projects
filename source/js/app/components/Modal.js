document.addEventListener('alpine:init', () => {
    Alpine.data('Modal', () => ({
        showModal: false,
        init() {
            console.log('initialized AdminProjects');
        }, 
        openModal(){
            this.showModal = true;
        },
        closeModal(){
            this.showModal = false;
        }
    }))
})