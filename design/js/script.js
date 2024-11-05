function slidesVeranderen() {
    var slides = document.getElementById("contentContainer").getElementsByClassName("slide");
    var bollen = document.getElementById("contentContainer").getElementsByClassName("bol");
    var huidigeSlide = 0;

    function showSlide(index) {
        for (var i=0;i<slides.length;i++) {
            slides[i].classList.remove("active");
            bollen[i].classList.remove("active");
        }
        slides[index].classList.add("active");
        bollen[index].classList.add("active");
    }

    function nextSlide() {
        huidigeSlide = (huidigeSlide+1)%slides.length;
        showSlide(huidigeSlide);
    }

    showSlide(huidigeSlide);
    setInterval(nextSlide,5000);
}