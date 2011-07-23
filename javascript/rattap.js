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
  // TODO save groups?
  for (group in data) {
    // TODO join link
    html += "<li>" + group[name] + "(" + group[members] + ")</li>\n";
  }
  Document.getElementById("nearbyGroupList").innerHTML = html;
}
    
function getNearbyGroups() {
  $.ajax({
    type: 'POST',
    url: '/groups/nearby',
    data: {latitude: coords.latitude, longitude: coordes.longitude},
    success: showNearbyGroups});
}
