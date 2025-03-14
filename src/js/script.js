document.addEventListener('DOMContentLoaded', function () {
  /*=============== NAVIGATION MENU ===============*/
  const navMenu = document.getElementById('nav-menu'),
        navToggle = document.getElementById('nav-toggle'),
        navClose  = document.getElementById('nav-close');

  // Show menu when toggle is clicked
  if (navToggle) {
    navToggle.addEventListener('click', () => {
      navMenu.classList.add('show-menu');
    });
  }
  // Hide menu when close is clicked
  if (navClose) {
    navClose.addEventListener('click', () => {
      navMenu.classList.remove('show-menu');
    });
  }
  // Hide menu on link click (optional)
  const navLinks = document.querySelectorAll('.nav__link');
  navLinks.forEach(link => {
    link.addEventListener('click', () => {
      navMenu.classList.remove('show-menu');
    });
  });

  /*=============== CART FUNCTIONALITY ===============*/
  const cartBoxIcon = document.getElementById('cart-box');
  const cartIconPanel = document.getElementById('cart-icon');
  const closeCartIcon = cartIconPanel.querySelector('.ri-close-circle-fill');

  // Toggle cart open/close when clicking the cart icon
  cartBoxIcon.addEventListener('click', () => {
    const isVisible = cartIconPanel.getAttribute('data-visible');
    cartIconPanel.setAttribute('data-visible', isVisible === 'true' ? 'false' : 'true');
  });

  // Close cart when clicking the close icon
  closeCartIcon.addEventListener('click', () => {
    cartIconPanel.setAttribute('data-visible', 'false');
  });

  /*=============== LOGIN FUNCTIONALITY ===============*/
  // Use the unique ID for the login trigger button
  const loginOverlay = document.getElementById('loginOverlay');
  const loginBtn = document.getElementById('loginTrigger');
  const closeBtn = document.querySelector('.login-close-btn');

  // Show login modal on login trigger click
  loginBtn.addEventListener('click', (e) => {
    e.stopPropagation(); // Prevent any bubbling issues
    loginOverlay.style.display = 'flex';
    document.body.style.overflow = 'hidden';
  });

  // Close login modal when clicking the close button
  closeBtn.addEventListener('click', () => {
    loginOverlay.style.display = 'none';
    document.body.style.overflow = 'auto';
  });

  // Close login modal when clicking outside the modal
  loginOverlay.addEventListener('click', (e) => {
    if(e.target === loginOverlay) {
      loginOverlay.style.display = 'none';
      document.body.style.overflow = 'auto';
    }
  });

  // Toggle between login and register views
  const container = document.querySelector('.login-modal-container .container');
  const registerBtn = document.querySelector('.register-btn');
  const loginToggleBtn = document.querySelector('.login-btn');

  registerBtn?.addEventListener('click', () => container.classList.add('active'));
  loginToggleBtn?.addEventListener('click', () => container.classList.remove('active'));

  /*=============== PRODUCT TABS ===============*/
  const tabs = document.querySelectorAll('.tab');
  const tabContents = document.querySelectorAll('.tab-content');

  tabs.forEach(tab => {
    tab.addEventListener('click', () => {
      tabs.forEach(t => t.classList.remove('active'));
      tabContents.forEach(content => content.classList.remove('active'));

      tab.classList.add('active');
      const target = document.getElementById(tab.dataset.tab);
      target.classList.add('active');
    });
  });

  /*=============== QUANTITY SELECTOR ===============*/
  // Update selector to match .quantity-btn and stop propagation to avoid bubbling
  document.querySelectorAll('.quantity-btn').forEach(button => {
    button.addEventListener('click', (e) => {
      e.stopPropagation();
      const input = e.target.parentElement.querySelector('input');
      let value = parseInt(input.value);
      input.value = e.target.textContent === '-' ? (value > 1 ? value - 1 : 1) : value + 1;
    });
  });

  /*=============== MOBILE DROPDOWN MENU ===============*/
  const dropdownToggle = document.querySelector(".dropdown-toggle");
  const dropdownMenu = document.querySelector(".dropdown-menu");

  if (dropdownToggle && dropdownMenu) {
    dropdownToggle.addEventListener("click", function (event) {
      event.preventDefault();
      dropdownMenu.classList.toggle("show");
      event.stopPropagation();
    });

    document.addEventListener("click", function (event) {
      if (!dropdownToggle.contains(event.target) && !dropdownMenu.contains(event.target)) {
        dropdownMenu.classList.remove("show");
      }
    });

    dropdownMenu.addEventListener("click", function (event) {
      event.stopPropagation();
    });

    const navLinksNonDropdown = document.querySelectorAll(".nav__link:not(.dropdown-toggle)");
    navLinksNonDropdown.forEach((navLink) => {
      navLink.addEventListener("click", () => {
        navMenu.classList.remove("show-menu");
      });
    });
  }

  /*=============== FILTER BUTTON (MOBILE) ===============*/
  const filterTrigger = document.querySelector('.mobile-filter-trigger');
  const filters = document.querySelector('.filters');

  if (filters && filterTrigger) {
    const closeFilters = document.createElement('button');
    closeFilters.className = 'close-filters';
    closeFilters.innerHTML = '×';
    filters.prepend(closeFilters);

    filterTrigger.addEventListener('click', () => {
      filters.classList.add('active');
    });

    closeFilters.addEventListener('click', () => {
      filters.classList.remove('active');
    });
  }

  /*=============== BLUR HEADER ON SCROLL ===============*/
  const header = document.getElementById('header');
  window.addEventListener('scroll', () => {
    if (window.scrollY >= 50) {
      header.classList.add('blur-header');
    } else {
      header.classList.remove('blur-header');
    }
  });

  /*=============== SCROLL SECTIONS ACTIVE LINK ===============*/
  const sections = document.querySelectorAll('section[id]');
  window.addEventListener('scroll', () => {
    const scrollY = window.scrollY;
    sections.forEach(current => {
      const sectionHeight = current.offsetHeight;
      const sectionTop = current.offsetTop - 58;
      const sectionId = current.getAttribute('id');
      const navLink = document.querySelector('.nav__menu a[href*=' + sectionId + ']');
      if (scrollY > sectionTop && scrollY <= sectionTop + sectionHeight) {
        navLink.classList.add('active-link');
      } else {
        navLink.classList.remove('active-link');
      }
    });
  });

  /*=============== SCROLL REVEAL ANIMATION ===============*/
  if (typeof ScrollReveal !== "undefined") {
    const sr = ScrollReveal({
      origin: 'top',
      distance: '60px',
      duration: 2500,
      delay: 400,
      // reset: true // Uncomment if you want animations to repeat
    });
    sr.reveal(`.home__data, .experience, .skills, .contact__container`);
    sr.reveal(`.home__img`, { delay: 600 });
    sr.reveal(`.home__scroll`, { delay: 800 });
    sr.reveal(`.work__card, .services__card`, { interval: 100 });
    sr.reveal(`.about__content`, { origin: 'right' });
    sr.reveal(`.about__img`, { origin: 'left' });
  }

  /*=============== SHOW SCROLL UP BUTTON ===============*/
  const scrollUpBtn = document.getElementById('scroll-up');
  window.addEventListener('scroll', () => {
    if (window.scrollY >= 350) {
      scrollUpBtn.classList.add('show-scroll');
    } else {
      scrollUpBtn.classList.remove('show-scroll');
    }
  });
});
