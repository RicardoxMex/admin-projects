<div x-data="{ modelOpen: false }">
    <button @click="modelOpen =!modelOpen"
        class="flex items-center justify-center px-3 py-2 space-x-2 text-sm tracking-wide text-white capitalize transition-colors duration-200 transform bg-indigo-500 rounded-md dark:bg-indigo-600 dark:hover:bg-indigo-700 dark:focus:bg-indigo-700 hover:bg-indigo-600 focus:outline-none focus:bg-indigo-500 focus:ring focus:ring-indigo-300 focus:ring-opacity-50">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd"
                d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z"
                clip-rule="evenodd" />
        </svg>

        <span>Invite Member</span>
    </button>

    <div x-show="modelOpen" class="fixed inset-0 z-50 overflow-y-auto" aria-labelledby="modal-title" role="dialog"
        aria-modal="true">
        <div class="flex items-end justify-center min-h-screen px-4 text-center md:items-center sm:block sm:p-0">
            <div x-cloak @click="modelOpen = false" x-show="modelOpen"
                x-transition:enter="transition ease-out duration-300 transform" x-transition:enter-start="opacity-0"
                x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-200 transform"
                x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
                class="fixed inset-0 transition-opacity bg-gray-500 bg-opacity-40" aria-hidden="true"></div>

            <div x-cloak x-show="modelOpen" x-transition:enter="transition ease-out duration-300 transform"
                x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                x-transition:leave="transition ease-in duration-200 transform"
                x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                class="inline-block w-full max-w-xl p-8 my-20 overflow-hidden text-left transition-all transform bg-white rounded-lg shadow-xl 2xl:max-w-2xl">
                <div class="flex items-center justify-between space-x-4">
                    <h1 class="text-xl font-medium text-gray-800 ">titulo</h1>

                    <button @click="modelOpen = false" class="text-gray-600 focus:outline-none hover:text-gray-700">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </button>
                </div>
                <form x-on:submit.prevent="submitForm" class="form">
                    <div class="form-group">
                        <label for="name">Project Name:</label>
                        <input type="text" id="name" x-model="name">
                        <p class="text-red-500" x-show="errors.name">{{ errors.name }}</p>
                    </div>
                    <div class="form-group">
                        <label for="description">Description:</label>
                        <textarea id="description" x-model="description" rows="4"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="start_date">Start Date:</label>
                        <input type="date" id="start_date" x-model="start_date">
                    </div>
                    <div class="form-group">
                        <label for="end_date">End Date:</label>
                        <input type="date" id="end_date" x-model="end_date">
                    </div>
                    <div class="form-group">
                        <label for="priority">Priority:</label>
                        <select id="priority" x-model="priority">
                            <option value="low">Low</option>
                            <option value="medium">Medium</option>
                            <option value="high">High</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="budget">Budget:</label>
                        <input type="number" id="budget" x-model="budget" step="0.01">
                    </div>
                    <div class="form-group">
                        <label for="estimated_time">Estimated Time:</label>
                        <input type="number" id="estimated_time" x-model="estimated_time" step="0.01">
                    </div>
                    <button type="submit" class="btn">Add Project</button>
                </form>
            </div>
        </div>
    </div>
</div>


<script>
    function formData() {
        return {
            name: '',
            description: '',
            start_date: '',
            end_date: '',
            priority: 'low',
            budget: '',
            estimated_time: '',

            errors: {},

            validateForm() {
                this.errors = {};

                if (!this.name) this.errors.name = 'Project name is required.';
                if (!this.description) this.errors.description = 'Description is required.';
                if (!this.start_date) this.errors.start_date = 'Start date is required.';
                if (!this.end_date) this.errors.end_date = 'End date is required.';
                if (!this.budget) this.errors.budget = 'Budget is required.';
                if (!this.estimated_time) this.errors.estimated_time = 'Estimated time is required.';
                
                // Agrega más validaciones según tus necesidades

                return Object.keys(this.errors).length === 0;
            },

            submitForm() {
                if (this.validateForm()) {
                    // Simulación de envío a través de API
                    const formData = {
                        name: this.name,
                        description: this.description,
                        start_date: this.start_date,
                        end_date: this.end_date,
                        priority: this.priority,
                        budget: this.budget,
                        estimated_time: this.estimated_time,
                    };
                    console.log('Form Data:', formData);

                    // Aquí puedes hacer una solicitud a la API para enviar los datos
                    // Ejemplo usando fetch:
                    // fetch('projects/store', {
                    //     method: 'POST',
                    //     body: JSON.stringify(formData),
                    //     headers: {
                    //         'Content-Type': 'application/json',
                    //     },
                    // })
                    // .then(response => response.json())
                    // .then(data => {
                    //     console.log('Response from API:', data);
                    // })
                    // .catch(error => {
                    //     console.error('Error:', error);
                    // });
                }
            },
        };
    }
</script>
