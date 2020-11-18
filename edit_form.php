<!DOCTYPE html>
<html>
<head>
    	<title>Edited Form</title>
	<meta charset="utf-8">
    	<meta name="viewport" content="width=device-width, initial-scale=1">
    	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
<?php
$conn = mysqli_init();
mysqli_real_connect($conn, 'itfraiden.mysql.database.azure.com', 'raiden@itfraiden', 'Itf12644', 'itf63070222', 3306);
if (mysqli_connect_errno($conn))
{
    die('Failed to connect to MySQL: '.mysqli_connect_error());
}
    
$ID = $_POST['ID'];
$sql = "SELECT * FROM guestbook WHERE ID='$ID'";
$res = mysqli_query($conn, $sql);
$comment = mysqli_fetch_array($res);
?>
    <div class="container">
        <div align="center"><h1>Edit comment</h1></div>
        <form action="edit.php" method="post" class="mt-4">
            <input type="hidden" name="ID" value=<?php echo $comment['ID'];?>>
            <div class="form-group row">
    			<label for="inputName" class="col-sm-2 col-form-label">Name</label>
    			<div class="col-sm-10">
                <?php
                    echo '<input type="text" name="name" id="inputName" class="form-control" placeholder="Enter Name" value="'.$comment["Name"].'">'
                ?>
            </div>
            <div class="form-group row">
    			<label for="inputComment" class="col-sm-2 col-form-label">Comment</label>
    			<div class="col-sm-10">
                <type="comment" name="comment" class="form-control" id="inputComment" placeholder="Enter Comment"><?php echo $comment['Comment'];?>
            </div>
            <div class="form-group row">
                <label for="inputComment" class="col-sm-2 col-form-label">Link</label>
                <div class="col-sm-10">
                <?php
                    echo '<input type="text" name="link" id="inputLink" class="form-control" placeholder="Enter Link" value="'.$comment["Link"].'">'
                ?>
            </div>
            <div class="mt-4">
                <button type="submit" class="btn btn-primary mr-1">Save</button>
                <a role="button" class="btn btn-secondary" href="show.php">Back</a>
            </div>
        </form>
    </div>
<?php
mysqli_close($conn);
?>
</body>
</html>