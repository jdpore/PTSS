function handleCategoryChange(category, projectName, projectCoordinator) {
  $("#encodeOutput").modal("show");
  // Get the selected category from the PHP variable
  var selectedCategory = category;

  // Check if the category is "Team Leader"
  if (selectedCategory === "Team Leader") {
    // Get the project and coordinator values for the Team Leader
    var teamLeaderProject = projectName;
    var teamLeaderCoordinator = projectCoordinator;

    // Set the values in the form
    document.getElementById("project").value = teamLeaderProject;
    document.getElementById("projectCoordinator").value = teamLeaderCoordinator;
  } else {
    // Clear the values if the category is not "Team Leader"
    document.getElementById("project").value = "";
    document.getElementById("projectCoordinator").value = "";
  }
}
