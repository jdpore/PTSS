document.addEventListener("DOMContentLoaded", function () {
  var projectSelect = document.getElementById("project");
  var coordinatorSelect = document.getElementById("projectCoordinator");

  projectSelect.addEventListener("change", function () {
    var selectedProject = projectSelect.value;

    // Make an AJAX request to fetch coordinators based on the selected project
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function () {
      if (xhr.readyState == 4) {
        if (xhr.status == 200) {
          // Update the coordinator dropdown with the fetched data
          var coordinators = JSON.parse(xhr.responseText);
          updateCoordinatorDropdown(coordinators);
        } else {
        }
      }
    };

    // Adjust the URL to your server-side script that fetches coordinators based on the selected project
    xhr.open(
      "GET",
      "../php/coordinatorSelect.php?project=" + selectedProject,
      true
    );
    xhr.send();
  });

  function updateCoordinatorDropdown(coordinators) {
    var currentCoordinatorValue = coordinators[0].coordinator;

    coordinatorSelect.setAttribute(
      "data-current-value",
      currentCoordinatorValue
    );

    for (var i = 0; i < coordinatorSelect.options.length; i++) {
      if (coordinatorSelect.options[i].value === currentCoordinatorValue) {
        coordinatorSelect.options[i].selected = true;
        break;
      }
    }
  }
});
