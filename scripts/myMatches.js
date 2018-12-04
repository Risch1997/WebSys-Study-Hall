

function populatePending() {
  for (var i=0; i < allPending.length;i++) {
    var student = allPending[i];
    var card = "<div class=\"card\"> \
        <h3>" + student['first_name'] + " " + student['last_name'] + "</h3> \
        <p><strong>Major:</strong> " + student['major'] + "</p> \
        <p><strong>Graduation Date:</strong> " + student['graduation_semester'] + " " + student['graduation_year'] + "</p> \
        <p class=\"centered\"><strong>Courses</strong></p>";
    student.courses.forEach(function(course) {
      card+="<p>" + course['subject'] + " " + course['course_number'] + "-" + course['course_name'] + "</p>";
    });
    var options = "<div class=\"btn-group\"> \
        <form method=\"POST\"> \
          <input type=\"hidden\" name=\"matchId\" value=\"" + student['match_id'] + "\" /> \
          <input type=\"submit\" class=\"inviteButton\" name=\"accept\" value=\"Accept\" /> \
          <input type=\"submit\" class=\"removeButton\" name=\"remove\" value=\"Remove\" /> \
          </div> \
        </form> \
      </div>";
    card+=options;
    $("#pending .card-container").append(card);
  }
}

function populateAccepted() {
  for (var i=0; i < allAccepted.length;i++) {
    var student = allAccepted[i];
    var card = "<div class=\"card\"> \
        <h3>" + student['first_name'] + " " + student['last_name'] + "</h3> \
        <p><strong>Major:</strong> " + student['major'] + "</p> \
        <p><strong>Graduation Date:</strong> " + student['graduation_semester'] + " " + student['graduation_year'] + "</p> \
        <p class=\"centered\"><strong>Courses</strong></p>";
    student.courses.forEach(function(course) {
      card+="<p>" + course['subject'] + " " + course['course_number'] + "-" + course['course_name'] + "</p>";
    });
    var options = "<div class=\"btn-group\"> \
        <form method=\"POST\"> \
          <input type=\"hidden\" name=\"matchId\" value=\"" + student['match_id'] + "\" /> \
          <input type=\"submit\" class=\"removeButton\" name=\"remove\" value=\"Remove\" /> \
          </div> \
        </form> \
      </div>";
    card+=options;
    $("#accepted .card-container").append(card);
  }
}

$(document).ready(function(){
  populatePending();
  populateAccepted();
});
