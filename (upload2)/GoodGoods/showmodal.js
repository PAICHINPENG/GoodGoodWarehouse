
  // Get DOM Elements
var showmodal = document.querySelector('#showmodal');
var showmodalBtn = document.querySelector('#showclick');
var showcloseBtn = document.querySelector('#show-close');

// Events
showmodalBtn.addEventListener('click', sopenModal);
showcloseBtn.addEventListener('click', scloseModal);
window.addEventListener('click', soutsideClick);

// Open
function sopenModal() {
  showmodal.style.display = 'block';
 
}

// Close
function scloseModal() {
  showmodal.style.display = 'none';
 
}

// Close If Outside Click
function soutsideClick(e) {
  if (e.target == showmodal) {
    showmodal.style.display = 'none';
  }
}
/*
var modalbtn = document.querySelectorAll('#showclick');
modalbtn.foreach(function(btn){
  btn.onclick = function(){
    var modal = btn.getAttribute('data-modal');

    document.getElementById(modal).style.display='block';
    
  };

})
var closebtn = document.querySelectorAll('#show-close');
closebtn.forEach(function(){
  btn.onclick = function(){
    var modal.(btn.closest())
  }
})
*/
