    <div data-role="page">
      <div data-role="header">
        <h1><?php echo $group['groupname'] ?></h1>
      </div>
      <div data-role="content">
     <ul data-role="listview" data-inset="true" data-theme"c" data-divider-theme="b" id="groupMemberList"></ul>
        <script type="text/javascript">
          $(document).ready(function() {
            window.setTimeout("getGroupMembers(<?php echo $group['groupid']; ?>)", 500);
          })
        </script>
      </div>
    </div>
