// Page specific code
function attachPageHandlers(pageName, handler) {
  if (typeof handler.init === 'function') {
    $("#" + pageName).live("pageshow", function(event, ui) {
      handler.init();
    });
  }
  if (typeof handler.unload === 'function') {
    $("#" + pageName).live("pagehide", function(event, ui) {
      handler.unload();
    });
  }
}
$(function() {
  attachPageHandlers("public-index", publicIndexPage);
  attachPageHandlers("groups-index", groupsIndexPage);
  attachPageHandlers("groups-show", groupsShowPage);
});

var publicIndexPage = {
  init: function() {
    initializeDefaultText();
    // Get current position and assign to form
    getCurrentPosition(assignCoordValues);
  }
};

var groupsIndexPage = {
  refresher: null,
  init: function() {
    $(".nearbyGroupList").listview();
    getNearbyGroups();
    groupsIndexPage.stopTimeout();
    groupsIndexPage.refresher = window.setInterval(getNearbyGroups, 2000);
    getCurrentPosition(assignCoordValues);
  },
  stopTimeout: function() {
    if (groupsIndexPage.refresher) {
      clearInterval(groupsIndexPage.refresher);
      groupsIndexPage.refresher = null;
    }
  },
  unload: function() {
    groupsIndexPage.stopTimeout();
  }
};

var groupsShowPage = {
  groupMembersInterval: null,
  groupId: 0,
  showDialog: false,
  init: function() {
    $(".groupMemberList").listview();
    var callback = function() {
      getGroupMembers(groupsShowPage.groupId);
    };
    callback();
    groupsShowPage.stopInterval();
    groupsShowPage.groupMembersInterval = window.setInterval(callback, 1500);
  },
  stopInterval: function() {
    if (groupsIndexPage.groupMembersInterval) {
      clearInterval(groupsIndexPage.groupMembersInterval);
      groupsIndexPage.groupMembersInterval = null;
    }
  },
  unload: function() {
    groupsIndexPage.stopInterval();
  }
}

// Geolocation
var coords = {latitude: 0.0, longitude: 0.0};

function getCurrentPosition(callback) {
  if (coords.latitude != 0.0 || coords.longitude != 0.0) {
    callback(coords);
  }
  var pos_handler = function(position) {
    coords = position.coords;
    callback(coords);
  };
  navigator.geolocation.getCurrentPosition(pos_handler);
}

function assignCoordValues(position) {
  $(".latitude").val(position.latitude);
  $(".longitude").val(position.longitude);
}

// hint text for input text
function initializeDefaultText() {
  $(".defaultText").focus(function(event, ui) {
    if ($(this).val() == $(this)[0].title) {
      $(this).removeClass("defaultTextActive");
      $(this).val("");
    }
  });
  $(".defaultText").blur(function(event, ui) {
    if ($(this).val() == "") {
      $(this).addClass("defaultTextActive");
      $(this).val($(this)[0].title);
    }
  });
  $("form").submit(function(event, ui) {
    $(".defaultText").each(function() {
      if ($(this).val() == $(this)[0].title) {
        $(this).val("");
      }
    });
  });
  $(".defaultText").blur();        
}

function showNearbyGroups(data, textStatus, jqXHR) {
  var obj = JSON.parse(data);
  $(".nearbyGroupList").html("");
  for (group in obj) {
    $(".nearbyGroupList").append("<li><a href=\"/groups/join?group_id=" + obj[group].groupid + "\">" + obj[group].groupname + "</a></li>");
  }
  $(".nearbyGroupList").listview("refresh");
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

function showGroupMembers(data, textStatus, jqXHR) {
  var obj = JSON.parse(data);
  $(".groupMemberList").html("");
  for (member in obj) {
    var phone = obj[member].password;
    if (phone == "") {
      phone = "Waiting...";
    }
    $(".groupMemberList").append("<li>" + obj[member].username + "<span style='float: right'>" + phone + "</span></li>");
  }
  $(".groupMemberList").listview("refresh");
}
    
function getGroupMembers(id) {
  $.ajax({
    type: 'POST',
    url: '/groups/getMembers',
    data: {group_id: id},
    success: showGroupMembers});
}
