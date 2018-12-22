var lastone = 1;
var render = function(last) {
    /*for (i = last; i < 8; i++) {
        if (isInViewport(document.getElementById(i))) {
            document.getElementById(Math.min(i + 1, 8)).src = document.getElementById(Math.min(i + 1, 8)).getAttribute("data");
            last = i;
        }
    }*/
    
    for (i = last; i < 8; i++){
        if(isInViewport(document.getElementById(i))){
            for(j = last; j <= i+1; last=j++){
                document.getElementById(Math.min(j, 8)).src = document.getElementById(Math.min(j, 8)).getAttribute("data");
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
