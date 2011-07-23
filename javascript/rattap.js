// geolocation
var coords = {latitude: 0.0, longitude: 0.0};
function showMap(position) {
  coords = position.coords;
  document.getElementById("latitude").value = coords.latitude;
  document.getElementById("longitude").value = coords.longitude;
}
navigator.geolocation.getCurrentPosition(showMap);

// hint text for input text
$(document).ready(function()
{
  $(".defaultText").focus(function(srcc) {
    if ($(this).val() == $(this)[0].title) {
      $(this).removeClass("defaultTextActive");
      $(this).val("");
    }
  });
  $(".defaultText").blur(function() {
    if ($(this).val() == "") {
      $(this).addClass("defaultTextActive");
      $(this).val($(this)[0].title);
    }
  });
  $(".defaultText").blur();        
});

function showNearbyGroups(data, textStatus, jqXHR) {
  var html = ""
  var obj = eval(data);
  // TODO save groups?
  for (group in obj) {
    // TODO join link
    html += "<li><a href=\"/groups/join?group_id=" + obj[group].groupid + "\">" + obj[group].groupname + "</a></li>\n";
  }
  document.getElementById("nearbyGroupList").innerHTML = html;
}
    
function getNearbyGroups() {
  $.ajax({
    type: 'POST',
    url: '/groups/nearby',
    data: {latitude: coords.latitude, longitude: coords.longitude},
    success: showNearbyGroups});
}
