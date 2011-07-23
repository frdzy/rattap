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
  var obj = eval(data);
  document.getElementById("nearbyGroupList").innerHTML = "";
  for (group in obj) {
    $("#nearbyGroupList").append("<li><a href=\"/groups/join?group_id=" + obj[group].groupid + "\">" + obj[group].groupname + "</a></li>");
    $("#nearbyGroupList").listview("refresh");
  }
  window.setTimeout("getNearbyGroups()", 1200);
}

function addCoord() {
  $('#lat').val(coords.latitude);
  $('#long').val(coords.longitude);
}

function hideDialog() {
  $('.ui-dialog').dialog('close');
}
    
function getNearbyGroups() {
  $.ajax({
    type: 'POST',
    url: '/groups/nearby',
    data: {latitude: coords.latitude, longitude: coords.longitude},
    success: showNearbyGroups});
}

var recall_id = 0;
function showGroupMembers(data, textStatus, jqXHR) {
  var obj = eval(data);
  document.getElementById("groupMemberList").innerHTML = "";
  for (member in obj) {
    $("#groupMemberList").append("<li>" + obj[member].username + "<span style='float: right'>" + obj[member].password + "</span></li>");
    $("#groupMemberList").listview("refresh");
  }
  window.setTimeout("getGroupMembers(" + recall_id + ")", 1200);
}
    
function getGroupMembers(id) {
  recall_id = id;
  $.ajax({
    type: 'POST',
    url: '/groups/getmembers',
    data: {group_id: id},
    success: showGroupMembers});
}
