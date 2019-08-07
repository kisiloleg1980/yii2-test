<h1>List Users</h1>
<div class="row">
	<div class="my-component-table" id="tableUsers">
		<table class="table table-bordered">
			<thead id="heads">
				<tr>
					<th class="id">id</th>
					<th class="name">User Name</th>
					<th class="login">login</th>
				</tr>
			</thead>
					<tbody>
					  <?php foreach ($Models as $value ) : ?>
						<?= $this->render('_item', ['Model' => $value]) 	?>  
					  <?php endforeach; ?>
					 </tbody> 
		</table>
	</div>
</div>



<?php

$js = <<<JS
    
 'use strict';

$("#heads").on('click', function(event){
	var sort=event.target.className;
	
	$.ajax({
            url: '/list-users/get',
            type: 'GET',
            data: {field:sort},
            success: function(response){
				$("#tableUsers tbody *").remove();
                $("#tableUsers tbody").append(response);			
            },
            error: function(){
                alert('Error!');
            }
	});
})
 
           
JS;

$this->registerJs($js);