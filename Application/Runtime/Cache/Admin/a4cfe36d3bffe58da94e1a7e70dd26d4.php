<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>文件上传</title>
</head>
<body>
<form action="" method="post" enctype="multipart/form-data">
  <div class="name">
    <label for="name">名称</label>
    <input type="text" id="name" name="name">
  </div>
  <div class="file">
    <label for="file">文件上传</label>
    <input type="file" id="file" name="file">
  </div>
  <div class="button">
    <button type="submit">上传</button>
  </div>
</form>
</body>
</html>