<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>add</title>
  <link rel="stylesheet" href="/Public/Admin/css/add.css">
</head>
<body>
<div>
  我是add
</div>
<p>TP的模板引擎</p>
<span><?php echo ($img); ?></span>
<p>直接使用echo函数</p>
<span>
  <?php echo $img; ?>
</span>
<p>TP的模板引擎输出数组</p>
<span><?php echo ($data["name"]); ?></span>
<p>直接使用费php函数输出数组</p>
<span><?php echo $data['name'] ?></span>
</body>
</html>