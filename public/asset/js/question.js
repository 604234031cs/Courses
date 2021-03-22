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
