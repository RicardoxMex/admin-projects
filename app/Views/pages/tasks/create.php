<div class="container">
        <form class="task-form">
            <h2>Create New Task</h2>
            <div class="form-group">
                <label for="name">Task Name:</label>
                <input type="text" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="description">Description:</label>
                <textarea id="description" name="description" rows="4"></textarea>
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
                <label for="start_date">Start Date:</label>
                <input type="date" id="start_date" name="start_date" required>
            </div>
            <div class="form-group">
                <label for="end_date">End Date:</label>
                <input type="date" id="end_date" name="end_date" required>
            </div>
            <div class="form-group">
                <label for="stimated_time">Estimated Time:</label>
                <input type="number" id="stimated_time" name="stimated_time" step="0.01">
            </div>
            <div class="form-group">
                <label for="project_id">Project ID:</label>
                <input type="number" id="project_id" name="project_id" required>
            </div>
            <div class="form-group">
                <label for="status_id">Status ID:</label>
                <input type="number" id="status_id" name="status_id" required>
            </div>
            <button class="btn" type="submit">Create Task</button>
        </form>
    </div>