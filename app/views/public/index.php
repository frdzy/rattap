    <div data-role="page">
      <div data-role="header">
        <h1>ratTap</h1>
      </div>
      <div data-role="content">  
        <form action="/users/new" method="POST">
          <input type="text" name="name" class="defaultText" title="Your Name..." />
          <input type="hidden" name="latitude" id="latitude" />
          <input type="hidden" name="longitude" id="longitude" />
          <input type="submit" value="ratTap!" />
        </form>
      </div>
    </div>
