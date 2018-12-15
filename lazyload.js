var lastone = 0;
var render = function(lastone) {
    last = lastone;
    for (i = last; i < 9; i++) {
        if (isInViewport(document.getElementById(i))) {
            document.getElementById(i + 1).src = document.getElementById(i + 1).getAttribute("data");
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
