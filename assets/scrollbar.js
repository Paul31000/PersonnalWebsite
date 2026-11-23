window.onscroll = function() {myFunction()};

function myFunction() {
  var winScroll = document.body.scrollTop || document.documentElement.scrollTop;
  var height = document.documentElement.scrollHeight - document.documentElement.clientHeight;
  var scrolled = (winScroll / height) * 100;
  document.getElementById("myBar").style.width = scrolled + "%";
} 

window.addEventListener("scroll", function() {
    const element = document.getElementById("bar-mouvante");
    const elementTop = element.parentElement.offsetTop;
    const scroll = window.scrollY;

    const start = elementTop - window.innerHeight;
    const end = elementTop + 500;
    
    let progress = (scroll - start) / (end - start);
    progress = Math.max(0, Math.min(1, progress));

    const maxMove = window.innerWidth;
    element.style.left = (progress * maxMove) + "px";
});