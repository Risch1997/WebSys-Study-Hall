function onSelectPrefixChange(id,prefix) {
  var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');  // XMLHttpRequest instance

  // create pairs index=value with data that must be sent to php
  var data = 'prefix='+prefix;
  request.open("POST", '../functions/functions_edit_profile.php', true);    // set the request

  // adds  a header to tell the PHP script to recognize the data as is sent via POST
  request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  request.send(data);		// sends datas to php

  request.onreadystatechange = function() {
    if(request.readyState == 4) {
      console.log(request.responseText);
    }
  }
};

//Populate an input list with courses
function populateCourses(id, prefix) {
  for (var i in courses) {
    $("#course"+id).append("<option value=\""+courses[i].title +"\">"+courses[i].title+"</option>");
  }
}

//Populate an input list with course prefixes
function populatePrefixes(id) {
  for (var i in prefixes) {
    $("#course"+id+"Prefix").append("<option value=\""+prefixes[i]["subject"]+"\">"+prefixes[i]["subject"]+"</option>");
  }
}

//Add a Course Selection row to the form
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

// Remove a Course Select row to the form
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

  // Set all the user's saved profile information in the form
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
  populatePrefixes("1");
});
