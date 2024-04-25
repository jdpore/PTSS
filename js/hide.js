// script.js

// This function hides or shows the "Users" section based on the user category
function hideElementsBasedOnCategory() {
  var adminSection = document.getElementById("users");

  if (userCategory === "Admin") {
    adminSection.style.display = "block";
  } else {
    adminSection.style.display = "none";
  }
}

// Call the function to hide or show elements immediately
hideElementsBasedOnCategory();
