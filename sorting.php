$('ul#sortable').sortable({
	update: function(event, ui) {
		$('ul#sortable  li').each(function(){
			post_order_ids.push($(this).attr("data-categoryID"));
		});
		update(post_order_ids)
	}
});

// make ajax request

// function to sort
if(count($post_order_ids)>0){
	for($order_no= 0; $order_no < count($post_order_ids); $order_no++)
	{
		$sql = "UPDATE categories SET ordering = '".($order_no+1)."' WHERE categoryID = '".$post_order_ids[$order_no]."'";
		$stmt=DBConnection::myQuery($sql);
		$stmt->execute();
	}
	echo true;
}else{
	echo false;
}