burger=document.querySelector('.burger');
navbar=document.querySelector('.nav_bar');
searchnav=document.querySelector('.search_nav');
navigat=document.querySelector('#navigation');

burger.addEventListener('click',()=>{
    navigat.classList.toggle('visib');
    searchnav.classList.toggle('visib');
    navbar.classList.toggle('h_nav');
})