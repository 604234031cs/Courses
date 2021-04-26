var rows = 1;
var base_url = window.location.origin + "/courses";

// var base_url = window.location.origin + "/courses";
// reload_first();
// function reload_first() {
//   var id_courses = $("#id_courses").val();
//   //   alert(id_courses);
//   $.ajax({
//     type: "post",
//     url: base_url + "/ajax/showquestion",
//     data: {
//       key: id_courses,
//     },
//     success: function (resulte) {
//       let json = JSON.parse(resulte);
//       json.forEach((val) => {
//         showvalue(val);
//       });
//     },
//   });
// }

// function showvalue(val) {
//   var html = "";
//   var btn = "";
//   $.ajax({
//     url: base_url + "/ajax/showvalquestion",
//     type: "post",
//     data: {
//       key: val["q_id"],
//     },
//     success: function (shows) {
//       // console.log(val['q_name']);
//       let json = JSON.parse(shows);
//       //   alert(val["q_name"]);
//       html += ' <div class="col col-6">';
//       html += ' <div class="card m-3"><div class="card-header">';
//       html += "<h5>" + val["q_name"] + "</h5>";
//       html += '</div><div class="card-body">';
//       json.forEach((show) => {
//         html += ' <div class="form-check">';
//         html +=
//           '<input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" >';
//         html += ' <label class="form-check-label" for="exampleRadios1">';
//         html += show["sl_name"];
//         html += "</label></div>";
//       });
//       html += "</div></div></div>";

//       $("#row-question").html(html);
//     },
//   });
// }
$("#question-add-modal").modal("hide");
$("#option-add-modal").modal("hide");

function openmodal() {
  $("#question-add-modal").modal("show");

  if (!$("#question-add").val()) {
    $("#btn-submit").prop("disabled", "true");
  }
}
function validatevalue() {
  var text = $("#question-add").val();
  if (text != "" && rows > 1 && $('input[name="check"]:checked').length != 0) {
    $("#btn-submit").removeAttr("disabled");
  } else {
    $("#btn-submit").prop("disabled", "true");
  }
}

function addoption() {
  var option = "";
  option += "<tr id='coltr" + rows + "'>";
  // option += "<td>ตัวเลือกที่ " + rows + "</td>";
  option += "<td class='text-center'>";
  option +=
    "<input type='text'  class='form-control' name='option_value" +
    rows +
    "' required>";
  option += "</td>";
  option += "<td>";
  option +=
    "<button class='btn btn-danger'  onclick='delcol(" +
    rows +
    ")'>ลบ</button>";
  option += "</td>";
  option +=
    "<td class='text-center'><input name='check' class='form-check-input'  type='radio' value='" +
    rows +
    "' id='defaultCheck" +
    rows +
    "' onclick='answer_val(this.value) ' required";
  option += "</td>";
  option += "</tr>";
  $("#rows").val(rows);
  rows++;
  validatevalue();
  $("#option > tbody:last").append(option);
}

function delcol(x) {
  var str = "#coltr" + x;
  // console.log(str);
  answer_del(x);
  $(str).remove();
}

function clearinput() {
  rows = 1;
  $("#rows").val(rows);
  $("#option > tbody:last").empty(); // remove all
  // if ($("#id_resort").val() != "" && rows != 0) {
  //   document.getElementById("save").disabled = false;
  // } else {
  //   document.getElementById("save").disabled = true;
  // }
  // console.log(rows);
}

function answer_val(value) {
  $("#answer").val(value);
  validatevalue();
}

function answer_del(x) {
  if (x == $("#answer").val()) {
    $("#answer").val(null);
  }
  validatevalue();
}

function viewoption(question, answer) {
  // alert($quetion);
  var tr = "";
  $("#table-option > tbody:last").empty();
  $.ajax({
    url: base_url + "/admin/val_question/" + question,
    type: "get",
    success: function (result) {
      let json = JSON.parse(result);
      let num = 1;
      json.forEach((show) => {
        if (show["option_number"] == answer) {
          tr += "<tr style='background-color:greenyellow;'>";
        } else {
          tr += "<tr>";
        }
        tr += "<td>";
        tr += num;
        tr += "</td>";
        tr += "<td>";
        tr += show["sl_name"];
        tr += "</td>";
        tr += "<td>";
        tr += "<div class='dropdown'>";
        tr +=
          "<button class='btn btn-warning dropdown-toggle' data-toggle='dropdown'>ตัวเลือก</button>";
        tr +=
          "<div class='dropdown-menu' aria-labelledby='dropdownMenuButton'>";
        tr +=
          "<a class='dropdown-item' onclick='reanswer(" +
          question.toString() +
          "," +
          show["option_number"].toString() +
          ")'>ตั้งเป็นคำตอบที่ถูก</a>\
          <a class='dropdown-item' data-toggle='modal' data-target='#editopton' onclick='modal_edit_option(" +
          show["s_id"] +
          ")'>แก้ไข</a>\
          <a class='dropdown-item' onclick='delanswer(" +
          show["s_id"] +
          "," +
          question +
          ")'>ลบ</a>  ";
        tr += "</div></div>";
        tr += "</td>";
        tr += "</tr>";
        num++;
      });
      $("#q_id").val(question);
      $("#table-option > tbody:last").append(tr);
    },
  });
}

function reanswer(quesion, option) {
  $.ajax({
    url: base_url + "/ajax/reanswer",
    type: "post",
    data: {
      quesion: quesion,
      answer: option,
    },
    success: function (result) {
      // let object = JSON.parse(result);
      window.location.reload();
    },
  });
}

function delanswer(del, q_id) {
  $.ajax({
    url: base_url + "/ajax/delanswer/" + del + "/" + q_id,
    type: "get",
    success: function (result) {
      // let object = JSON.parse(result);
      window.location.reload();
    },
  });
}

function modal_edit_option(s_id) {
  // console.log(s_id);
  $.ajax({
    url: base_url + "/option/" + s_id,
    type: "get",
    success: function (result) {
      let json = JSON.parse(result);
      // console.log(json['s_id']);
      console.log(json);
      $(".modal-body .form-group #option_tilte").val(json["sl_name"]);
      $(".modal-body #s_id").val(json["s_id"]);
    },
  });
}
var rows2 = 1;
function addoption2() {
  var tr = "";
  var btn = "";
  $("#btn-submit2").empty();
  tr += "<tr id='_coltr" + rows2 + "'>";
  tr += "<td colspan=2>";
  tr +=
    "<input class='form-control' type='text' name='option_value" +
    rows2 +
    "'  required>";
  tr += "</td>";
  tr += "<td>";
  tr +=
    "<button class='btn btn-danger'onclick='delcol2(" +
    rows2 +
    ")'>ลบ</button>";
  tr += "</tr>";
  $("#rows2").val(rows2);
  rows2++;

  $("#table-option > tbody:last").append(tr);
  // $("#btn-submit2").append(btn);
}

function delcol2(x) {
  var str = "#_coltr" + x;
  // console.log(str);
  // answer_del(x);
  $(str).remove();
}

function openmodal_edit_question(q_id, q_name) {
  $("#editquestion").modal("show");
  $(".modal-content #question_id").val(q_id);
  $(".modal-content #question_name").val(q_name);
}
