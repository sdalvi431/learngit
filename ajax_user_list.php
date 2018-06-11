<?php
// foreach($registered_user as $row){
// 	print_r($row['fname']);
// }
?>
<div class="table-responsive"> 
	<table class="table table-bordered">
	    <thead>
	      <tr>
	        <th>Name</th>
	        <th>Surname</th>
	      </tr>
	    </thead>
	    <tbody>
	    <?php foreach($registered_user as $row){ ?>
	      <tr id="<?php echo $row['id']; ?>" class="edit_tr">
	        <td class="edit_td">
	        	<span id="first_<?php echo $row['id']; ?>" class="text"><?php echo $row['fname']; ?></span>
	        	<input type="text" value="<?php echo $row['fname']; ?>" class="editbox" id="first_input_<?php echo $row['id']; ?>">
	       	</td>
	        <td class="edit_td">
	        	<span id="last_<?php echo $row['id']; ?>" class="text"><?php echo $row['lname']; ?></span>
	        	<input type="text" value="<?php echo $row['lname']; ?>" class="editbox" id="last_input_<?php echo $row['id']; ?>">
	        </td>
	      </tr>
	    <?php } ?>
	    </tbody>
  	</table>
</div> 


<script>
$(document).ready(function()
{
	$(".editbox").hide();
		$(".edit_tr").click(function(){
		var ID=$(this).attr('id');
		$("#first_"+ID).hide();
		$("#last_"+ID).hide();
		$("#first_input_"+ID).show();
		$("#last_input_"+ID).show();
		});
		
		$(document).on("blur",'.editbox',function(){
			//console.log("aedsf");
			var ID = $(this).closest('tr').attr('id');
			var f=$("#first_input_"+ID).val();
			var l=$("#last_input_"+ID).val();
			//console.log(ID);
			//console.log(f);
			//console.log(l);
			var dataString = 'id='+ ID +'&firstname='+f+'&lastname='+l;
				if(f.length>0&& l.length>0)
				{

					$.ajax({
					type: "POST",
					url: "<?=base_url();?>home/update",
					data: dataString,
					cache: false,
					success: function(html)
						{
							console.log(html);
							$("#first_"+ID).html(f);
							$("#last_"+ID).html(l);
						}
					});
				}
				else
				{
					alert('Enter something.');
				}
		});

// Edit input box click action
	$(".editbox").mouseup(function() 
	{
	return false
	});

// Outside click action
	$(document).mouseup(function()
	{
		$(".editbox").hide();
		$(".text").show();
	});

});
</script>

