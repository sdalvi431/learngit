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
	        <th>Edit</th>
	        <th>Save</th>
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
	        <td><button type="button" class="btn btn-warning edit_btn" id="<?php echo $row['id']; ?>" name="edit_btn">Edit</button></td>
	        <td><button type="button" class="btn btn-success save_btn" id="<?php echo $row['id']; ?>" name="save_btn">Save</button></td>
	      </tr>
	    <?php } ?>
	    </tbody>
  	</table>
</div> 


<script>
	$(document).ready(function(){
		$(".editbox").hide();
		$(".edit_btn").on('click',function(){
			var ID = $(this).attr("id");
			console.log(ID);
			$("tbody").css("pointer-events","none");
          		$(this).closest('tr').css("pointer-events","auto");
			$("#first_"+ID).hide();
			$("#last_"+ID).hide();
			$("#first_input_"+ID).show();
			$("#last_input_"+ID).show();
		});
		$(".save_btn").on('click',function(){
				var ID = $(this).attr("id");
				var first = $("#first_input_"+ID).val();
				var last = $("#last_input_"+ID).val();
				var input1 = $("#first_input_"+ID);
				var input2 = $("#last_input_"+ID);
				if(first.length>0&& last.length>0){
					$("input").blur(function(){
						$.ajax({
							type: "POST",
							url: "<?=base_url();?>home/update",
							data: {ID:ID,first:first,last:last},
							success: function(data)
							{
								console.log(data);
								$("tbody").css("pointer-events","auto");
								$("#first_input_"+ID).hide();
								$("#first_"+ID).show();
								$("#last_input_"+ID).hide();
								$("#last_"+ID).show();
								//$(".editbox").hide(); 
								// $("#first_"+ID).html(first);
								// $("#last_"+ID).html(last);
							}
						});
					});
				}else{

					if(input1.val()==''){
						input1.addClass("needsfilled");
		          		input1.val();
		          		input1.attr('placeholder',"REQUIRED");
					}else{
						input2.removeClass("needsfilled");
					}
					if(input2.val()==''){
						input2.addClass("needsfilled");
		          		input2.val();
		          		input2.attr('placeholder',"REQUIRED");
					}else{
						input2.removeClass("needsfilled");
					}
				}	
			});
	});
</script>

