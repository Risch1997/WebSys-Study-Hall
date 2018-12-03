function refresh() {
  $('.matches').children().remove;
}
function displayMatch(match) {
  var matchHtml = '<div class="column"> \
    <div class="card"> \
      <h2>'+match.first_name+' '+match.last_name+'</h2> \
      <p>'+match.email+'</p> \
      <p>'+match.priority+'</p> \
    </div> \
  </div> ';
  $("#matches-list").append(matchHtml);
  console.log(match);
}
function sleep(ms) {
  return new Promise(resolve => setTimeout(resolve, ms));
}
function init(){
  if(obj!=null){
    console.log("JS side: ",obj);
    for (var i = 0; i < obj.length; i++) {
      displayMatch(obj[i]);
    };
  }
}
$(document).ready(function(){
  init();
});
