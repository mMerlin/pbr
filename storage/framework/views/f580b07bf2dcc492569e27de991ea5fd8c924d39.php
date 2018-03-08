<?php $__env->startSection('content'); ?>

<div class="panel panel-default" style="border-color:blue">
<div class="panel-body">

<ul class="nav nav-pills">
  <li class="active"><a data-toggle="pill" href="#global_map"><?php echo app('translator')->get('messages.map'); ?></a></li>
  <li><a data-toggle="pill" href="#global_list"><?php echo app('translator')->get('messages.list'); ?></a></li>
</ul>

<div class="tab-content">
  <div id="global_map" class="tab-pane fade in active">
    <div style="height:3px"></div>
    <div class="container-fluid" style="height:400px;width:100%">
      <div id="map_canvas" style="height:100%"></div>
    </div>
  </div>
  <div id="global_list" class="tab-pane fade">
    <div class="table table-condensed table-responsive">
      <table class="table">
        <thead>
          <tr class="info">
            <th><?php echo app('translator')->get('messages.view'); ?></th>
            <th><?php echo app('translator')->get('bioreactor.head_id'); ?></th>
            <th><?php echo app('translator')->get('bioreactor.head_name'); ?></th>
            <th><?php echo app('translator')->get('bioreactor.head_city'); ?></th>
            <th><?php echo app('translator')->get('bioreactor.head_country'); ?></th>
          </tr>
        </thead>
        <tbody>
<?php foreach($dbdata as $bioreactor): ?>
          <tr>
            <td><a class="btn btn-success btn-xs" href="/single/<?php echo e($bioreactor->deviceid); ?>">Go</a></td>
            <td><?php echo e($bioreactor->deviceid); ?></td>
            <td><?php echo e($bioreactor->name); ?></td>
            <td><?php echo e($bioreactor->city); ?></td>
            <td><?php echo e($bioreactor->country); ?></td>
          </tr>
<?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>
</div>

</div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer_js'); ?>
  <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true"></script>
  <script type="text/javascript" src="/js/ui/jquery.ui.map.js"></script>

  <script type="text/javascript">
$('#map_canvas').gmap().bind('init', function() {
  $.getJSON( '/getjson', function(data) {

    $.each( data.markers, function(i, marker) {
      var lat = parseFloat(marker.latitude);
      var long = parseFloat(marker.longitude);
      var href = '/single/' + marker.deviceid;
      var butcontent = marker.name + '&nbsp;<a href="'+href+'"><button type="button" class="btn btn-success btn-xs">Go</button></a>';

      $('#map_canvas').gmap('addMarker', {
        'position': new google.maps.LatLng(lat, long),
        'bounds': true
      }).click(function() {
        $('#map_canvas').gmap('openInfoWindow', { 'content': butcontent }, this);
      });
    });
  });
});
  </script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>