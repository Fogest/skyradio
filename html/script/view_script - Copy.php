<?php 	include_once ("../../setup.php");		$page->page_title = 'Script List';	$page->page_header = 'Script List';	if(isset($_GET['id'])) {		$page->html .= '<p><strong>Viewing Script</strong> #'.$_GET['id'].'</p>';				$sql = "SELECT * FROM `scripts` WHERE id=".$_GET['id']."";		$script_result = $database->execute($sql);		$page->html .= '<p><strong>Script Airing Date:</strong> '.$script_result[0]['publish_date'].'</p>';				$page->html .= '<p><strong>Script:</strong></br></p>';				$page->html .= '<div class="span10" id="userContent">'.html_entity_decode($script_result[0]['script']).'</div>';			} else {		$page->html .= "<p>Script List:</p>";				$page->html .= '<table border="1">							<tr>								<th>Date</th>								<th>Script Page</th>							</tr>';							$sql = "SELECT `id`,`script`, `publish_date` FROM `scripts` ORDER BY `scripts`.`publish_date` DESC";							$script_result = $database->execute($sql);							foreach($script_result as $value) {								$page->html .= '<tr>								<td>'.date("l jS \of F Y",strtotime($value['publish_date'])) .'</td>								<td><a href="?id='.$value['id'].'">View Script</a></td>								</tr>';															}		$page->html .=				'</table>';	}	$page->display();?>