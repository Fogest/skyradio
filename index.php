<?php
	include_once ("setup.php");
	
	$page->page_title = 'Script List';
	$page->page_header = 'Script List';
	
	$sql = "SELECT `id`,`publish_date` FROM `scripts` WHERE publish_date='".date('Y-m-d')."'";
	$script_result = $database->execute($sql);
	if(count($script_result) > 0) {
		$page->html .= '<a href="'.HTML_PATH.'script/view_script.php?id='.$script_result[0]['id'].'" class="btn btn-primary btn-large">Today\'s Script</a>';
	}

	$page->html .= "<h2>Script List</h2>";
	
	$page->html .= '<table border="1">
						<tr>
							<th>Date</th>
							<th>Script Page</th>
						</tr>';
						$sql = "SELECT `id`,`publish_date` FROM `scripts` ORDER BY `scripts`.`publish_date` DESC";
						$script_result = $database->execute($sql);
							foreach($script_result as $value) {
								$page->html .= '<tr>
								<td>'.date("l jS \of F Y",strtotime($value['publish_date'])) .'</td>
								<td><a href="'.HTML_PATH.'script/view_script.php?id='.$value['id'].'">View Script</a>';
								if(isset($_SESSION['user_level']))
									if($_SESSION['user_level'] > 0)
										$page->html .= ' <a href="'.HTML_PATH.'script/edit_script.php?id='.$value['id'].'">(Edit)</a>';
								
								$page->html .= 
								'</td>
								</tr>';
								
							}
	$page->html .=				'</table>';

	$page->display();
?>
