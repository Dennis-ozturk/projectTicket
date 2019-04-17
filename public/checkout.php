<?php include_once('../includes/header.php'); ?>
<form action="" id="formData" class="formData" target="formData" method="post">
  <!-- Cart information -->
  <table class="table table-bordered container">
    <tbody>
      <tr class="items" id="items">
      </tr>
    </tbody>
  </table>

  <div class="content">
    <div class="summary-information">
      <div class="card" style="width: 18rem;">
        <div class="card-body">
          <h5 class="card-title text-muted">Summary</h5>
          <div class="rows">
            <span class="card-text">Total:</span>
            <span class="card-text" id="card-text"></span>
          </div>
          <div>
            <button class="btn btn-primary submitBtn" type="submit" name="buy">Buy</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</form>
<iframe name="formData" style="display:none;"></iframe>

<script src="assets/functions/displayTickets.js"></script>

<?php  
if(isset($_POST['data'])){
  echo($_POST['data']);
}

?>
<?php include_once('../includes/footer.php'); ?>