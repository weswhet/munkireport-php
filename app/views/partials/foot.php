  <div class="container">

    <div style="text-align: right; margin: 10px; color: #bbb; font-size: 80%;">

      <i>MunkiReport <span data-i18n="version">Version</span> <?php echo $GLOBALS['version']; ?></i>

    </div>

  </div>

  <!-- Modal -->
  <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="myModalLabel"></h4>
        </div>
        <div class="modal-body">
          ...
        </div>
        <div class="modal-footer">
          <button data-i18n="dialog.cancel" type="button" class="btn btn-default" data-dismiss="modal"></button>
          <button type="button" class="btn btn-primary ok"></button>
        </div>
      </div>
    </div>
  </div>

  <?php foreach($GLOBALS['alerts'] AS $type => $list): ?>

  <div class="mr-alert alert alert-dismissable alert-<?php echo $type; ?>">

    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>

    <ul>

    <?php foreach ($list AS $msg): ?>

      <li><?php echo $msg; ?></li>

    <?php endforeach; ?>

    </ul>

  </div>

  <?php endforeach; ?>

  <script>
    $('.mr-alert').prependTo('body>div.container:first');
	var munkireport = { debug: <?php echo conf('debug') ? 'true' : 'false'; ?>, subdirectory: "<?php echo conf('subdirectory'); ?>" }
  </script>


  <script src="<?php echo conf('subdirectory'); ?>assets/js/bootstrap.min.js"></script>
  <script src="<?php echo conf('subdirectory'); ?>assets/js/datatables.min.js"></script>
  <script src="<?php echo conf('subdirectory'); ?>assets/js/moment.min.js"></script>
  <script src="<?php echo conf('subdirectory'); ?>assets/js/i18next.min.js"></script>
  <script src="<?php echo conf('subdirectory'); ?>assets/js/d3/d3.min.js"></script>
  <script src="<?php echo conf('subdirectory'); ?>assets/js/nv.d3.min.js"></script>
  <script src="<?php echo conf('subdirectory'); ?>assets/js/jquery.hotkeys/jquery.hotkeys.js"></script>
  <script src="<?php echo conf('subdirectory'); ?>assets/js/munkireport.settings.js"></script>

  <script>


  </script>
  

  <?php if(conf('custom_js')): ?> 
  <script src="<?php echo conf('custom_js'); ?>"></script>
  <?php endif; ?>

  <script src="<?php echo conf('subdirectory'); ?>assets/js/munkireport.js"></script>
  
  <script>
  $(document).on('appUpdate', function(){
      //$.getJSON( appUrl + '/module/notification/runCheck', function( data ) {
          // Maybe add some counter to only run every 10 mins.
          // CHeck if the data contains errors
          // Check if there are desktop notifications
      //});
  });
  </script>

</body>
</html>