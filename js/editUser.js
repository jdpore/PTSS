function editUser(id) {
  // Log the ID to the console (you can remove this line in production)
  console.log("Editing user with ID: " + id);

  // Assuming you have jQuery loaded
  $.ajax({
    type: "GET",
    url: "../php/editUser.php",
    data: { id: id },
    dataType: "json",
    success: function (data) {
      // Access userId from the returned data
      var userId = data.userId;

      // Set values in the modal
      $("#editId").val(userId); // Assuming you have an input field with id "editUserId"
      $("#editName").val(data.name);
      $("#editUserName").val(data.username);
      $("#editCategory").val(data.category);
      $("#editUserModal").modal("show");
    },
    error: function (error) {
      console.error("Error fetching user data: ", error);
    },
  });
}
