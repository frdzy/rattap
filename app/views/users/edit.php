    <div data-role="page">
      <div data-role="header">
        <h1>Edit Phone Number</h1>
      </div>
      <div data-role="content">  
        <form data-ajax="false" id="update-phone" action="/users/update" method="POST">
          <input type="text" name="phone" class="defaultText" title="Phone Number" />
          <input type="hidden" name="group_id" value="<?php echo htmlspecialchars($group_id) ?>" />
          <input type="submit" value="Add" id="rattapbutton" />
        </form>
      </div>
    </div>
