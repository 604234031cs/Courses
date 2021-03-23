var rows = 0;

function addinput() {
  var tr = "<tr id='coltr" + rows + "'>";
  //   tr = tr + "<td>" + rows + "</td>";
  tr =
    tr +
    "<td><input type='text' name='name-lectures" +
    rows +
    "' class='form-control' required></td>";
  tr =
    tr +
    "<td class='text-right'><button type ='button' class='btn btn-danger' ' onclick='delcol(" +
    rows +
    ")' >ลบ</button ></td>";
  tr = tr + "</tr>";
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

function clearinput() {
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

function delcol(x) {
  var str = "#coltr" + x;
  // console.log($(str));

  $(str).remove();
}
