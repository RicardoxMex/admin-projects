<div class="container" x-data="AdminProjects">
    <div class="header-content">
        <div>
            <h2 class="title-web">
                <?= $project->name ?>
            </h2>
        </div>
        <div>
            <button class="btn btn-icon-only btn-opacity" data-modal="modal">
                <span class="material-symbols-outlined">
                    add
                </span>
            </button>
            <button id="btn-list" class="btn btn-icon-only btn-opacity">
                <span class="material-symbols-outlined">
                    list
                </span>
            </button>
            <button id="btn-grid" class="btn btn-icon-only btn-opacity">
                <span class="material-symbols-outlined">
                    grid_view
                </span>
            </button>
        </div>
    </div>

    <div class="board" x-data="CardStatus">
        <div class="column">
            <div class="column-title">
                Inicio
            </div>
            <div class="column-body sortable-list" data-column="inicio">
                <div class="card" id="ad">
                    <div class="card-title">
                        TASK
                    </div>
                    <div class="card-icon">
                        TASK DESCRIPTION
                    </div>
                </div>
            </div>
            <button class="add-card-btn">+ Add Card</button>
        </div>

        <div class="column">
            <div class="column-title">
                Inicio
            </div>
            <div class="column-body sortable-list" data-column="inicio2" id="ad2">
                <div class="card" id="ad2">
                    <div class="card-title">
                        TASK
                    </div>
                    <div class="card-icon">
                        TASK DESCRIPTION
                    </div>
                </div>
            </div>
            <button class="add-card-btn">+ Add Card</button>
        </div>
        <div class="column">
            <div class="column-title">
                Inicio
            </div>
            <div class="column-body sortable-list" data-column="inicio3">
                <div class="card" id="ad3">
                    <div class="card-title">
                        TASK
                    </div>
                    <div class="card-icon">
                        TASK DESCRIPTION
                    </div>
                </div>
            </div>
            <button class="add-card-btn">+ Add Card</button>
        </div>

    </div>
</div>

<style>
    .board {
        overflow: scroll;
        display: flex;
        padding: 10px;
        height: 85vh;
        width: 100%;
    }

    .column {
        background-color: #dfdfdf;
        margin-right: 10px;
        padding: 10px;
        min-width: 280px;
        border-radius: 3px;
    }

    .column-title {
        font-size: 18px;
        font-weight: bold;
        margin-bottom: 10px;
        color: #444;
    }

    .board .card {
        background-color: #fff;
        height: max-content;
        padding: 12px;
        margin-bottom: 8px;
        border-radius: 5px;
        box-shadow: 0 1px 2px rgba(0, 0, 0, 0.15);
        cursor: pointer;
        transition: box-shadow 0.2s ease;
        margin: 4px;
        z-index: 0;
    }

    .board .card:hover {
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.15);
    }

    .board .card-title {
        font-size: 16px;
        margin-bottom: 8px;
        color: #333;
    }

    .board .card-icon {
        font-size: 14px;
        color: #999;
    }

    .board .add-card-btn {
        background-color: #ebecf0;
        padding: 8px;
        border: none;
        border-radius: 3px;
        font-size: 14px;
        color: #777;
        cursor: pointer;
        transition: background-color 0.2s ease;
    }

    .board .add-card-btn:hover {
        background-color: #ddd;
    }

    .column-body {
        min-height: 20px;
    }
</style>
<script>
    function CardStatus() {
        // Utiliza Alpine.js para inicializar Sortable.js en las listas
        Alpine.effect(() => {
            const sortableLists = document.querySelectorAll(".sortable-list");
            sortableLists.forEach((list) => {
                new Sortable(list, {
                    group: "column",
                    animation: 150,
                    ghostClass: "sortable-ghost",
                    chosenClass: "sortable-chosen",
                    dragClass: "sortable-drag",
                    onUpdate: function (evt) {
                        const column = list.getAttribute("data-column");
                        const itemID = evt.item.id;
                        console.log(`Elemento ${itemID} pasó de la posición ${evt.oldIndex} a la posición ${evt.newIndex}`);
                        console.log(`Elemento "${itemID}" movido a la columna ${column}`);
                    },
                    onAdd: function (evt) {
                        const column = list.getAttribute("data-column");
                        const itemText = evt.item.id;
                        console.log(`Elemento "${itemText}" movido a la columna ${column}`);
                    },
                });
            });
        });
    }
</script>