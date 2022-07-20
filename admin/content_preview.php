<?php
session_start();
$title = "Content Preview";
require_once 'header.php';
if(!isset($_SESSION['email']) || $_SESSION['email'] == "")
{
  header('location: index.php');
}
?>
<script type="text/x-mathjax-config">
MathJax.Hub.Config({
  tex2jax: {inlineMath: [['$','$'], ['\\(','\\)']]}
});
</script>
<script type="text/javascript" async
  src="node_modules/mathjax/es5/tex-chtml.js">
</script>



<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Content Preview</h1>
</div>
<div class="row justify-content-center">
  <div class="col-xl-6 col-md-6">
    <div class="card shadow mb-4">
      <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Add Topic Content</h6>
      </div>
      <div class="card-body">
        <div id="display">
        </div>
      </div>
    </div>
  </div>
</div>
<?php
  require_once 'footer.php';
?>
