let myVideo = document.getElementById("video");
function playvdo(url, name, category, id) {
  var id_user = $("#id_user").html();

  var flievideo = "http://localhost:8080/upload/" + category + "/allvdo/" + url;
  // console.log("id_user=>" + id_user + "::id_video=>" + id);
  document.getElementById("source").src = flievideo;
  // myVideo.play();
  console.log(myVideo.played);
  myVideo.load();

  // document.getElementById("video").autoplay = true;
  $("#videoname").html(name);
  $("#id_video").html(id);
  window.scrollTo(0, 0);
}
// myVideo.onprogress  = function () {
//   alert("Browser has loaded the current frame");
// };

function endVideo() {
  var id_user = $("#id_user").html();
  var id_video = $("#id_video").html();
  var id_category = $("#id_category").html();
  $.ajax({
    type: "post",
    url: "/ajax/endvideo",
    data: {
      id_user: id_user,
      id_video: id_video,
      id_category: id_category,
    },
    success: function (result) {
      console.log(result);
      let val = JSON.parse(result);
      // console.log(val);
      $("#calculate").html(val + "%");
      // document.getElementsByClassName("progress-bar").style.width = val + "%";
      $(".progress-bar").html;
    },
  });
}

function openlink(c, l) {
  window.location.href = "/courses/" + c + "/lectures/" + l;
}

function updatetime(event) {
  var id_user = $("#id_user").html();
  var id_video = $("#id_video").html();

  // alert(id_video);
  // var id_category = $("#id_category").html();
  $("#sh_time").html(event.currentTime);
  var currentTime = event.currentTime;

  $.ajax({
    url: "/ajax/updateduration",
    type: "post",
    data: {
      id_user: id_user,
      id_vdo: id_video,
      duration: currentTime,
    },
    success: function (reulte) {},
  });
}

function load() {
  alert("Metadata for video loaded");
}

function playvideo() {
  var id_user = $("#id_user").html();
  var id_video = $("#id_video").html();
  var id_category = $("#id_category").html();

  $.ajax({
    type: "post",
    url: "/ajax/checkvideo",
    data: {
      id_user: id_user,
      id_video: id_video,
      id_category: id_category,
    },
    success: function (result) {
      // console.log(result);
      // let val = JSON.parse(result);
      // // console.log(val);
      // $("#calculate").html(val + "%");
    },
  });
  // alert(id_user);
  // alert(id_video);
  // alert(id_category);
}

function sertime() {
  // myVideo.currentTime(10);
  alert(
    "Start: " + myVideo.seekable.start(0) + " End: " + myVideo.seekable.end(0)
  );
}
