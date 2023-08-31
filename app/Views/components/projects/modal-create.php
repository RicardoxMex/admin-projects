<!-- Code block starts -->


<div class="bg-gray-700 bg-opacity-50 transition duration-150 ease-in-out z-[100] absolute top-0 right-0 bottom-0 left-0 overflow-hidden h-[100%]"
    id="modal">
    <div role="alert" class="container mx-auto w-full md:w-3/5 lg:w-3/6 2xl:w-2/5 overflow-auto h-full">
        <div class="relative py-8 px-5 md:px-10 bg-white shadow-md rounded border border-gray-400">

            <h1 class="text-gray-800 font-lg font-bold tracking-normal leading-tight mb-4">Enter Billing Details</h1>
            <div id="form-projects">

                <div class="form-group">
                    <label for="name">Project Name:</label>
                    <input x-model="projectData.name" type="text" id="name" name="name">
                    <span class="alert-text" x-text="validation?.name"></span>
                </div>
                <div class="form-group">
                    <label for="description">Description:</label>
                    <textarea x-model="projectData.description" id="description" name="description" rows="4"></textarea>
                    <span class="alert-text" x-text="validation?.description"></span>
                </div>
                <div class="form-group">
                    <label for="start_date">Start Date:</label>
                    <input x-model="projectData.start_date" type="date" id="start_date" name="start_date">
                    <span class="alert-text" x-text="validation?.start_date"></span>
                </div>
                <div class="form-group">
                    <label for="end_date">End Date:</label>
                    <input x-model="projectData.end_date" type="date" id="end_date" name="end_date">
                    <span class="alert-text" x-text="validation?.end_date"></span>
                </div>
                <div class="form-group">
                    <label for="priority">Priority:</label>
                    <select x-model="projectData.priority" id="priority" name="priority">
                        <option value="low">Low</option>
                        <option value="medium">Medium</option>
                        <option value="high">High</option>
                    </select>
                    <span class="alert-text" x-text="validation?.priority"></span>
                </div>
                <div class="form-group">
                    <label for="budget">Budget:</label>
                    <input x-model="projectData.budget" type="number" id="budget" name="budget" step="0.01">
                    <span class="alert-text" x-text="validation?.budget"></span>
                </div>
                <div class="form-group">
                    <label for="estimated_time">Estimated Time:</label>
                    <input x-model="projectData.estimated_time" type="number" id="estimated_time" name="estimated_time" step="0.01">
                    <span class="alert-text" x-text="validation?.estimated_time"></span>
                </div>
                <div class="flex items-center justify-start w-full">
                    <button class="btn btn-primary" x-on:click="edit ? updateProject() : addProject()"
                        x-text="edit ? 'Edit Project' : 'Add Project'">

                    </button>
                    <button @click="showModalProject = false" class="btn btn-danger" x-on:click="resetData()">
                        Cancel
                    </button>
                </div>
            </div>
            <button x-on:click="resetData()" type="button" @click="showModalProject = false"
                class="cursor-pointer absolute top-0 right-0 mt-4 mr-5 text-gray-400 hover:text-gray-600 transition duration-150 ease-in-out rounded focus:ring-2 focus:outline-none focus:ring-gray-600">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-x" width="20" height="20"
                    viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" fill="none" stroke-linecap="round"
                    stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" />
                    <line x1="18" y1="6" x2="6" y2="18" />
                    <line x1="6" y1="6" x2="18" y2="18" />
                </svg>
            </button>
        </div>
    </div>
</div>


<style>
    .no-scroll {
        overflow: hidden;
    }
</style>
