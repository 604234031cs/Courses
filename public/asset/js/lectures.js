function editlectures(id, name) {
    // alert('Edit');
    // alert(name)
    $('#editlectures').modal('show');

    $('#edit-lectures').val(name);
    $('#id_lectures').val(id);

}