let variablesProductsInStorage = JSON.parse(localStorage.getItem('variableProducts'))
let table = document.getElementById('table')

if (variablesProductsInStorage.length > 0) {
    let table = document.getElementById('table')
    if (table) {
        table.classList.remove('d-none')
    }
    renderVariableProducts()
}
    

function selected(value, service){
    return value == service ? 'selected' : '' 
}

function renderVariableProducts()
{
    let html = ''
    variablesProductsInStorage.forEach(item => {

        html += `<tr>
            <td>
                <img src="${item.image}" class="img-fluid" style="width: 150px; height: 100px;">
            </td>
            <td>
                ${item.productname}
                <input type="hidden" name="variableproduct[${item.id}][productname]" value="${item.productname}" class="form-control">
            </td>
            <td>
                ${item.sectionmm}
                <input type="hidden" name="variableproduct[${item.id}][sectionmm]" value="${item.sectionmm}" class="form-control">
            </td>
            <td>
                <input type="number" name="variableproduct[${item.id}][quantity]" min="0" value="0" step="100" class="form-control" style="width:100px; margin: auto;">
            </td>
            <td class="text-center">
                <button class="btn eliminar-item-presupuesto fas fa-trash-alt color-azul-claro" data-id="${item.id}"></button>
            </td>
        </tr>`
    
        table.querySelector('tbody').innerHTML = html
    })
}

function destroyVariableProductsInStorage(e)
{
    e.preventDefault()
    if(e.target.classList.contains('eliminar-item-presupuesto'))
    {
        let btnDestroy = e.target
        btnDestroy.classList.add('btn-danger')

        variablesProductsInStorage = variablesProductsInStorage.filter( variableProductsInStorage => {
            if(variableProductsInStorage.id !== btnDestroy.dataset.id)
                return variableProductsInStorage
        }) 

        localStorage.setItem('variableProducts', JSON.stringify(variablesProductsInStorage))

        setTimeout(() => {
            btnDestroy.closest('tr').remove()
            renderVariableProducts()
        }, 2000);

    }
}

table.addEventListener('click', destroyVariableProductsInStorage)