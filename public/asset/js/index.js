loadpage();
var html = "";
var score;
function loadpage(text = null) {
  html = "";
  if (text != null && text != "") {
    //   alert("Text Not Null")
    // $("#row").empty();
    $.ajax({
      url: "/ajax/search",
      type: "post",
      data: {
        query: text,
      },
      success: function (value) {
        var json = JSON.parse(value);
        json["courses"].forEach((get) => {
          score = getscore(json["score"], get["id"]);
          html +=
            '<div class="col col-4" id="col" style="border-radius: 15px 0px 0px 15px">';
          html +=
            ' <a href="/courses/' +
            get["id"] +
            '" style="text-decoration: none;">';
          html +=
            ' <div class="card mb-4" style="height:400px;border-radius: 15px;">';
          html +=
            '<img class="card-img-top" src="https://process.fs.teachablecdn.com/ADNupMnWyR7kCWRvm76Laz/resize=width:705/https://www.filepicker.io/api/file/5Cr0YJWRBqYw3zpCKImc" alt="Card image" width="332" height="187" style="border-radius: 15px 15px 0px 0px">';
          html += '<div class="card-body">';
          html +=
            '<div class="ml-5 mr-5"><div class="text-center"><strong>COMPLETE</strong></div>';
          html += '<div class="text-center">';
          if (get["score"] != null) {
            html += get["score"] + " %";
            score = get["score"];
          } else {
            html += "0.00 %";
            score = 0;
          }
          html +=
            '</div><div class="progress mt-2"><div class="progress-bar progress-bar-striped " role="progressbar" style="width:' +
            score +
            '%;background-color:#ff00bf;" aria-valuenow="' +
            score +
            '" aria-valuemin="0" aria-valuemax="100">' +
            score +
            " %</div></div>";
          html += '</div> <h5 class="card-title mt-3">' + get["name"] + "</h5>";
          html += "</div></div></a></div>";
        });
        $("#row").html(html);
      },
    });
  } else {
    $("#row").empty();
    $.ajax({
      url: "/ajax/search",
      type: "post",
      data: {
        query: text,
      },
      success: function (value) {
        var json = JSON.parse(value);
        json["courses"].forEach((get) => {
          score = getscore(json["score"], get["id"]);
          html +=
            '<div class="col col-4" id="col" style="border-radius: 15px 0px 0px 15px">';
          html +=
            ' <a href="/courses/' +
            get["id"] +
            '" style="text-decoration: none;">';
          html +=
            ' <div class="card mb-4" style="height:400px;border-radius: 15px;">';
          html +=
            '<img class="card-img-top" src="https://process.fs.teachablecdn.com/ADNupMnWyR7kCWRvm76Laz/resize=width:705/https://www.filepicker.io/api/file/5Cr0YJWRBqYw3zpCKImc" alt="Card image" width="332" height="187" style="border-radius: 15px 15px 0px 0px">';
          html += '<div class="card-body">';
          html +=
            '<div class="ml-5 mr-5"><div class="text-center"><strong>COMPLETE</strong></div>';
          html += '<div class="text-center">';
          if (score > 0) {
            html += score + " %";
            // score = get["score"];
          } else {
            html += "0.00 %";
            score = 0;
          }
          //   console.log(score);
          html +=
            '</div><div class="progress mt-2"><div class="progress-bar progress-bar-striped " role="progressbar" style="width:' +
            score +
            '%;background-color:#ff00bf;" aria-valuenow="' +
            score +
            '" aria-valuemin="0" aria-valuemax="100">' +
            score +
            " %</div></div>";
          html += '</div> <h5 class="card-title mt-3">' + get["name"] + "</h5>";
          html += "</div></div></a></div>";
          // }
        });

        // console.log(html);
        $("#row").html(html);
      },
    });
  }
}

function getscore(json, id) {
  var score = 0;
  json.forEach((value) => {
    // console.log(json);
    if (value["id_courses"] == id) {
      score = value["score"];
      json = {};
    }
  });
  return score;
}

