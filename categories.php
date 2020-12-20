<?php require_once('includes/header.php');?>
<?php require_once('lib/dbOperations.php');?>
<?php require_once('includes/navigation.php');?>
<div class="row">
  <div class="column side">
  <?php require_once('includes/sidebar.php');?>
  </div>
  <div class="column middle">
    <div class="actions">
      <a class="linkaction" href="add_action.php">Add Category</a>
    <div style="clear:both;"></div>  
    </div>
    <?php  $data = fetchRecordAll('category'); 
    //var_dump($data)?>
    <?php foreach($data as $category){?>
    <div class="box">
      <h2><?php echo $category['name'];?></h2>
      <p><?php echo $category['descp'];?></p>
      <hr />
      <div class="actions">
        <?php //this line ?>
        <?php session_start();
              $_SESSION["id"]=$category['id'];   ?>
      <!--<a class="linkaction" href="categoryAction.php?action=delete&id=<?php echo $category['id'];?>">Delete Category</a> -->
      <a class="linkaction" href="form_delete.php">Delete Category</a>
        <a class="linkaction" href="categoryAction.php?action=update&id=<?php echo $category['id'];?>">Update Category</a>
        <div style="clear:both;"></div>  
      </div>

      </a>$cleanData['id']
    </div>
    <?php } ?>


  </div>
  <div class="column side">Column</div>
</div>
<?php require_once('includes/footer.php');?>

