<?php 
	session_start();
$title = "Edit Topic";
require_once 'header.php';
if(!isset($_SESSION['email']) || $_SESSION['email'] == "")
{
  header('location: index.php');
}
?>
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Contents for topic: <span id="topicName"></span></h1>
</div>

<div class="row justify-content-center">
  <div class="col-xl-8 col-md-8">
    <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">All Contents</h6>
            </div>
          <div class="card-body">
              <div class="table-responsive">
                 <table class="table" id="dataTable" width="100%" cellspacing="0">
                      <thead>
                        <tr>
                          <th> S/N</th>
                          <th>Title</th>
                          <th>Date</th>
                          <th>Action</th>
                        </tr>
                    </thead>
                    <tbody id="contentTable">

                    </tbody>
                </table>
              </div>
              <div id="action">
                <button type="button" class="btn btn-success" id="add-content" data-toggle="modal" data-target="#addModal">Add Content</button>                
              </div>
          </div>
      </div>
</div>
</div>


<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
      aria-hidden="true">
      <div class="modal-dialog" role="document">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Delete Course?</h5>
                  <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">×</span>
                  </button>
              </div>
              <div class="modal-body"><span style="color: red;">Topic content will alobe deleted.This action cannot be undone.</span></div>
              <div class="modal-footer">
                  <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                  <button class="btn btn-danger" id="delete-confirm" value="">Delete</a></button>
              </div>
          </div>
      </div>
  </div>

<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
      aria-hidden="true">
      <div class="modal-dialog" role="document">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Add an new Content</h5>
                  <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">×</span>
                  </button>
              </div>
              <div class="modal-body">
              	<form class="form" id="content-form" method="post" action="">
              		<div class="form-group">
              			<span for="content-title"></span>
              			<input class="form-control" id="content-title" name="content-title" placeholder="Content Title">
              		</div>
              		<div class="form-group">
              			<button type="button" class="btn btn-success" id="submit">Submit</button>
              		</div>
              		
              	</form>
              </div>
              <div class="modal-footer">
                  <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                  <button class="btn btn-danger" id="delete-confirm" value="">Delete</a></button>
              </div>
          </div>
      </div>
  </div>

<?php
  require_once 'footer.php';
?>