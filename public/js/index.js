// Get the button:
let mybutton = document.querySelector("#myBtn");

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
//NO UI Range Slider
var pipsSlider = document.getElementById('slider');
noUiSlider.create(pipsSlider, {
    start: [0, 250],
    step: 50,
    connect: [false, true, false],
    range: {
        'min': 0,
        'max': 250
    },
    pips: {
        mode: 'steps',
        density: 250,
        format: wNumb({
            prefix: '€'
        })
    }
});
var pipsSlider1 = document.getElementById('slider1');
noUiSlider.create(pipsSlider1, {
    start: [0, 250],
    step: 50,
    connect: [false, true, false],
    range: {
        'min': 0,
        'max': 250
    },
    pips: {
        mode: 'steps',
        density: 250,
        format: wNumb({
            prefix: '€'
        })
    }
});