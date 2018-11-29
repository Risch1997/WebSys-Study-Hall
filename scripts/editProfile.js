// var courses = [
//   {
//     prefix: "CSCI",
//     title: "Foundations of Computer Science",
//     crn: 2200,
//   },
//   {
//     prefix: "CSCI",
//     title: "Data Scructures",
//     crn: 1200,
//   },
//   {
//     prefix: "ITWS",
//     title: "Introduction to Information Technology and Web Science",
//     crn: 1100,
//   },
//   {
//     prefix: "CSCI",
//     title: "Computer Science 1",
//     crn: 1100,
//   },
//   {
//     prefix: "MATH",
//     title: "Multivariable Calculus and Matrix Algebra",
//     crn: 2010,
//   }
// ];

function populateCourses() {
  for (var i in courses) {
    $("#course1").append("<option value=\""+courses[i].title +"\">"+courses[i].title+"</option>");
  }
}

function addCourseSelect() {
  var selectCount = $('.course-row').length;
  if (selectCount != 4) {
    var num = (selectCount+1).toString();
    var newDiv = "<div id=\"courseRow"+num+"\" class='course-row'>";
    var removeId = "removeCourseSelect"+num;
    var selectList = "<select id=\"course"+num+"\" name=\"course"+num+"\">";
    for (var i in courses) {
      selectList+="<option value=\""+courses[i].title +"\">"+courses[i].title+"</option>";
    }
    selectList+="</select>";
    newDiv+=selectList;
    var priorityList = "<select id=\"course"+num+"Priority\" name=\"course"+num+"Priority\">";
    for (var i=1;i < 11;i++) {
      priorityList+="<option value="+i+">"+i+"</option>";
    }
    priorityList+="</select>";
    newDiv+=priorityList;
    newDiv+="</div>";

    $(newDiv).insertAfter("#courseRow"+(selectCount));
    if (selectCount == 2) {
      var removeButton = "<button id=\"removeButton\" type=\"button\" class=\"small-button\" onclick=\"removeCourseSelect()\">Remove Course</button>";
      $("#coursePriorityButtons").append(removeButton);
    }
  }
}

function removeCourseSelect() {
  var num = $('.course-row').length;;
  if (num == 2) {
    $("#courseRow"+num).remove();
    $("#removeButton").remove();
  } else {
    $("#courseRow"+num).remove();
  }
}

$(document).ready(function(){
    // console.log(courses);
  // populateCourses();
});
