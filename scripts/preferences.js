var courses = [
  {
    prefix: "CSCI",
    title: "Foundations of Computer Science",
    crn: 2200,
  },
  {
    prefix: "CSCI",
    title: "Data Scructures",
    crn: 1200,
  },
  {
    prefix: "ITWS",
    title: "Introduction to Information Technology and Web Science",
    crn: 1100,
  },
  {
    prefix: "CSCI",
    title: "Computer Science 1",
    crn: 1100,
  },
  {
    prefix: "MATH",
    title: "Multivariable Calculus and Matrix Algebra",
    crn: 2010,
  }
];

function populateCourses() {
  for (var i in courses) {
    $("#course1").append("<option value=\""+courses[i].title +"\">"+courses[i].title+"</option>");
  }
}

function addCourseSelect() {
  var selectCount = document.getElementById('coursePriorities').getElementsByTagName('select').length;
  if (selectCount != courses.length) {
    var num = (selectCount+1).toString();
    var removeId = "removeCourseSelect"+num;
    var selectList = "<select id=\"course"+num+"\" name=\"course"+num+"\">";
    for (var i in courses) {
      selectList+="<option value=\""+courses[i].title +"\">"+courses[i].title+"</option>";
    }
    selectList+="</select>";
    $(selectList).insertAfter("#course"+selectCount);
    if (selectCount == 1) {
      var removeButton = "<button id=\"removeButton\" type=\"button\" class=\"small-button\" onclick=\"removeCourseSelect()\">Remove Course</button>";
      $("#coursePriorities").append(removeButton);
    }
  }
}

function removeCourseSelect() {
  var num = document.getElementById('coursePriorities').getElementsByTagName('select').length;
  if (num == 2) {
    $("#course"+num).remove();
    $("#removeButton").remove();
  } else {
    $("#course"+num).remove();
  }
}

$(document).ready(function(){
  populateCourses();
});
