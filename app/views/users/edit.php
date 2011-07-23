    <div data-role="page">
      <div data-role="header">
        <h1>Edit Phone Number</h1>
      </div>
      <div data-role="content">  
        <form id="update-phone" action="/users/update" method="POST">
          <input type="text" name="phone" class="defaultText" title="Phone Number" />
          <input type="submit" value="Add" id="rattapbutton" />
        </form>
        <script type="text/javascript">
          $(document).ready(function() {
          })
        </script>
      </div>
    </div>
<script type="text/javascript">
  
  $(function() {
    $("#update-phone").submit(function() {
      $.ajax({
        type: 'POST',
        url: '/users/update',
        data: { phone: $("phone").val() },
        success: hideDialog
      });
    });
  });
</script>
