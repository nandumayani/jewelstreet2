<div class="col-sm-12" style="padding:20px; border-bottom: 1px solid #ccc;">
  <div class="col-sm-9">
    <h4>Sales List</h4>
  </div>
</div>

<?php if ($this->uri->segment(1) == 'user') { ?>
  <div id="phraseAddForm" class="col-sm-12" style="display:block; border-top: 0px solid #ccc; border-bottom: 1px solid #ccc; padding: 15px 0px 15px 0px;">
    <div class="alert col-sm-12" style="display: none;"></div>
    <form name="form_quanty" id="form_quanty" action="#" method="post">
      <div class="row">
        <div class="col-sm-4">
          Sold Quantity: 
        </div>
        <div class="col-sm-4">
          <input type="number" class="form-control" name="quantity" id="quantity" placeholder="Quantity(in gms)">
        </div>
        <div class="col-sm-4">
          <input type="button" class="btn btn-success" id="quantyAdd" name="submitBtn" value="<?php echo 'Add'; ?>"/>
          <input type="reset" class="btn btn-danger" id="quantyCancel" name="cancelBtn" value="<?php echo 'Cancel'; ?>"/>
        </div>
      </div>
    </form>
  </div>
<?php } ?>

<div class="row">
  <div class="col-sm-12">
    <table id="TablePurchaseItems" class="table table-striped table-condensed" cellspacing="0" width="100%">
      <thead>
        <tr>
          <!--<th>Id</th>-->
          <th>Name</th>
          <th>Shop</th>
          <th>Sold Quantity(in gms)</th>
          <th>Sold Date</th>
        </tr>
      </thead>
    </table>
  </div>
</div>