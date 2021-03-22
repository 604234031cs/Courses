let myVideo = document.getElementById("video");
var base_url = window.location.origin + "/courses";

$(".hidden").hide();
// $(".hidden").show(1000);

$("#progree").css("width", $("#with").html() + "%");
// document.getElementById("progree").style.width = $("#with").html() + "%";

function playvdo(url, name, id) {
  var id_user = $("#id_user").html();
  // var flievideo = base_url + "/upload/" + category + "/allvdo/" + url;
  var flievideo = base_url + "/videos/" + url;
  // console.log("id_user=>" + id_user + "::id_video=>" + id);
  // alert(id);
  $.ajax({
    type: "post",
    url: base_url + "/ajax/getcurrtiem",
    data: {
      id_user: id_user,
      id_video: id,
    },
    success: function (result) {
      let val = JSON.parse(result);
      document.getElementById("video").src = flievideo;
      myVideo.load();
      if (val != null) {
        if (val["duration"] != null && val["duration"] != "") {
          myVideo.currentTime = val["duration"];
        } else {
          myVideo.currentTime = 0;
        }
      }
    },
  });
  $("#videoname").html(name);
  $("#id_video").html(id);
  window.scrollTo(0, 0);
}

loadpagestart();
function loadpagestart() {
  var id_user = $("#id_user").html();
  var id_video = $("#id_video").html();
  var url = $("#id_category").html();
  var url = $("#urlvideo").html();
  // var category = $("#url").html();
  var category = $("#key").val();
  var flievideo = base_url + "/videos/" + category;
  $.ajax({
    type: "post",
    url: base_url + "/ajax/getcurrtiem",
    data: {
      id_user: id_user,
      id_video: id_video,
    },
    success: function (result) {
      let val = JSON.parse(result);
      if (myVideo != null) {
        myVideo.src = flievideo;
        myVideo.load();
      }

      // console.log(val);
      // alert(id_video);

      if (val != null) {
        if (val["duration"] != null && val["duration"] != "") {
          myVideo.currentTime = val["duration"];
        } else {
          myVideo.currentTime = 0;
        }
      }
    },
  });
}

function endVideo() {
  var id_user = $("#id_user").html();
  var id_video = $("#id_video").html();
  var id_category = $("#id_category").html();

  $.ajax({
    type: "post",
    url: base_url + "/ajax/endvideo",
    data: {
      id_user: id_user,
      id_video: id_video,
      id_category: id_category,
    },
    success: function (result) {
      // console.log(result);
      let val = JSON.parse(result);
      // console.log(val);
      $("#calculate").html(val + "%");
      document.getElementById("progree").style.width = val + "%";
      // document.getElementById("progree") = val;
      // alert(document.getElementById("progree").style.width);
      // alert(document.getElementById("progree").);
      document.getElementById("progree").innerHTML = val + "%";
    },
  });
}

function openlink(c, l) {
  // alert(base_url + "/courses/" + c + "/lectures/" + l);
  window.location.href = base_url + "/courses/" + c + "/lectures/" + l;
}

function updatetime(event) {
  var id_user = $("#id_user").html();
  var id_video = $("#id_video").html();

  // alert(id_video);
  // var id_category = $("#id_category").html();
  $("#sh_time").html(event.currentTime);
  var currentTime = event.currentTime;

  $.ajax({
    url: base_url + "/ajax/updateduration",
    type: "post",
    data: {
      id_user: id_user,
      id_vdo: id_video,
      duration: currentTime,
    },
    success: function (reulte) {},
  });
}

function playvideo() {
  var id_user = $("#id_user").html();
  var id_video = $("#id_video").html();
  var id_category = $("#id_category").html();

  $.ajax({
    type: "post",
    url: base_url + "/ajax/checkvideo",
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

// function sertime() {
//   // myVideo.currentTime(10);
//   alert(
//     "Start: " +  document.getElementById("video").seekable.start(0) +
//       " End: " +  document.getElementById("video").seekable.end(0)
//   );
// }
