/*=============== SHOW MENU ===============*/
const navMenu = document.getElementById('nav-menu'),
      navToggle = document.getElementById('nav-toggle'),
      navClose = document.getElementById('nav-close')

/* Menu show */
if(navToggle){
    navToggle.addEventListener('click', () =>{
        navMenu.classList.add('show-menu')
    })
}

/* Menu hidden */
if(navClose){
    navClose.addEventListener('click', () =>{
        navMenu.classList.remove('show-menu')
    })
}

/*=============== REMOVE MENU MOBILE ===============*/
document.addEventListener("DOMContentLoaded", function () {
    const dropdownToggle = document.querySelector(".dropdown-toggle");
    const dropdownMenu = document.querySelector(".dropdown-menu");
    const navMenu = document.getElementById("nav-menu");

    dropdownToggle.addEventListener("click", function (event) {
        event.preventDefault();
        dropdownMenu.classList.toggle("show");
        event.stopPropagation(); // Prevents menu from closing
    });

    // Close dropdown when clicking outside
    document.addEventListener("click", function (event) {
        if (!dropdownToggle.contains(event.target) && !dropdownMenu.contains(event.target)) {
            dropdownMenu.classList.remove("show");
        }
    });

    // Prevent nav menu from closing when clicking dropdown
    dropdownMenu.addEventListener("click", function (event) {
        event.stopPropagation();
    });

    // Modify nav link event to exclude dropdown
    const navLinks = document.querySelectorAll(".nav__link:not(.dropdown-toggle)");

    navLinks.forEach((navLink) => {
        navLink.addEventListener("click", () => {
            navMenu.classList.remove("show-menu");
        });
    });
});


/*=============== ADD BLUR HEADER ===============*/
const blurHeader = () =>{
    const header = document.getElementById('header')
    // Add a class if the bottom offset is greater than 50 of the viewport
    this.scrollY >= 50 ? header.classList.add('blur-header') 
                       : header.classList.remove('blur-header')
}
window.addEventListener('scroll', blurHeader)


/*=============== EMAIL JS ===============*/
const contactForm = document.getElementById('contact-form'), contactMessage = document.getElementById('contact-message')
const sendEmail = (e) =>{
    e.preventDefault()
    //serviceID - templateID - #form - publickey
    emailjs.sendForm('service_jvalr9p','template_2144jts','#contact-form','8HKypWeN1u5yJKqPt')
        .then(() =>{
            //show sent message
            contactMessage.textContent = 'Message sent successfully ✅'
            //remove message after 5 seconds
            setTimeout(()=>{
                contactMessage.textContent = ''
            }, 5000)
            //clear input fields
            contactForm.reset()
        })
        .catch((error) => {
            // Handle errors and shows if message is not sent
            contactMessage.textContent = 'Failed to send message. (Service error) ❌';
            console.error('Error:', error);

            // Remove message after 5 seconds
            setTimeout(() => {
                contactMessage.textContent = '';
            }, 5000);
        });
};
contactForm.addEventListener('submit', sendEmail)

/*=============== SHOW SCROLL UP ===============*/ 
const scrollUp = () =>{
	const scrollUp = document.getElementById('scroll-up')
    // When the scroll is higher than 350 viewport height, add the show-scroll class to the a tag with the scrollup class
	this.scrollY >= 350 ? scrollUp.classList.add('show-scroll')
						: scrollUp.classList.remove('show-scroll')
}
window.addEventListener('scroll', scrollUp)