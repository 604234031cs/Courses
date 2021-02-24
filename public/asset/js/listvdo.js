function playvdo(url, name, category, id) {
  var flievideo = "http://localhost:8080/upload/" + category + "/allvdo/" + url;
  //   // console.log();
  document.getElementById("source").src = flievideo;
  document.getElementById("video").load();
  $("#videoname").html(name);
  $("#id_video").html(id);
  // alert(id);

  window.scrollTo(0, 0);
}

function endVideo() {
  var id_user = $("#id_user").html();
  var id_video = $("#id_video").html();
  var id_category = $("#id_category").html();
  $.ajax({
    type: "post",
    url: "/ajax/checkvideo",
    data: {
      'id_user': id_user,
      'id_video': id_video,
      'id_category': id_category,
    },
    success: function (result) {
      console.log(result);
      let val = JSON.parse(result);
      // console.log(val);
      $("#calculate").html(val + "%");
    },
  });
}

function openlink(c, l) {
  window.location.href = "/courses/" + c + "/lectures/" + l;
}
