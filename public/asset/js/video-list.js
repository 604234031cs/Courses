let myVideo = document.getElementById("video");
function openvideo(url, name) {
  alert(url)
  $("#showvideo").modal("show");
  document.getElementById("source").src = url;
  document.getElementById("video").load();
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

function endvideo() {
  alert("END VIDEo");
}
