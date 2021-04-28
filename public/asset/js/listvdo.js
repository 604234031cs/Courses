// let myVideo = document.getElementById("video");
var base_url = window.location.origin + "/courses";
var tag = document.createElement("script");
// tag.src = "https://www.youtube.com/iframe_api";
tag.src = base_url + "/public/asset/js/ifame.js";

var firstScriptTag = document.getElementsByTagName("script")[0];
firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

var player;

// $(".hidden").hide();
// $(".hidden").show(1000);

$("#progree").css("width", $("#with").html() + "%");
// document.getElementById("progree").style.width = $("#with").html() + "%";

// function playvdo(url, name, id) {
//   var id_user = $("#id_user").html();
//   // var flievideo = base_url + "/upload/" + category + "/allvdo/" + url;
//   var flievideo = base_url + "/videos/" + url;
//   // console.log("id_user=>" + id_user + "::id_video=>" + id);
//   // alert(id);
//   $.ajax({
//     type: "post",
//     url: base_url + "/ajax/getcurrtiem",
//     data: {
//       id_user: id_user,
//       id_video: id,
//     },
//     success: function (result) {
//       let val = JSON.parse(result);
//       document.getElementById("video").src = flievideo;
//       myVideo.load();
//       if (val != null) {
//         if (val["duration"] != null && val["duration"] != "") {
//           myVideo.currentTime = val["duration"];
//         } else {
//           myVideo.currentTime = 0;
//         }
//       }
//     },
//   });
//   $("#videoname").html(name);
//   $("#id_video").html(id);
//   window.scrollTo(0, 0);
// }

// loadpagestart();
// function loadpagestart() {
//   var id_user = $("#id_user").html();
//   var id_video = $("#id_video").html();
//   // var url = $("#id_category").html();
//   // var url = $("#urlvideo").html();
//   // var category = $("#url").html();
//   var category = $("#key").val();
//   var flievideo = base_url + "/videos/" + category;

//   $.ajax({
//     type: "post",
//     url: base_url + "/ajax/getcurrtiem",
//     data: {
//       id_user: id_user,
//       id_video: id_video,
//     },
//     success: function (result) {
//       let val = JSON.parse(result);
//       if (myVideo != null) {
//         myVideo.src = flievideo;
//         myVideo.load();
//       }

//       // console.log(val);
//       // alert(id_video);

//       if (val != null) {
//         if (val["duration"] != null && val["duration"] != "") {
//           myVideo.currentTime = val["duration"];
//         } else {
//           myVideo.currentTime = 0;
//         }
//       }
//     },
//   });
// }

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

// function updatetime(event) {
//   var id_user = $("#id_user").html();
//   var id_video = $("#id_video").html();

//   // alert(id_video);
//   // var id_category = $("#id_category").html();
//   $("#sh_time").html(event.currentTime);
//   var currentTime = event.currentTime;

//   $.ajax({
//     url: base_url + "/ajax/updateduration",
//     type: "post",
//     data: {
//       id_user: id_user,
//       id_vdo: id_video,
//       duration: currentTime,
//     },
//     success: function (reulte) {},
//   });
// }

function playvideo() {
  console.log("Video Play Video");
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
      let val = JSON.parse(result);
      // console.log(val);
      $("#calculate").html(val + "%");
    },
  });
  // alert(id_user);
  // alert(id_video);
  // alert(id_category);
}

// function sertime() {
//   // myVideo.currentTime(10);
// //   alert(
// //     "Start: " +  document.getElementById("video").seekable.start(0) +
// //       " End: " +  document.getElementById("video").seekable.end(0)
// //   );
// // }

/////////////////////////////----New Js Video----//////////////////////////////////////////////////
// alert("2");
_Loadfirst();

