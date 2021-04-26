<!DOCTYPE html>
<html>

<body>
  <!-- 1. The <iframe> (and video player) will replace this <div> tag. -->
  <div id="player"></div>

  <script>
    // 2. This code loads the IFrame Player API code asynchronously.
    var tag = document.createElement('script');

    tag.src = "https://www.youtube.com/iframe_api";
    var firstScriptTag = document.getElementsByTagName('script')[0];

    firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

    // 3. This function creates an <iframe> (and YouTube player)
    //    after the API code downloads.
    var player;
    // loadVideoById({
    //   'videoId': 'HsD_45UNA8k',
    //   'startSeconds': 5,
    //   'endSeconds': 60
    // });

    function onYouTubeIframeAPIReady() {

      player = new YT.Player('player', {
        height: '390',
        width: '100%',
        videoId: has(),
        playerVars: {
          'rel': '0',
          'controls': '1',
          'start': 50,

        },
        events: {
          'onReady': onPlayerReady,
          'onStateChange': onPlayerStateChange
        }
      });


    }


    // 4. The API will call this function when the video player is ready.
    function onPlayerReady(event) {
      // event.target.playVideo();
    }

    // 5. The API calls this function when the player's state changes.
    //    The function indicates that when playing a video (state=1),
    //    the player should play for six seconds and then stop.
    var done = false;

    function onPlayerStateChange(event) {
      if (event.data == YT.PlayerState.PLAYING) {
        console.log("Video Play");

      } else if (event.data == YT.PlayerState.PAUSED) {
        console.log(player.getCurrentTime());
        console.log("Video Stop");

      } else if (event.data == YT.PlayerState.ENDED) {
        console.log("Video End");
      }


      // if (event.data == YT.PlayerState.PLAYING && !done) {
      //   setTimeout(stopVideo, 1000);
      //   done = true;
      // }

    }

    function stopVideo() {
      // player.stopVideo();
      console.log(player.getDuration());
    }

    function has() {
      return "HsD_45UNA8k";
    }
  </script>


  




</body>

</html>
<!-- https://youtu.be/HsD_45UNA8k -->