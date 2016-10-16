<?php 
if(isset($_POST['transact'])){
foreach($_POST['check_list'] as $selected) {
echo $selected;
}
}
?>