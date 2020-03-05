<?php
	$id = $_GET['id'];
	$json = file_get_contents('http://rdapi.herokuapp.com/product/read_one.php?id=' . $id);
        $data = json_decode($json, true);
	//category
	$json = file_get_contents('http://rdapi.herokuapp.com/category/read.php');
	$categories = json_decode($json,true);
	$category = $categories['records'];
?>

<form action="pro_create.php" method="POST">
<h1> Create Product </h1>
<input type="text" name="name" value="<?php if($id) echo $data['name']?>" placeholder="name"/>
<input type="text" name="description" value="<?php if($id) echo $data['description']?>" placeholder="description"/>
<input type="text" name="price" value="<?php if($id) echo $data['price']?>" placeholder="price"/>
<select name="category">
<option value="">--Category--</option>
	<?php
      foreach($category as $cview){
    ?>
		<option value="<?php echo $cview['id']?>" <?php if ($cview['id'] == $data['category_id']) echo "selected" ?>><?php echo $cview['name']?></option>
    <?php
      }
    ?>
	</select>
<input type="submit" name="submit" value="submit"/>

</form>
