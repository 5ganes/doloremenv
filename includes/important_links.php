<style type="text/css">
	.table.table-boxed > thead > tr > th{
		background: #0e6330
	}
</style>
<div class="col-md-9">
    <div class="panel panel-primary">          
        <?php
		$sub=$groups->getByParentId($pageId);
		if($conn->numRows($sub)>0)
		{?>
	        <div class="page-row">
			    <div class="table-responsive">
			    	<table class="table table-boxed">
			            <thead>
			                <tr>
			                	
				                <th width="10%">SN</th>
				                <th width="90%"><?php if($lan!='en') echo 'महत्वपुर्ण लिंकहरु'; else echo 'Important Links';?></th>
			                	
			                </tr>
			            </thead>
			            <tbody>
			            	<?php 
			            	$down=$groups->getByParentIdAndType(0, 'Important_Links');
							$count=1;
							while($downRow=$conn->fetchArray($down))
							{?>
				                <tr>
				                    <td><?php echo $count++;?></td>
				                    <td><a target="_blank" href="<?php if($lan=='en') echo 'en/'; echo $downRow['urlname'];?>"><?php if($lan=='en') echo $downRow['nameen'];  else echo $downRow['name'];?></a></td>
				                </tr>
			            	<?php }?>
			            </tbody>
			        </table>
				</div>
			</div>
		<?php }?>
    </div>            
</div>