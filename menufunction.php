<?php
function createMenu($parentId, $groupType,$lan, $count=1)
{
	global $groups;
	global $conn;

	if ($parentId == 0){
		$groupResult = $groups->getByParentIdAndType($parentId, $groupType);	
	}
	else{
		$groupResult = $groups->getByParentId($parentId);		
	}

	if ($conn->numRows($groupResult) > 0 and $parentId != 0){
		echo '<ul>';
	}

	while($groupRow = $conn->fetchArray($groupResult)){	
		echo '<li>';
		?>
    	<a href="<? if($groupRow['linkType']!='File'){ if($lan=='en') echo 'en/'; echo $groupRow['urlname'];} else{ echo CMS_FILES_DIR.$groupRow['contents'];}?>">
    		<? if($lan=='en') echo $groupRow['nameen']; else echo $groupRow['name'];?>
    	</a>
		<?

		if($groupRow['linkType']=="Normal Group" and $groupRow['urlname']!='video-gallery' and $groupRow['urlname']!="division")
			if($count<2)
				createMenu($groupRow['id'], $groupType, $lan, $count+1);

		echo "</li>\n";
	}
	if ($conn->numRows($groupResult) > 0 and $parentId != 0)
		echo '</ul>';
}

function createNavigation($parentId, $groupType, $lan='')
{
	global $groups;
	global $conn;

	if ($parentId == 0)
		$groupResult = $groups->getByParentIdAndType($parentId, $groupType);	
	else
		$groupResult = $groups->getByParentId($parentId);		

	while($groupRow = $conn->fetchArray($groupResult))
	{	
		echo '<li>';
		?>
    	<a href="<? if($lan=='en') echo 'en/'; echo $groupRow['urlname'];?>">
    		<? if($lan=='en') echo $groupRow['nameen']; else echo $groupRow['name'];?>
    	</a>
		<?
		echo "</li>\n";
	}
}
?>