var base_url = window.location.origin + "/courses";

loadpage();
var html = "";
var score;

function loadpage(text = null) {
  html = "";
  if (text != null && text != "") {
    // alert("Text Not Null")
    // $("#row").empty();
    $.ajax({
      url: base_url + "/ajax/search",
      type: "post",
      data: {
        query: text,
      },
      success: function (value) {
        var json = JSON.parse(value);
        json["courses"].forEach((get) => {
          let url = base_url + "/public/img/" + get["img"];
          score = getscore(json["score"], get["id"]);
          html += '<div class="col-sm-4" id="col">';

          html +=
            ' <a href="' +
            base_url +
            " /courses/" +
            get["id"] +
            '"style=" text-decoration: none;">';
          html += ' <div class="card mb-4">';
          html +=
            '<img class="card-img-top" src="' + url + '" alt="Card image">';
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
      url: base_url + "/ajax/search",
      type: "post",
      data: {
        query: text,
      },
      success: function (value) {
        var json = JSON.parse(value);
        json["courses"].forEach((get) => {
          let url = base_url + "/public/img/" + get["img"];
          score = getscore(json["score"], get["id"]);
          html += '<div class="col-sm-4" id="col">';
          html +=
            ' <a href="' +
            base_url +
            " /courses/" +
            get["id"] +
            '"  style=" text-decoration: none;">';
          html += ' <div class="card mb-4">';
          html +=
            '<img class="card-img-top" src="' + url + '" alt="Card image">';
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
          // console.log(score);
          html +=
            '</div> <div class = "progress mt-2"><div class = "progress-bar progress-bar-striped "   role = "progressbar"style = "width:' +
            score +
            '%;background-color:#ff00bf;" aria-valuenow="' +
            score +
            '" aria-valuemin="0" aria-valuemax="100">' +
            score +
            " %</div> </div > ";
          html +=
            '</div> <h5 class = "card-title mt-3" > ' + get["name"] + "</h5>";
          html += "</div> </div> </a> </div > ";
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

function autoselect(value) {
  var option = "";
  $("#group_sel").empty();
  $.ajax({
    url: base_url + "/ajax/selact",
    type: "post",
    data: {
      key: value,
    },
    success: function (resulte) {
      var json = JSON.parse(resulte);
      option += "<option value='' disabled selected>หมวดหมู่</option>";
      json["group"].forEach((element) => {
        // console.log(element["name"]);
        
        option +=  "<option value='" +    element["id"] +      "'>" +    element["name"] +    "</option>";
      });
      $("#group_sel").append(option);
      let name_sel = $("#group_sel option:selected").text();
      // alert(name_sel);
      $("#group-name ").html(name_sel);
    },
  });
}

function changevalue(value) {
  // alert(value);
  let name_sel = $("#group_sel option:selected").text();
  // alert(name_sel);
  $("#group-name ").html(name_sel);
  window.location.href =
    base_url + "/category/" + $("#group_sel option:selected").val();
}
