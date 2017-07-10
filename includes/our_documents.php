<div class="col-md-9">
    <div class="panel panel-primary">          
        <div class="panel-heading"><h3><?php if($lan!='en') echo 'हाम्रा डकुमेन्टहरु '; else echo 'Our Documents';?></h3></div>
        <div class="panel-body dynamic">
            <?php 
            	global $userLoggedIn;if($userLoggedIn == false) echo 'Please login to view this content. Thank you.';
            ?>
        </div>
        <?php
        if($userLoggedIn == true){
			$sub=$groups->getByParentId($pageId);
			if($conn->numRows($sub)>0)
			{?>
		        <div class="page-row">
				    <div class="table-responsive">
				    	<table class="table table-boxed">
				            <thead>
				                <tr>
				            		<th width="10%">SN</th>
						                <th width="70%">Document Name</th>
						                <th width="20%">Download</th>
									</tr>
				            </thead>
				            <tbody>
				            	<?php
			         			$docs = $groups->getByType('Our_Documents'); $sn = 1;
			         			while($row = $conn->fetchArray($docs)){?>
				         			<tr>
					                    <td><?php echo $sn++;?></td>
					                    <td><?php echo $row['name']; ?></td>
					                    <td><a class="btn btn-success" download="" href="<?php echo CMS_FILES_DIR.$row['contents'] ;?>"><i class="fa fa-download"></i> Download </a></td>
				                	</tr>
				                <?php }?>
							</tbody>
				        </table>
					</div>
				</div>
			<?php }
		}?>
    </div>            
</div>