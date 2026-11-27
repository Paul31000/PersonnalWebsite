window.onscroll = function() {myFunction()};

function myFunction() {
  var winScroll = document.body.scrollTop || document.documentElement.scrollTop;
  var height = document.documentElement.scrollHeight - document.documentElement.clientHeight;
  var scrolled = (winScroll / height) * 100;
  document.getElementById("myBar").style.width = scrolled + "%";
} 

window.addEventListener("scroll", function() {
    const element1 = document.getElementById("bar-mouvante1");
    barmouvante(element1);
    
    const element2 = document.getElementById("bar-mouvante2");
    barmouvante(element2);
    
    const element3 = document.getElementById("bar-mouvante3");
    barmouvante(element3);
    
    const element4 = document.getElementById("bar-mouvante4");
    barmouvante(element4);
    
    const element5 = document.getElementById("bar-mouvante5");
    barmouvante(element5);

    const element6 = document.getElementById("bar-mouvante6");
    barmouvante(element6);
});

function barmouvante  (element) {
  var winScroll = document.body.scrollTop || document.documentElement.scrollTop;
  var height = document.documentElement.scrollHeight - document.documentElement.clientHeight;
  var scrolled = (winScroll / height);
  const maxMove = Math.max(0, document.documentElement.clientWidth - element.offsetWidth-50);
  element.style.left = scrolled*maxMove + "px";
}

function barmouvante1  (element) {
    const elementTop = element.parentElement.offsetTop;
    const scroll = window.scrollY;

    const start = elementTop - window.innerHeight;
    const end = elementTop + 500;
    
    let progress = (scroll - start) / (end - start);
    progress = Math.max(0, Math.min(1, progress));

    const maxMove = Math.max(0, document.documentElement.clientWidth - element.offsetWidth);
    element.style.left = (progress * maxMove) + "px";
}