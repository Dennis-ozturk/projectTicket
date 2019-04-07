<?php include_once('../includes/header.php'); ?>
<form>
  <!-- Cart information -->
  <table class="table table-bordered container">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Date</th>
        <th scope="col">Seat</th>
        <th scope="col">Price each</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <th scope="row">1</th>
        <td>SE-DE Fotboll 20/5-19</td>
        <td>1A</td>
        <td>$20</td>
      </tr>
      <tr>
        <th scope="row">2</th>
        <td>SE-DE Fotboll 20/5-19</td>
        <td>1B</td>
        <td>$20</td>
      </tr>
    </tbody>
    <tfoot>
      <tr>
        <td>Summary</td>
        <td>$40</td>
        <td><button>Clear all</button></td>
        <td><button>Add new</button></td>
      </tr>
    </tfoot>
  </table>

  <div class="content">
    <div class="summary-information">
      <div class="card" style="width: 18rem;">
        <div class="card-body">
          <h5 class="card-title text-muted">Summary</h5>
          <p class="text-muted border-bottom">The total cost consist of the tax and
            the shopping charge.</p>
          <div class="rows">
            <span class="card-text">Tax:</span>
            <span class="card-text">$10</span>
          </div>
          <div class="rows">
            <span class="card-text">Tax:</span>
            <span class="card-text">$10</span>
          </div>
        </div>
      </div>
    </div>

    <div class="contact-form">
      <div class="form-group">
        <label for="exampleInputEmail1">Email address</label>
        <input type="email" class="form-control w-100" name="email" aria-describedby="emailHelp" placeholder="Enter email">
        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
      </div>
      <div class="form-group">
        <label for="exampleInputEmail1">Firstname</label>
        <input type="text" class="form-control w-100" name="firstname" placeholder="Enter firstname">
      </div>
      <div class="form-group">
        <label for="exampleInputEmail1">Lastname</label>
        <input type="text" class="form-control w-100" placeholder="Enter lastname">
      </div>
    </div>
  </div>


  <div class="container">
    
  </div>
</form>



<?php include_once('../includes/footer.php'); ?>