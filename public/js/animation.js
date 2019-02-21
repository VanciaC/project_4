//smooth scrolling
$(function(){
	$("a").on('click', function(event) {
    if (this.hash !== "") {
      	event.preventDefault();
     	var hash = this.hash;
      	$('html, body').animate({
        	scrollTop: $(hash).offset().top
      	}, 500, function(){
        window.location.hash = hash;
      });
    }
  });
});

//ScrollReveal
const sr = ScrollReveal();

sr.reveal('#title', {
  origin: 'top',
  distance: '400px',
  duration: 2000,
  scale: 0.15
});

sr.reveal('.card-home', {
  opacity: 0,
  duration: 1000,
  interval: 400,
  reset: true
});

sr.reveal('.card-post', {
  origin: 'top',
  distance: '200px',
  duration: 1000
});
