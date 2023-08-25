<!-- Code block starts -->


<div class="hidden bg-gray-700 bg-opacity-50 transition duration-150 ease-in-out z-[100] absolute top-0 right-0 bottom-0 left-0 overflow-hidden h-[100%]" id="modal">
    <div role="alert" class="container mx-auto w-full md:w-3/5 lg:w-3/6 2xl:w-2/5 overflow-auto h-full">
        <div class="relative py-8 px-5 md:px-10 bg-white shadow-md rounded border border-gray-400">

            <h1 class="text-gray-800 font-lg font-bold tracking-normal leading-tight mb-4">Enter Billing Details</h1>
            <form action="">

                <div class="form-group">
                    <label for="name">Project Name:</label>
                    <input type="text" id="name" name="name" value="<?= data('name') ?>">
                    <?= component("validation", ["input" => "name"]) ?>
                </div>
                <div class="form-group">
                    <label for="description">Description:</label>
                    <textarea id="description" name="description" rows="4"><?= data('description') ?></textarea>
                    <?= component("validation", ["input" => "description"]) ?>
                </div>
                <div class="form-group">
                    <label for="start_date">Start Date:</label>
                    <input type="date" id="start_date" name="start_date" value="<?= data('start_date') ?>">
                    <?= component("validation", ["input" => "start_date"]) ?>
                </div>
                <div class="form-group">
                    <label for="end_date">End Date:</label>
                    <input type="date" id="end_date" name="end_date" value="<?= data('start_date') ?>">
                    <?= component("validation", ["input" => "end_date"]) ?>
                </div>
                <div class="form-group">
                    <label for="priority">Priority:</label>
                    <select id="priority" name="priority">
                        <option <?php if (data("priority") === "low")
                            echo 'selected="selected"'; ?> value="low">Low
                        </option>
                        <option <?php if (data("priority") === "medium")
                            echo 'selected="selected"'; ?> value="medium">
                            Medium</option>
                        <option <?php if (data("priority") === "high")
                            echo 'selected="selected"'; ?> value="high">High
                        </option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="budget">Budget:</label>
                    <input type="number" id="budget" name="budget" step="0.01" value="<?= data('budget') ?>">
                    <?= component("validation", ["input" => "budget"]) ?>
                </div>
                <div class="form-group">
                    <label for="estimated_time">Estimated Time:</label>
                    <input type="number" id="estimated_time" name="estimated_time" step="0.01"
                        value="<?= data('estimated_time') ?>">
                    <?= component("validation", ["input" => "estimated_time"]) ?>
                </div>
                <div class="flex items-center justify-start w-full">
                    <button
                        class="focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-700 transition duration-150 ease-in-out hover:bg-indigo-600 bg-indigo-700 rounded text-white px-8 py-2 text-sm">Submit</button>
                    <button
                        class="focus:outline-none focus:ring-2 focus:ring-offset-2  focus:ring-gray-400 ml-3 bg-gray-100 transition duration-150 text-gray-600 ease-in-out hover:border-gray-400 hover:bg-gray-300 border rounded px-8 py-2 text-sm"
                        onclick="modalHandler()" type="button">Cancel</button>
                </div>
            </form>
            <button
                class="cursor-pointer absolute top-0 right-0 mt-4 mr-5 text-gray-400 hover:text-gray-600 transition duration-150 ease-in-out rounded focus:ring-2 focus:outline-none focus:ring-gray-600"
                onclick="modalHandler()" aria-label="close modal" role="button">
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
<script>
   let modal = document.getElementById("modal");

    function modalHandler(val, modalID) {
        console.log(modalID);
        if (val) {
            fadeIn(modal);
        } else {
            fadeOut(modal);
        }
    }
    function fadeOut(el) {
        el.style.opacity = 1;
        (function fade() {
            if ((el.style.opacity -= 0.1) < 0) {
                modal.classList.add("hidden");
                document.documentElement.classList.remove('no-scroll');
            } else {
                requestAnimationFrame(fade);
            }
        })();
    }
    function fadeIn(el, display) {
        el.style.opacity = 0;
        modal.classList.remove("hidden");
        document.documentElement.classList.add('no-scroll');
        (function fade() {
            let val = parseFloat(el.style.opacity);
            if (!((val += 0.2) > 1)) {
                el.style.opacity = val;
                requestAnimationFrame(fade);
            }
        })();
    }
</script>
<!-- Code block ends -->