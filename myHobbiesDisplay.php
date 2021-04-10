<?php
	require_once('hobby.model.php');

    if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
		exit("Invalid id provided".$_GET['id']);
    }

	$id = intval($_GET['id']);

	$hobby = Hobby::findById($id);
	if ($hobby == null) {
		exit("Cannot find hobby with id $id");
	}
?>

<html>
	<head>
		<title>Exam Practice </title>
		<style>
			body{
				color: #d2d636;
			}
			.submit{
				background: #62af5e;
				color: white;
				padding: 10px 20px;
				border: none;
			}
			.reset{
				background: #d9544f;
				color: white;
				padding: 10px 20px;
				border: none;
			}
		</style>
	</head>
	<body>
		<table width="400px" cellpadding="10" cellspacing="0">
            <tr bgcolor="#de8704">
                <td colspan="2" style="height:40px">Your Profile</td>			
            </tr>
			<tr bgcolor="#222536" >
				<td align="center" colspan="2" style="font-size:4vw">Thank You for Response!!!!!</td>
				
			</tr>
			<tr bgcolor="#222536" rowspan="5">
				<td align="right">Name: </td>
				<td><?=$hobby->getFirstName().$hobby->getLastName()?></td>
			</tr>
			
			
			
			
			<tr bgcolor="#222536">
				<td align="right">Country: </td>
				<td>Bahrain</td> <!-- Somehow the country does not exist in the table schema or get saved at all -->
			</tr>
			<tr bgcolor="#222536"> 
				<td  align="right">Your Favourite Game(s) are: </td>
				<td colspan="2"><?=$hobby->getGames()?></td>
			</tr>

			<tr bgcolor="#222536">
				<td align="right">Your E-mail: </td>
				<td><?=$hobby->getEmail()?></td>
			</tr>
			<tr bgcolor="#222536">
				<td align="right">Phone No: </td>
				<td><?=$hobby->getPhone()?></td>
			</tr>
			
			
			<tr bgcolor="#222536">
				<td> Favourite Picture </td>
				<td>
				<input type="image"  src="<?=$hobby->getImage()?>"  width="120" height="100">
				
				</td>

			</tr>
			<tr bgcolor="#de8704">
				<td colspan="2"  style="height:40px">	
				</td>

			</tr>
		</table>
	</body>
</html>

<?php
Database::closeConnection();
?>
