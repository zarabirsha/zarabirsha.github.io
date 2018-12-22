const numPics = 9;
var lastone = 1;
var render = function(last) {
    for (i = numpics; i >= last; i--){
        if(isInViewport(document.getElementById(i))){
            for(j = i+1; j >= last; j--){
                document.getElementById(Math.min(j, numPics - 1)).src = document.getElementById(Math.min(j, numPics - 1)).getAttribute("data");
            }
            last=i+1;
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
