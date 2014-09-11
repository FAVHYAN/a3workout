<?php include('header.php');?>

<?php if(validation_errors()):?>
<div class="alert alert-danger">
  <a class="close" data-dismiss="alert">&times;</a>
  <?php echo validation_errors();?>
</div>
<?php endif;?>

<div>
    <div style="background:#333" align="center">
        <iframe src="/ls_php_test/channel.php?room=<?php echo $username;?>" width="800" height="500" scrolling="no" frameborder="0"></iframe>
    </div>
    <div></div>
</div>

<?php include('footer.php');?>