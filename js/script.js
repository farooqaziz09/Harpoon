jQuery(document).ready(function(){
	jQuery(".dropbtn").click(function(){
	  jQuery(".dropdown_content").toggleClass("active");
	});
  });

  const dropbtn = document.querySelector('.dropbtn');

  dropbtn.addEventListener('click', function(event){
var menu_cont = document.getElementById('menu_wrap');
menu_cont.classList.toggle('open');
event.preventDefault();
  });






  // .nav-item