// geolocation
function showMap(position) {
  var coords = position.coords;
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

function getNearbyGroups() {
  // need to make a jquery AJAX call here
}
