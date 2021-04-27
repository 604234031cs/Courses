// let myVideo = document.getElementById("video");
// let ifame = document.getSelection("iframe ");
// var base_url = window.location.origin + "/courses";
// var player;
// function openvideo(url, name) {
//   // alert(base_url);
//   $("#showvideo").modal("show");
//   // document.getElementById("video").src = base_url + "/videos/" + url;
//   // myVideo.load();
//   $("#key").html(url);
//   $("#videoname").html(name);
//   // has(url);

//   var tag = document.createElement("script");
//   tag.src = base_url + "/public/asset/js/ifame.js";
//   var firstScriptTag = document.getElementsByTagName("script")[0];
//   firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);
//   player = new YT.Player("player", {
//     width: "100%",
//     videoId: url,
//     playerVars: {
//       rel: "0",
//       controls: "1",
//       start: 0,
//     },
//     events: {
//       onReady: onPlayerReady,
//       onStateChange: onPlayerStateChange,
//     },
//   });
//   $("iframe").attr("src", $("iframe").attr("src"));
// }
// // https://youtu.be/VHzlaXRzl1w/

// function onPlayerReady(event) {
//   // event.target.playVideo();
// }

// var done = false;

// function has(key) {
//   // return key;
//   console.log(key);
//   // return key;
// }

// function onPlayerStateChange(event) {
//   if (event.data == YT.PlayerState.PLAYING) {
//     console.log("Video Play");
//   } else if (event.data == YT.PlayerState.PAUSED) {
//     console.log(player.getCurrentTime());
//     console.log("Video Stop");
//   } else if (event.data == YT.PlayerState.ENDED) {
//     console.log("Video End");
//   }
//   player.loadVideoById("VHzlaXRzl1w");
//   if (event.data == YT.PlayerState.PLAYING && !done) {
//     setTimeout(stopVideo, 1000);
//     done = true;
//   }
// }
// function stopVideo() {
//   // player.stopVideo();
//   console.log(player.getDuration());
// }

// // function has() {
// //   return "HsD_45UNA8k";
// // }

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
