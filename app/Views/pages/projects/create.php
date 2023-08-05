
<div class="container">
<div class="header-content">
        <div>
            <h2 class="title-web"><?= $title ?></h2>
        </div>
</div>

    <form class="form opacity-5" action="<?=route('projects/store')?>" method="post">
        <div class="form-group">
            <label for="name">Project Name:</label>
            <input type="text" id="name" name="name" >
        </div>
        <div class="form-group">
            <label for="description">Description:</label>
            <textarea id="description" name="description" rows="4" ></textarea>
        </div>
        <div class="form-group">
            <label for="start_date">Start Date:</label>
            <input type="date" id="start_date" name="start_date" >
        </div>
        <div class="form-group">
            <label for="end_date">End Date:</label>
            <input type="date" id="end_date" name="end_date" >
        </div>

        <div class="form-group">
            <label for="priority">Priority:</label>
            <select id="priority" name="priority">
                <option value="low">Low</option>
                <option value="medium">Medium</option>
                <option value="high">High</option>
            </select>
        </div>
        <div class="form-group">
            <label for="budget">Budget:</label>
            <input type="number" id="budget" name="budget" step="0.01">
        </div>
        <div class="form-group">
            <label for="stimated_time">Estimated Time:</label>
            <input type="number" id="stimated_time" name="stimated_time" step="0.01">
        </div>
        <button class="btn">Add Project</button>
    </form>
</div>





