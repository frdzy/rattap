<?php

function users_call($func) {
  switch ($func) {
    case 'new':
      make_new_user();
      break;
    case 'update':
      update_user();
      break;
    default:
      error_log("[CTRL] users_controller: users_call -".$func);
  }
}

function make_new_user() {
  echo "NEW USER!";
}

function update_user() {
  echo "UPDATE USER!";
  echo "ARGS:".$_POST['post']."!";
}
