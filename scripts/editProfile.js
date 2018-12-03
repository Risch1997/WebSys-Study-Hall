
// Populates a course-select dropdown using the course list
function populateCourses(num) {
  for (var i in allCourses) {
    $("#courseList"+num).append("<option course-id=\""+allCourses[i].course_id+"\" value=\""  +allCourses[i].subject+" "
    +allCourses[i].course_number+"-"+allCourses[i].course_name+ "\" course_id=\""
    +"\"></option>");
  }

  $('#course'+num).change(function(){
      var course_id = $("#courseList"+num+" option[value='" + $('#course'+num).val() + "']").attr('course-id');
      $('#course'+num+'-id').val(course_id);
  });
}

// Pre fills the course-form with the user's data
function showCurrentCourses() {
  for (var i=0; i < currentCourses.length; i++) {
    addCourseSelect();
    var num = (i+1).toString();
    var courseObject = allCourses[currentCourses[i]["course_id"] - 1]
    var listVal = courseObject.subject+" "+courseObject.course_number+"-"+courseObject.course_name
    $("#course"+num).val(listVal);
    $("#course"+num+"-id").val(currentCourses[i]["course_id"]);
    $("#course"+num+"Priority").val(currentCourses[i]["priority"]);
  }

}

// Add a another course-select option to the form
function addCourseSelect() {
  var selectCount = $('.course-row').length;

  if (selectCount != 4) {
    var num = (selectCount+1).toString();
    var newDiv = "<br><div id=\"courseRow"+num+"\" class='course-row'>";
    var courseLabel = "<label for=\"course"+num+"\">Course: </label>";
    var inputList = "<input id=\"course"+num+"\" list=\"courseList"+num+"\" name=\"course"+num+"\">";
    var dataList =  "<datalist id=\"courseList"+num+"\"></datalist>";
    var hiddenVal = "<input id=\"course"+num+"-id\" type=\"hidden\" name=\"course"+num+"-id\"/>";

    dataList+=hiddenVal
    inputList+=dataList;

    newDiv+=courseLabel;
    newDiv+=inputList;

    var priorityLabel= "<label for=\"course"+num+"Priority\">  Priority: </label>";
    var priorityList = "<select id=\"course"+num+"Priority\" name=\"course"+num+"Priority\">";
    for (var i=1;i < 11;i++) {
      priorityList+="<option value="+i+">"+i+"</option>";
    }
    priorityList+="</select>";
    newDiv+=priorityLabel;
    newDiv+=priorityList;
    newDiv+="</div>";

    if (selectCount == 0) {
      var buttonDiv = "<div id=\"coursePriorityButtons\"> \
        <button type=\"button\" class=\"small-button\" onclick=\"addCourseSelect()\">Add Course</button> \
      </div>";
      newDiv += buttonDiv;
      $("#coursePriorities").append(newDiv);
    }
    else if (selectCount > 0) {
      $(newDiv).insertAfter("#courseRow"+(selectCount));
      if (selectCount == 1) {
        var removeButton = "<button id=\"removeButton\" type=\"button\" class=\"small-button\" onclick=\"removeCourseSelect()\">Remove Course</button>";
        $("#coursePriorityButtons").append(removeButton);
      }
    }
    populateCourses(num);
  }
}

// Removes a course-select option from the form
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
  $('#notification').hide();

  // Pre fill the form with the user's stored data
  if (semester == "") {
    $("#semester").val("fall");
  } else {
    $("#semester").val(semester);
  }
  if (!year) {
    $("#year").val(2021);
  } else {
    $("#year").val(year);
  }
  if (major == "") {
    $("#major").val("Computer Science");
  } else {
    $("#major").val(major);
  }
  if (minor == "") {
    $("#minor").val("None");
  } else {
    $("#minor").val(minor);
  }
  if (currentCourses.length > 0) {
    showCurrentCourses();
  } else {
    addCourseSelect();
  }
});
