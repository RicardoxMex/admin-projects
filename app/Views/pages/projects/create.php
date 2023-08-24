<div class="container">
    <div class="header-content">
        <div>
            <h2 class="title-web"><?= $title ?></h2>
        </div>
    </div>
    <form class="form" action="<?= route('projects/store') ?>" method="post">
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
                <option <?php if (data("priority") === "low") echo 'selected="selected"'; ?> value="low">Low</option>
                <option <?php if (data("priority") === "medium") echo 'selected="selected"'; ?> value="medium">Medium</option>
                <option <?php if (data("priority") === "high") echo 'selected="selected"'; ?> value="high">High</option>
            </select>
        </div>
        <div class="form-group">
            <label for="budget">Budget:</label>
            <input type="number" id="budget" name="budget" step="0.01" value="<?= data('budget') ?>">
            <?= component("validation", ["input" => "budget"]) ?>
        </div>
        <div class="form-group">
            <label for="estimated_time">Estimated Time:</label>
            <input type="number" id="estimated_time" name="estimated_time" step="0.01" value="<?= data('estimated_time') ?>">
            <?= component("validation", ["input" => "estimated_time"]) ?>
        </div>
        <button class="btn">Add Project</button>
    </form>
</div>