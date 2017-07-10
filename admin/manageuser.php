<?php
require 'init.php';
if(!isset($_SESSION['sessUserId']))//User authentication
{
 header("Location: login.php");
 exit();
}

if(isset($_GET['changeStatus'])){
  $users -> changeStatus($_GET['id']);
  header("Location: manageuser.php?msg=User status updated successfully");
}

if (isset($_GET['delete']))
{
	$feedbacks->delete($_GET['delete']);
	header("Location: feedbacks.php?msg=Feedback deleted successfully");
	exit();
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title><?php echo ADMIN_TITLE; ?></title>
<link href="../css/admin.css" rel="stylesheet" type="text/css"></head>
<body>
<table width="<?php echo ADMIN_PAGE_WIDTH; ?>" border="0" align="center" cellpadding="0"
	cellspacing="5" bgcolor="#FFFFFF">
  <tr>
    <td colspan="2"><?php include("header.php"); ?></td>
  </tr>
  <tr>
    <td width="<?php echo ADMIN_LEFT_WIDTH; ?>" valign="top"><?php include("leftnav.php"); ?></td>
    <td width="<?php echo ADMIN_BODY_WIDTH; ?>" valign="top">
	
	<table width="100%" border="0" cellspacing="1" cellpadding="0">
    	 <?php
			 if(isset($_GET['view'])){
				 $row = $users -> getById($_GET['id']); $row = $conn->fetchArray($row);
			 ?>
       <tr>
          <td class="bgborder">
		  
		  <table width="100%" border="0" cellspacing="1" cellpadding="0">
            <tr>
              <td bgcolor="#FFFFFF"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td class="heading2">&nbsp;User Details</td>
                  </tr>
                  <tr>
                    <td><table width="100%" border="0" cellspacing="0" cellpadding="3">
                      <tr>
                        <td><strong>Name</strong> :</td>
												<td><?=$row['name']?></td>
                      </tr>
											<tr>
											  <td><strong>Email :</strong></td>
											  <td><?php echo $row['email']; ?></td>
											  </tr>
											<tr>
                        <td><strong>Address</strong> :</td>
												<td><?php echo $row['address']; ?></td>
												</tr>
                      <tr>
                        <td valign="top"><strong>Phone :</strong></td>
                        <td valign="top"><?php echo $row['phone']; ?></td>
                      </tr>
                      <tr>
                        <td valign="top"><strong>Username :</strong></td>
                        <td valign="top"><?php echo $row['username']; ?></td>
                      </tr>
                      <tr>
                        <td valign="top"><strong>Status :</strong></td>
                        <td valign="top"><?php echo $row['publish']; ?></td>
                      </tr>
                      
                    </table></td>
                  </tr>
              </table></td>
            </tr>
          </table>
		  </td>
        </tr>
        <tr>
          <td height="5"></td>
        </tr>
        <?php } ?>
        <tr>
          <td class="bgborder"><table width="100%" border="0" cellspacing="1" cellpadding="0">
              <tr>
                <td bgcolor="#FFFFFF"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td class="heading2">&nbsp;User List</td>
                    </tr>
                    <tr>
                      <td><table width="100%"  border="0" cellpadding="4" cellspacing="0">
                          <tr bgcolor="#F1F1F1" class="tahomabold11">
                            <td width="1">&nbsp;</td>
                            <td><strong>SN</strong></td>
                            <td><strong>Name</strong></td>
                            <td><strong>Email</strong></td>
                            <td><strong>Phone</strong></td>
                            <td><strong>Username</strong></td>
                            <td><strong>Status</strong></td>
                            <td width="85"><strong>Action</strong></td>
                          </tr>
													<?php
													$counter = 0;
													$pagename = "manageuser.php?";
													$sql = "SELECT * FROM usergroups ORDER BY weight ASC";
													$limit = 20;
													include("paging.php");
													while ($row = $conn->fetchArray($result)){?>
                            <tr <?php if($counter%2 != 0) echo 'bgcolor="#F7F7F7"'; else echo 'bgcolor="#FFFFFF"'; ?>>
                              <td valign="top">&nbsp;</td>
                              <td valign="top"><?= ++$counter; ?></td>
                              <td valign="top"><?= $row['name'] ?></td>
                              <td valign="top"><?php echo $row['email']; ?></td>
                              <td valign="top"><?php echo $row['phone']; ?></td>
                              <td valign="top"><?php echo $row['username']; ?></td>
                              <td valign="top">
                                <?php if($row['publish']=='Yes') echo 'Elabled'; else echo 'Disabled'; ?>
                                <a href="manageuser.php?id=<?php echo $row['id']; ?>&changeStatus">
                                  <?php if($row['publish']=='Yes') echo 'Disable'; else echo 'Elable'; ?>
                                </a>
                              </td>
                              <td valign="top">
                              [<a href="manageuser.php?id=<?php echo $row['id']; ?>&view">Deatils</a>]
  														[<a href="#" onClick="javascript: if(confirm('This will permanently delete Feedback details from database. Continue?')){ document.location='manageuser.php?delete=<?php echo $row['id']; ?>'; }">Delete</a>]
  														</td>
                            </tr>
                          <? }?>
                        </table>
                        <?php include("paging_show.php"); ?>
												</td>
                    </tr>
                  </table></td>
              </tr>
            </table></td>
        </tr>
      </table>
	  
	  
	  </td>
  </tr>
  <tr>
    <td colspan="2"><?php include("footer.php"); ?></td>
  </tr>
</table>
</body>
</html>