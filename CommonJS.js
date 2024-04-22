// Get a reference to the button element
const scrollToTopButton = document.getElementById("scrollToTopButton");

// Add a scroll event listener to check when to show or hide the button
window.addEventListener("scroll", () => {
    if (document.documentElement.scrollTop > 100) {
        scrollToTopButton.style.display = "block";
    } else {
        scrollToTopButton.style.display = "none";
    }
});

// Add a click event listener to scroll to the top when the button is clicked
scrollToTopButton.addEventListener("click", () => {
    document.documentElement.scrollTo({
        top: 0,
        behavior: "smooth" // Add smooth scrolling behavior
    });
});

