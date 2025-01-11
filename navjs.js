
const mobileMenuButton = document.getElementById("mobile-menu-button");
const mobileMenu = document.getElementById("mobile-menu");
const hamburgerIcon = document.getElementById("hamburger-icon");
const closeIcon = document.getElementById("close-icon");

mobileMenuButton.addEventListener("click", () => {
  // Toggle the aria-expanded attribute
  const isExpanded = mobileMenuButton.getAttribute("aria-expanded") === "true";
  mobileMenuButton.setAttribute("aria-expanded", !isExpanded);
  
  // Toggle the visibility of the mobile menu
  mobileMenu.classList.toggle("hidden", isExpanded);

  // Toggle hamburger/close icons
  hamburgerIcon.classList.toggle("hidden", !isExpanded);
  closeIcon.classList.toggle("hidden", isExpanded);
});

// Handle active link styling
const navLinks = document.querySelectorAll('.sm\\:block a, #mobile-menu a');
navLinks.forEach(link => {
  link.addEventListener('click', () => {
    // Remove active styles from all links
    navLinks.forEach(l => l.classList.remove('bg-gray-900', 'text-white'));
    
    // Add active styles to the clicked link
    link.classList.add('bg-gray-900', 'text-white');

    // Close the mobile menu after link click (optional)
    if (mobileMenu.classList.contains('hidden') === false) {
      mobileMenu.classList.add('hidden');
      mobileMenuButton.setAttribute("aria-expanded", "false");
      hamburgerIcon.classList.remove("hidden");
      closeIcon.classList.add("hidden");
    }
  });
});
