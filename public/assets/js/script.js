/*// Function expression to select elements
const selectElement = (s) => document.querySelector(s);
// Open the menu on click
selectElement('.open').addEventListner('click', () => {
    selectElement('nav-list').classList.add('active');
});
// Close the menu on click
selectElement('.close').addEventListner('click', () => {
    selectElement('nav-list').classList.remove('active');
});
*/

// Login Form
const inputs = document.querySelectorAll('.input-field');

function focusFunc() {
    let parent = this.parentNode.parentNode;
    parent.classList.add('focus');
}

function blurFunc() {
    let parent = this.parentNode.parentNode;
    if (this.value == "") {
        parent.classList.remove('focus');
    }
}

inputs.forEach(input => {
    input.addEventListener('focus', focusFunc);
    input.addEventListener('blur', blurFunc);
});

// START: Smooth Scroll
    $(document).ready(function() // Reference: https://www.w3schools.com/howto/tryit.asp?filename=tryhow_css_smooth_scroll_jquery
    {
        // Add smooth scrolling to all links
        $("a").on('click', function(event) {

            // Make sure this.hash has a value before overriding default behavior
            if (this.hash !== "") {
                // Prevent default anchor click behavior
                event.preventDefault();

                // Store hash
                var hash = this.hash;

                // Using jQuery's animate() method to add smooth page scroll
                // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
                $('html, body').animate({
                    scrollTop: $(hash).offset().top
                }, 800, function(){
                
                    // Add hash (#) to URL when done scrolling (default click behavior)
                    window.location.hash = hash;
                });
            } // End if
        });
    });
// END: Smooth Scroll