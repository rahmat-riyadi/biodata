const login = document.querySelector('a.login')
const exit = document.querySelector('i.exit')
const backdrop = document.querySelector('div.backdrop')


login.addEventListener('click', (e) => {
    e.preventDefault()
    backdrop.classList.toggle('active')
})

exit.addEventListener('click', () => backdrop.classList.toggle('active') )