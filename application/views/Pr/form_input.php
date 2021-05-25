<div class="panel-heading" style="background: #dcdcdc">

</div>

<?php

echo form_open('Pr');
?>
<h1 class="bg-info text-white text-center p-2 fixed-top">Form Problem Report</h1>
<style>
body {
    margin-top:40px;
}
.stepwizard-step p {
    margin-top: 10px;
}
.stepwizard-row {
    display: table-row;
}
.stepwizard {
    display: table;
    width: 50%;
    position: relative;
}
.stepwizard-step button[disabled] {
    opacity: 1 !important;
    filter: alpha(opacity=100) !important;
}
.stepwizard-row:before {
    top: 14px;
    bottom: 0;
    position: absolute;
    content: " ";
    width: 100%;
    height: 1px;
    background-color: #ccc;
    z-order: 0;
}
.stepwizard-step {
    display: table-cell;
    text-align: center;
    position: relative;
}
.btn-circle {
    width: 30px;
    height: 30px;
    text-align: center;
    padding: 6px 0;
    font-size: 12px;
    line-height: 1.428571429;
    border-radius: 15px;
}
</style>
</head>
 <body>
<div class="container">
  
  <div class="stepwizard col-md-offset-3">
      <div class="stepwizard-row setup-panel">
        <div class="stepwizard-step">
          <a href="#step-1" type="button" class="btn btn-primary btn-circle">1</a>
          <p>Step 1</p>
        </div>
        <div class="stepwizard-step">
          <a href="#step-2" type="button" class="btn btn-default btn-circle" disabled="disabled">2</a>
          <p>Step 2</p>
        </div>
        <div class="stepwizard-step">
          <a href="#step-3" type="button" class="btn btn-default btn-circle" disabled="disabled">3</a>
          <p>Step 3</p>
        </div>
      </div>
    </div>
    
    <form role="form" action="" method="post">
      <div class="row setup-content" id="step-1">
        <div class="col-xs-6 col-md-offset-3">
          <div class="col-md-12">
            <h3> Step 1</h3>
            <div class="form-group">
              <label class="control-label">Kode Pegawai</label>
              <input  maxlength="100" name="Id_peg" type="text" required="required" class="form-control" placeholder="Enter First Name" VALUE = "<?php echo $this->session->userdata('Id_peg'); ?>" readonly  />
            </div>
			<div class="form-group">
              <label class="control-label">Kode Rincian</label>
              <input  maxlength="100" name="Id_rincian" type="text" required="required" class="form-control" placeholder="Enter First Name" VALUE = "<?php echo $record2['Id_rincian'] ?>" readonly  />
            </div>
			<div class="form-group">
              <label class="control-label">Kode</label>
              <input  maxlength="100" name="Id_a3report" type="text" required="required" class="form-control" placeholder="Enter First Name" VALUE = "<?php echo $kode; ?>" readonly  />
            </div>
            <div class="form-group">
              <label class="control-label">Tema</label>
              <input  maxlength="100" name="tema" type="text" required="required" class="form-control" placeholder="Enter First Name"  />
            </div>
            <div class="form-group">
              <label class="control-label">Problem Statement</label>
              <input maxlength="100" name="problem_statement" type="text" required="required" class="form-control" placeholder="Enter Last Name" />
            </div>
            <button class="btn btn-primary nextBtn btn-lg pull-right" type="button" >Next</button>
          </div>
        </div>
      </div>
      <div class="row setup-content" id="step-2">
        <div class="col-xs-6 col-md-offset-3">
          <div class="col-md-12">
            <h3> Step 2</h3>
            <div class="form-group">
            <div class="form-group">
              <label class="control-label">target</label>
              <textarea required="required" name="target" class="form-control" placeholder="Enter your address" ></textarea>
            </div>
              <label class="control-label">Aliran Proses</label>
              <input maxlength="200"name="aliran_proses" type="text" required="required" class="form-control" placeholder="Enter Company Name" />
            </div>
            <button class="btn btn-primary nextBtn btn-lg pull-right" type="button" >Next</button>
          </div>
        </div>
      </div>
      <div class="row setup-content" id="step-3">
        <div class="col-xs-6 col-md-offset-3">
          <div class="col-md-12">
            <h3> Step 3</h3>
            <div class="form-group">
              <label class="control-label">Implementasi</label>
              <input maxlength="200" name="implementasi" type="text" required="required" class="form-control" placeholder="Enter Company Address"  />
            </div>
            <div class="form-group">
              <label class="control-label">yokoten</label>
              <input maxlength="200" name="yokoten" type="text" required="required" class="form-control" placeholder="Enter Company Address"  />
            </div>
            <button class="btn btn-primary" type="submit" name="submit"  value="submit" > Submit</button>
          </div>
        </div>
      </div>
    </form>
    
  </div>
  </head>
 <body>
 <script>
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//code.jquery.com/jquery-1.10.2.min.js"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script type="text/javascript">
  $(document).ready(function () {
  var navListItems = $('div.setup-panel div a'),
          allWells = $('.setup-content'),
          allNextBtn = $('.nextBtn');

  allWells.hide();

  navListItems.click(function (e) {
      e.preventDefault();
      var $target = $($(this).attr('href')),
              $item = $(this);

      if (!$item.hasClass('disabled')) {
          navListItems.removeClass('btn-primary').addClass('btn-default');
          $item.addClass('btn-primary');
          allWells.hide();
          $target.show();
          $target.find('input:eq(0)').focus();
      }
  });

  allNextBtn.click(function(){
      var curStep = $(this).closest(".setup-content"),
          curStepBtn = curStep.attr("id"),
          nextStepWizard = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().next().children("a"),
          curInputs = curStep.find("input[type='text'],input[type='url']"),
          isValid = true;

      $(".form-group").removeClass("has-error");
      for(var i=0; i<curInputs.length; i++){
          if (!curInputs[i].validity.valid){
              isValid = false;
              $(curInputs[i]).closest(".form-group").addClass("has-error");
          }
      }

      if (isValid)
          nextStepWizard.removeAttr('disabled').trigger('click');
  });

  $('div.setup-panel div a.btn-primary').trigger('click');
});
  </script>