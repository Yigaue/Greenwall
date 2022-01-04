window.onload = () => {

    const navigatorActive = (counter, navigators) => {
        for (let i = 0; i < navigators.length; i++) {
            if (counter > navigators.length) counter = 1;
            if (counter < 1) counter = navigators.length;
    
            if (navigators[i].id === "slider_img_" + counter) {
            navigators[i].classList.add("navigatorChildActive");
            } else {
            navigators[i].classList.remove("navigatorChildActive");
            }
        }
    };

    const slider = document.querySelector(".news-carousel-container");
    let sliderImages = document.querySelectorAll(".news-carousel");

    const prevBtn = document.querySelector(".prevBtn");
    const nextBtn = document.querySelector(".nextBtn");

    const navigator = document.querySelector(".navigator");

    for (let i = 0; i < sliderImages.length; i++) {
        const navigatorChild = document.createElement("div");
        navigatorChild.classList.add("navigatorChild");
        navigatorChild.id = "slider_img_" + (i + 1);
        navigator.appendChild(navigatorChild);
    }
    const navigators = document.querySelectorAll(".navigatorChild");
    navigators[0].classList.add("navigatorChildActive");

    //first node clone
    const firstNodeClone = sliderImages[0].cloneNode(true);
    firstNodeClone.id = "firstClone";
    slider.appendChild(firstNodeClone);

    //last node clone
    const lastNodeClone = sliderImages[sliderImages.length - 1].cloneNode(true);
    lastNodeClone.id = "lastClone";
    slider.prepend(lastNodeClone);

    sliderImages = document.querySelectorAll(".news-carousel");

    let counter = 1;

    let ImageWidth = sliderImages[0].clientWidth;
    slider.style.transform = `translateX(${-counter * ImageWidth}px)`;

    nextBtn.addEventListener("click", () => {
        if (counter >= sliderImages.length - 1) return null;
        slider.style.transition = "all 0.3s ease-in-out";
        counter++;
        slider.style.transform = `translateX(${-counter * ImageWidth}px)`;
        navigatorActive(counter, navigators);
    });

    prevBtn.addEventListener("click", () => {
        if (counter <= 0) return null;
        slider.style.transition = "all 0.3s ease-in-out";
        counter--;
        slider.style.transform = `translateX(${-counter * ImageWidth}px)`;
        navigatorActive(counter, navigators);
    });

    slider.addEventListener("transitionend", () => {
        if (sliderImages[counter].id === "lastClone") {
        slider.style.transition = "none";
        counter = sliderImages.length - 2;
        slider.style.transform = `translateX(${-counter * ImageWidth}px)`;
        }

        if (sliderImages[counter].id === "firstClone") {
        slider.style.transition = "none";
        counter = sliderImages.length - counter;
        slider.style.transform = `translateX(${-counter * ImageWidth}px)`;
        }
    });

    navigators.forEach((el, i) => {
        el.addEventListener("click", () => {
        counter = i + 1;
        slider.style.transition = "all 0.3s ease-in-out";
        slider.style.transform = `translateX(${-counter * ImageWidth}px)`;
        navigatorActive(counter, navigators);
        });
    });

    //resize handler
    window.onresize = () => {
        ImageWidth = sliderImages[0].offsetWidth;
        slider.style.transform = `translateX(${-counter * ImageWidth}px)`;
    };


    var slideIndex = 1;
    showDivs(slideIndex);
    function plusDivs(n) {
        showDivs(slideIndex += n);
    }
    function currentDiv(n) {
        showDivs(slideIndex = n);
    }
    
    function showDivs(n) {
        var i;
        var x = document.getElementsByClassName("mySlides");
        var dots = document.getElementsByClassName("demo");
        if (n > x.length) {slideIndex = 1}
        if (n < 1) {slideIndex = x.length}
        for (i = 0; i < x.length; i++) {
        x[i].style.display = "none";  
        }
        for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" w3-white", "");
        }
        x[slideIndex-1].style.display = "block";  
        dots[slideIndex-1].className += " w3-white";
    }
                // Add active class to the current button (highlight it)
    var header = document.getElementByClassName("w3-center");
    var btns = header.getElementsByClassName("w3-badge");
    for (var i = 0; i < btns.length; i++) {
        btns[i].addEventListener("click", function() {
        var current = document.getElementsByClassName("active");
        if (current.length > 0) {
        current[0].className = current[0].className.replace(" active", "");
        }
        this.className += " active";
        });
    }  

    mybutton = document.getElementById(".back-to-top-button");
        // When the user scrolls down 20px from the top of the document, show the button
    window.onscroll = function() {scrollFunction()};
    function scrollFunction() {
        if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
            mybutton.style.display = "block";
        } else {
            mybutton.style.display = "none";
        }
    }
        // When the user clicks on the button, scroll to the top of the document
    function topFunction() {
        document.body.scrollTop = 0; // For Safari
        document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
    }
};


    
