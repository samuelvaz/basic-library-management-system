<!DOCTYPE html>
	<html>
	<head>
		<title>Upload image</title>
	</head>
	<body>

	<form action="manage-books.php" method="post" enctype="multipart/form-data" >
	<div class="form-group">	
	<label>Image<span style="color:red;">*</span></label>
    <input type='file' name='file'class="form-control" size='35'>

    <button type="submit" name="upload" class="btn btn-info">Upload </button>
	</div>
    </form>
	</body>
	</html>	