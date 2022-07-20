<?php
session_start();
$title = "Create Content";
require_once 'header.php';
if(!isset($_SESSION['email']) || $_SESSION['email'] == "")
{
  header('location: index.php');
}
?>
<script type="text/x-mathjax-config">
MathJax.Hub.Config({
  tex2jax: {inlineMath: [['$$','$$'], ['\\(','\\)']]}
});
</script>
<script type="text/javascript" async
  src="node_modules/mathjax/es5/tex-chtml.js">
</script>
<script src="js/mathlive.min.js" charset="utf-8"></script>


<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Topic: <span id="topicName"></span></h1>
  <h4 class="text-gray-800">Content Title: <span id="contentTitle"></span></h4>
</div>
<div class="row justify-content-center">
  <div class="col-xl-6 col-md-6">
    <div class="card shadow mb-4">
      <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Add Topic Content</h6>
      </div>
      <div class="card-body">
        <div class="content-div">
            <form class="form" id="content-form" enctype="multipart/form-data">
              <textarea name="editor" id="editor" rows="8" cols="80"></textarea>
            </form>
        </div>
        <div class="action pt-4">
          <button type="button" class="btn btn-success" name="save" id="save">SAVE</button>
          <button type="button" class="btn btn-info" name="preview" id="preview">PREVIEW</button>
        </div>
      </div>
    </div>
  </div>
  <div class="col-xl-6 col-md-6">
    <div class="card shadow mb-4" style="position: fixed;">
      <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Math Latex Converter</h6>
      </div>
      <div class="card-body">
        <div class="row">
          <div class="col-xl-12 col-md-6">
            <div class="math-div">
              <math-field id="mf" virtual-keyboard-mode="manual" placeholder="Use the virtual keyboard">
              </math-field>
            </div>
          </div>
        </div>
        <hr>
        <div class="row mt-3">
          <div class="col-xl-12 col-md-12">
            <div class="latex">
              <textarea name="conv" rows="6" cols="80" class="form-control" id="conv" placeholder="Click on the virtual keyboard above to insert math characters"></textarea>
            </div>
            <div class="p-3">
              <button type="button" class="btn btn-primary" name="insert" id="insert">INSERT</button>
              <button type="button" class="btn btn-warning" name="copy" id="copy">COPY</button>
              <button type="button" class="btn btn-danger" name="clear" id="clear">CLEAR</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="row justify-content-center pt-4">
<?php
  require_once 'footer.php';
?>
