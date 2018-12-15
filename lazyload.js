var lastone = 0;
var render = function(lastone) {
    for (i = lastone; i < 8; i++) {
        if (isInViewport(document.getElementById(i))) {
            document.getElementById(min(i + 1, 8)).src = document.getElementById(min(i + 1, 8)).getAttribute("data");
            last = i;
        }
    }
    return last;
};

window.addEventListener('scroll', function() {
    lastone = render(lastone);
    // DEBUG
    // document.getElementById("lastone").innerHTML = lastone;
});

var isInViewport = function(el) {
    const rect = el.getBoundingClientRect();
    const windowHeight = (window.innerHeight || document.documentElement.clientHeight);

    return (rect.top <= windowHeight) && ((rect.top + rect.height) >= 0);
};