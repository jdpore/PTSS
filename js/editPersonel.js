function editPersonel(id) {
  $.ajax({
    type: "GET",
    url: "../php/editPersonel.php",
    data: { id: id },
    dataType: "json",
    success: function (data) {
      $("#editId").val(id);
      $("#editPersonelName").val(data.personelName);
      $("#editDesignation").val(data.designation);
      $("#editProject").val(data.project);

      // Show the modal
      $("#editPersonelModal").modal("show");
    },
    error: function (error) {
      console.error("Error fetching user data: ", error);
    },
  });
}
