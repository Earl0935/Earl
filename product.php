<?php
$json = file_get_contents("http://rdapi.herokuapp.com/product/read.php");

$data = json_decode($json,true);
$list = $data['records'];
 
if(isset($_POST['search'])){
   $search = $_POST['search'];
   $jsearch = file_get_contents('http://rdapi.herokuapp.com/product/search.php?s='.$search);
   $res = json_decode($jsearch,true);

   $list = $res['records'];
   
}else{
   $list = $data['records'];
}
?>

<h1> Product List </h1>

<form action="index.php?navigation=product" method="POST">
	Search:<input type="text" name="search" placeholder="Enter Product Name">
		<input type="submit" name="submit" value="Search">
	</form>
	<div class="create">
		<a href="index.php?navigation=product">Products</a>
        <a href="index.php?navigation=create">Create</a>
	</div>

<table>
    <tr>
        <th>ID</th>
        <th>Product</th>
        <th>Price</th>
		<th>Category</th>
    </tr>
<?php
foreach($list as $value){
    ?>
    <tr>
        <td><?php echo $value['id'];?></td>
        <td><a href="product-details.php?id=<?php echo $value['id'];?>"><?php echo $value['name'];?></a></td>
        <td><?php echo $value['price'];?></td>
		<td><?php echo $value['category_name'];?></td>
    </tr>
<?php
}
    ?>
</table>
