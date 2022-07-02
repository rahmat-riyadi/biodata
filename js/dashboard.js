const selectButton = document.querySelector('th.select-all input')
const select = document.querySelectorAll('td.select input')

selectButton.addEventListener('click', () => {

    if(selectButton.checked){
        select.forEach( e => e.setAttribute('checked', 'checked') )
        console.log('checked')
    } else {
        select.forEach( e => e.removeAttribute('checked') )
        console.log('uncheck')
    }


})