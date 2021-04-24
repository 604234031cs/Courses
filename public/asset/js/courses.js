var base_url = window.location.origin + "/courses";

// var base_url = "<?php echo base_url();?>";

function edit(name, id, ca_name, ca_id, gr_name, gr_id, img) {
  $("input").val();
  $("#editcourses").modal("show");
  $("#edit_name").val(name);
  $("#edit_id").val(id);
  $("#option").val(ca_id);
  $("#option").html(ca_name);
  $("#file_check").val(img);
  $("#show-img").attr("src", base_url + "/public/img/" + img);
  loadpage2(gr_name, gr_id);
}

function readURL(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    reader.onload = function (e) {
      $("#show-img").attr("src", e.target.result);
    };

    reader.readAsDataURL(input.files[0]);
  }
}

loadpage();
function autoselect(value) {
  var option = "";
  $("#group").empty();
  $.ajax({
    url: base_url + "/ajax/selact",
    type: "post",
    data: {
      key: value,
    },
    success: function (resulte) {
      var json = JSON.parse(resulte);
      json["group"].forEach((element) => {
        // console.log(element["name"]);
        option +=
          "<option value='" +
          element["id"] +
          "'>" +
          element["name"] +
          "</option>";
      });

      $("#group").append(option);
    },
  });
}

function autoselect2(value) {
  var option = "";
  $("#group_e").empty();
  $.ajax({
    url: base_url + "/ajax/selact",
    type: "post",
    data: {
      key: value,
    },
    success: function (resulte) {
      var json = JSON.parse(resulte);
      json["group"].forEach((element) => {
        // console.log(element["name"]);
        option +=
          "<option value='" +
          element["id"] +
          "'>" +
          element["name"] +
          "</option>";
      });

      $("#group_e").append(option);
    },
  });
}

function loadpage2(gr_name, gr_id) {
  var value = $("#main2").val();

  var option = "";
  $("#group_e").empty();
  $.ajax({
    url: base_url + "/ajax/selact",
    type: "post",
    data: {
      key: value,
    },
    success: function (resulte) {
      var json = JSON.parse(resulte);
      option += "<option value='" + gr_id + "'>" + gr_name + "</option>";
      json["group"].forEach((element) => {
        // console.log(element["name"]);

        if (element["id"] != gr_id) {
          option +=
            "<option value='" +
            element["id"] +
            "'>" +
            element["name"] +
            "</option>";
        }
      });

      $("#group_e").append(option);
    },
  });
}

function loadpage() {
  var value = $("#main").val();
  var option = "";
  $("#group").empty();
  $.ajax({
    url: base_url + "/ajax/selact",
    type: "post",
    data: {
      key: value,
    },
    success: function (resulte) {
      var json = JSON.parse(resulte);
      json["group"].forEach((element) => {
        // console.log(element["name"]);
        option +=
          "<option value='" +
          element["id"] +
          "'>" +
          element["name"] +
          "</option>";
      });

      $("#group").append(option);
    },
  });
}

var rows = 0;

function addinput2() {
  var tr = "<tr id='coltr" + rows + "'>";
  tr +=
    "<td><input type='text' name='name-group" +
    rows +
    "' class='form-control' required></td>";
  tr +=
    "<td class='text-right'><button type ='button' class='btn btn-danger' onclick='delcol3(" +
    rows +
    ")' >ลบ</button></td>";
  tr += "</tr>";
  $("#mytable > tbody:last").append(tr);
  $("#hdnCount").val(rows);
  rows = rows + 1;

  //   alert("OK");
}

// function delinput() {
//   if ($("#mytable tr").length != 1) {
//     $("#mytable tr:last").remove();
//     rows = rows - 1;
//     $("#hdnCount").val(rows);

//     // if (rows != 0) {
//     //   document.getElementById("save").disabled = false;
//     // } else {
//     //   document.getElementById("save").disabled = true;
//     // }
//     // console.log(rows);
//   }
// }

function clearinput2() {
  rows = 0;
  $("#hdnCount").val(rows);
  $("#mytable > tbody:last").empty(); // remove all
  // if ($("#id_resort").val() != "" && rows != 0) {
  //   document.getElementById("save").disabled = false;
  // } else {
  //   document.getElementById("save").disabled = true;
  // }
  // console.log(rows);
}

function delcol3(x) {
  // alert(x);
  var str = "#coltr" + x;
  // console.log($(str));
  $(str).empty();
}
