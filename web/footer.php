<div class="footer">
      Last edited:
      <?php
        putenv("TZ=America/Los_Angeles");
        echo date("m/d/y", filemtime($_SERVER["SCRIPT_FILENAME"]));
      ?>
    </div>
</body>

