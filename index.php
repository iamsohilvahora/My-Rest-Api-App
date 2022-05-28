<?php include_once('config.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>My Rest Api App</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css">
	<!-- DataTable CSS -->
	<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
</head>
<body>
	<div class="container" style="margin-top: 20px;">
		<div class="panel panel-primary">
			<div class="panel-heading">WordPress Posts
				<a class="btn btn-success pull-right" style="margin-top: -5px;" data-toggle="modal" data-target="#createPost">Create New Post</a>
			</div>
			<div class="panel-body">
				<table id="example" class="display" style="width:100%">
				        <thead>
				            <tr>
				                <th>SR.No</th>
				                <th>Title</th>
				                <th>Description</th>
				                <th>Slug</th>
				                <th>Status</th>
				                <th>Action</th>
				            </tr>
				        </thead>
				        <tbody id="table-postdata">
						</tbody>
				    </table>
			</div>
		</div>
	</div>
	<!-- Create Post Modal -->
	<div class="modal fade" id="createPost" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="exampleModalLabel">Create Post</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	        <form id="createWpPostForm" action="Javascript:void(0)">
	          <div class="form-group row">
	            <label for="inputEmail3" class="col-sm-2 col-form-label">Post Title</label>
	            <div class="col-sm-10">
	              <input type="text" name="title" id="title" class="form-control" placeholder="Enter title" required>
	            </div>
	          </div>
	          <div class="form-group row">
	            <label for="inputPassword3" class="col-sm-2 col-form-label">Description</label>
	            <div class="col-sm-10">
	            	<textarea name="content" id="description" class="form-control" cols="10" rows="5" placeholder="Enter description" required></textarea>
	            </div>
	          </div>
	          <div class="form-group row">
	            <div class="col-sm-offset-2 col-sm-10">
	              <button type="submit" class="btn btn-success">Submit</button>
	            </div>
	          </div>
	        </form>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
	      </div>
	    </div>
	  </div>
	</div>
	<!-- Edit Post Modal -->
	<div class="modal fade" id="editPost" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="exampleModalLabel">Edit Post</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	        <form id="editWpPostForm" action="Javascript:void(0)">
	        	<input type="hidden" name="id" id="post-id">
	          <div class="form-group row">
	            <label for="inputEmail3" class="col-sm-2 col-form-label">Post Title</label>
	            <div class="col-sm-10">
	              <input type="text" name="title" id="editTitle" class="form-control" placeholder="Enter title">
	            </div>
	          </div>
	          <div class="form-group row">
	            <label for="inputPassword3" class="col-sm-2 col-form-label">Description</label>
	            <div class="col-sm-10">
	            	<textarea name="content" id="editDescription" class="form-control" cols="10" rows="5" placeholder="Enter description"></textarea>
	            </div>
	          </div>
	          <div class="form-group row">
	            <div class="col-sm-offset-2 col-sm-10">
	              <button type="submit" class="btn btn-success">Update</button>
	            </div>
	          </div>
	        </form>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
	      </div>
	    </div>
	  </div>
	</div>
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<!-- Latest compiled and minified JavaScript -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js"></script>
	<!-- DataTable JavaScript -->
	<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
	<!-- Custom JavaScript -->
	<script src="./assets/js/rest.js"></script>
	<script>
		var site_url = "<?php echo $site_url; ?>"; 	
	</script>
</body>
</html>