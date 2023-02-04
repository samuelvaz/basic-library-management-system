const navSlide= () =>{
    const toggleSandwich =document.querySelector('.toggle-sandwich');
    const nav = document.querySelector('.nav-links');

    toggleSandwich.addEventListener('click', () =>{
        nav.classList.toggle('nav-active');

    });
}
navSlide();