function _Loadfirst() {
  // alert("1");

  var id_user = $("#id_user").html();
  var id_video = $("#id_video").html();
  // var url = $("#id_category").html();
  // var url = $("#urlvideo").html();
  // var category = $("#url").html();
  // var category = $("#key").val();
  // var flievideo = base_url + "/videos/" + category;

  $.ajax({
    type: "post",
    url: base_url + "/ajax/getcurrtiem",
    data: {
      id_user: id_user,
      id_video: id_video,
    },
    success: function (result) {
      let val = JSON.parse(result);
      let position = 0;
      if (val != null) {
        if (val["duration"] != null && val["duration"] != "") {
          position = val["duration"];
        }
      }
      var time = parseInt(position);
      // console.log(position);
      player = new YT.Player("player", {
        height: "390",
        width: "640",
        videoId: $("#key").val(),
        playerVars: {
          rel: "0",
          disablekb: "1",
          start: time,
        },
        events: {
          // onReady: onPlayerReady,
          onStateChange: onPlayerStateChange,
        },
      });
      // console.log(player);
    },
  });
}

// function onYouTubeIframeAPIReady() {}

// function onPlayerReady(event) {
//   // playvideo();
//   // event.target.playVideo();
// }

// var done = false;
function onPlayerStateChange(event) {
  if (event.data == YT.PlayerState.PAUSED) {
    // console.log(player.getCurrentTime());
    stopVideo(player.getCurrentTime());
  } else if (event.data == YT.PlayerState.ENDED) {
    endVideo();
  } else if (event.data == YT.PlayerState.PLAYING) {
    playvideo();
  }
}
function stopVideo(time) {
  
  // console.log("Video Stop Video position Time :=>" + time);
  var id_user = $("#id_user").html();
  var id_video = $("#id_video").html();
    // console.log(id_user);
    // console.log(id_video);
    // console.log(time);
  // var position = player.getCurrentTime();
  // alert(id_video);
  // var id_category = $("#id_category").html();
  // $("#sh_time").html(event.currentTime);
  // var currentTime = event.currentTime;
  $.ajax({
    url: base_url + "/ajax/updateduration",
    type: "post",
    data: {
      id_user: id_user,
      id_vdo: id_video,
      duration: time,
    },
    success: function (reulte) {
    },
  });
  // console.log("Stop");
  // console.log(player.getCurrentTime());
  player.pauseVideo();
}

function playvdo(key, name, id) {
  // console.log(player.getVideoEmbedCode());
  // player.loadVideoById(key);

  // console.log($("iframe").attr('src'));
  var id_user = $("#id_user").html();
  $.ajax({
    type: "post",
    url: base_url + "/ajax/getcurrtiem",
    data: {
      id_user: id_user,
      id_video: id,
    },
    success: function (result) {
      let val = JSON.parse(result);
      let position = 0;
      if (val != null) {
        if (val["duration"] != null && val["duration"] != "") {
          position = val["duration"];
        }
      }

      var time = parseInt(position);
      // player.loadVideoById(key);
      // player = new YT.Player("player", {
      //   height: "390",
      //   width: "640",
      //   videoId: key,
      //   playerVars: {
      //     rel: "0",
      //     disablekb: "1",
      //     start: time,
      //   },
      //   events: {
      //     onReady: onPlayerReady,
      //     onStateChange: onPlayerStateChange,
      //   },
      // });
      player.loadVideoByUrl("https://www.youtube.com/embed/" + key, time);

      // $("iframe").attr(
      //   "src",
      //   "https://www.youtube.com/embed/" +
      //     key +
      //     "?&rel=0&disablekb=1&start=" +
      //     time +
      //     "&enablejsapi=1&origin=http%3A%2F%2Flocalhost&widgetid=1"
      // );
    },
  });

  //www.youtube.com/embed/VHzlaXRzl1w?rel=0&disablekb=1&start=105&enablejsapi=1&origin=http%3A%2F%2Flocalhost&widgetid=1
  $("#videoname").html(name);
  $("#id_video").html(id);
  $("#key").val(key);
  // console.log($("iframe")[0]);
}

// https://www.youtube.com/embed/VHzlaXRzl1w?&rel=0&disablekb=1&start=0&enablejsapi=1&origin=http%3A%2F%2Flocalhost&widgetid=1
// https://www.youtube.com/embed/HsD_45UNA8k?rel=0&disablekb=1&start=101&enablejsapi=1&origin=http%3A%2F%2Flocalhost&widgetid=1
