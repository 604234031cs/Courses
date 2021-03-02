function editcategory(id, name) {
  //   alert(id);
  //   alert(name);
  $("#modaledit").modal("show");
  $("#id_category").val(id);
  $("#ca_name").val(name);
}

function editgroup(id, name) {
  $("#editgroup").modal("show");
  $("#gr_name").val(name);
  $("#gr_id").val(id);
}
