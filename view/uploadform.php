<div>
    <form action="index.php" id="upload" method="post" enctype="multipart/form-data">
        Change Profile Picture
        <input type="file" class="btn" name="image" id="fileToUpload">
        <input type="hidden" name="action" value="uploadImage">
        <input type="hidden" name="userId" value="<?=$_SESSION['userId'];?>">
        <input type="submit" class="greenStyle btn" value="Upload Image" name="submit">
    </form>
</div>