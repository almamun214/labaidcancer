window.addEventListener("scroll", function() {
    var nav = this.document.querySelector("nav");
    if(this.window.scrollY >= 10) {
        nav.classList.add("sticky-active");
        nav.classList.remove('sticky');
    } else {
        nav.classList.add('sticky');
        nav.classList.remove("sticky-active");
    }
});