
/* document.addEventListener("turbolinks:load", function () {
    const btnGrid = document.getElementById('btn-grid');
    const btnList = document.getElementById('btn-list');
    const table = document.getElementById('table');
    const grid = document.getElementById('grid');
    if (btnGrid != null) {

        var storeGrid = localStorage.getItem('btnGrid');
        var storeList = localStorage.getItem('btnList');
        console.log(storeGrid);
        console.log(storeList);



        btnList.addEventListener('click', function (e) {
            e.preventDefault();
            listHandler();
        });
        btnGrid.addEventListener('click', function (e) {
            e.preventDefault();
            gridHandler();
        })

        const listHandler = () => {
            btnList.classList.add('select-btn');
            btnGrid.classList.remove('select-btn');
            table.classList.remove('hidden');
            grid.classList.add('hidden');
            localStorage.setItem('btnGrid', '');
            localStorage.setItem('btnList', 'ok');
            console.log('list')
        }
        const gridHandler = () => {
            btnList.classList.remove('select-btn');
            btnGrid.classList.add('select-btn');
            table.classList.add('hidden');
            grid.classList.remove('hidden');
            localStorage.setItem('btnGrid', 'ok');
            localStorage.setItem('btnList', '');
            console.log('grid')
        }
        if (storeGrid == 'ok') {
            gridHandler();
        }
        if (storeList == 'ok') {
            listHandler();
        }
    }

})
*/
