let myVideo = document.getElementById("video");

function openvideo(url, name) {
  var base_url = window.location.origin + "/courses";
  // alert(base_url);
  $("#showvideo").modal("show");
  document.getElementById("video").src = base_url + "/videos/" + url;
  myVideo.load();
  $("#videoname").html(name);
  //   $("#id_video").html(id);
}

function closevideo() {
  myVideo.pause();
}

function editvideo(name, id) {
  //   alert(name);
  $("#editvideo").modal("show");
  $("#video-name").val(name);
  $("#video-id").val(id);
}

function editdoc(name, id, url) {
  // console.log(name, id);
  // $("#editvideo").modal("show");
  // $("#video-name").val(name);
  // $("#video-id").val(id);
  $("#editdoc").modal("show");
  $("#doc_name").val(name);
  $("#doc_id").val(id);
  $("#doc_url_defaul").val(url);
}

// function endvideo() {
//   alert("END VIDEo");
// }
