let isNavCollapsed = true;

function toggleNavbar() {
  isNavCollapsed = !isNavCollapsed;
  const navbar = document.getElementById("navbarSupportedContent");
  if (isNavCollapsed) {
    navbar.classList.add("collapse");
  } else {
    navbar.classList.remove("collapse");
  }
}

function handleNavLinkClick() {
  isNavCollapsed = true;
  document.getElementById("navbarSupportedContent").classList.add("collapse");
}

function handleSignupNavigate() {
  isNavCollapsed = true;
  document.getElementById("navbarSupportedContent").classList.add("collapse");
  window.location.href = "/signup"; // Navigate to the signup page
}
