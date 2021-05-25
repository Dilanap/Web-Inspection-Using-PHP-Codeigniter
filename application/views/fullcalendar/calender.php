
<div class="col-md-12" style="text-align:right; margin-bottom: 10px; margin-top: -5px; ">
  <form action="<?php echo base_url()?>review_mps/approved/<?php echo date('mY', strtotime('+1 month', strtotime('m'))); ?>" method="post"><button type="submit" class="btn btn-success">Approved</button></form>
</div>

<div id='calendar'></div>
   <script>
    $(document).ready(function() {
      $('#calendar').fullCalendar({
      });
    });
  </script>