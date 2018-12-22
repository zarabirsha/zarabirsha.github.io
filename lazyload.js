const numPics = 9;
var lastone = 1;
var render = function(last) {
    for (i = numpics - 1; i >= last; i--){
        if(isInViewport(document.getElementById(i))){
            for(j = last; j <= i+1; last=j++){
                document.getElementById(Math.min(j, numPics - 1)).src = document.getElementById(Math.min(j, numPics - 1)).getAttribute("data");
            }
        }
    }
    
    return last;
};

window.addEventListener('scroll', function() {
    lastone = render(lastone);
    // DEBUG
    document.getElementById("lastone").innerHTML = lastone;
});

var isInViewport = function(el) {
    const rect = el.getBoundingClientRect();
    const windowHeight = (window.innerHeight || document.documentElement.clientHeight);
    return (rect.top <= windowHeight) && ((rect.top + rect.height) >= 0);
};
