/*const toggleButton = document.getElementsByClassName('toggle-button')[0]
const navbarLinks = document.getElementsByClassName('navbar-links')[0]

toggleButton.addEventListener('click', () => {
  navbarLinks.classList.toggle('active')
})*/

var modalBtn = document.querySelector('.modal-btn');
var modalBg = document.querySelector('.modal-bg');
var modalclose = document.querySelector('.modal-close');
modalBtn.addEventListener('click',function(){
	modalBg.classList.add('bg-active');
});
modalclose.addEventListener('click',function(){
	modalBg.classList.remove('bg-active');
})


 