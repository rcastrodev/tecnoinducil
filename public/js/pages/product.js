let buttonsAddVariableProductToQoute = document.querySelectorAll('table input')



function addVariableProductToQoute(e){
    e.preventDefault()

    let arrayData = this.name.split('|')
    this.setAttribute('data-id', `${this.name}`)
    this.setAttribute('data-productname',arrayData[0])
    this.setAttribute('data-sectionmm', arrayData[1])

    this.classList.add('btn-primary')

    setTimeout(() => {
        this.classList.remove('btn-primary')
    }, 500);


    
    let variablesProductsInStorage = JSON.parse(localStorage.getItem('variableProducts')) 
    
    let obj = {
        id: this.name,
        productname: this.dataset.productname,
        sectionmm: this.dataset.sectionmm,
        image: document.querySelector('#imageCurrent').getAttribute('src')
    }

    if(variablesProductsInStorage){    
        
        if(variablesProductsInStorage.find(variableProduct => variableProduct.id == this.dataset.id))
            return undefined

        variablesProductsInStorage.push(obj)
        localStorage.setItem('variableProducts', JSON.stringify(variablesProductsInStorage))
    }else{
        localStorage.setItem('variableProducts', JSON.stringify([obj]))
    }
    
}

buttonsAddVariableProductToQoute.forEach(buttonAddVariableProductToQoute => {
    buttonAddVariableProductToQoute.addEventListener('click', addVariableProductToQoute)
});

