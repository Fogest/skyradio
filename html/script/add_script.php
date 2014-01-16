<?php
	include_once ("../../setup.php");

	$page->privilege = 1;
	$page->page_title = 'Add Script';
	$page->page_header = 'Add Script';
	if(isset($_POST['submit'])) {
		$errors = array();
		if(!isset($_POST['scriptContent']) || strlen(trim($_POST['scriptContent'])) == 0)
			$errors[] = 'You didn\'t enter anything into the script box';
		if(!isset($_POST['date']) || strlen(trim($_POST['date'])) == 0)
			$errors[] = 'You didn\'t enter anything into the date box';
		if(count($errors) < 1) {
			$query = "SELECT publish_date FROM scripts
					WHERE publish_date='".$_POST['date']."'";
			$scripts_results = $database->execute($query);
			if(count($scripts_results) < 1) {
				$table = "scripts";
				$args['script'] = $_POST['scriptContent'];
				$args['publish_date'] = date('Y-m-d', strtotime($_POST['date']));
				$args['creator'] = $_SESSION['username'];
				$args['creation_date'] = date("Y-m-d H:i:s");
				
				$result = $database->insert($table, $args);
				
				$page->html .= $alert->displaySuccess('Script has been added for '.date('Y-m-d', strtotime($_POST['date'])).'!');
			}
			else {
				$page->html .= $alert->displayError('Ooops, this date has already been used!');
			}
		}
		else {
			$page->html .= $alert->displayError(implode("</br>",$errors));
		}
	} else {

	$page->html .= '<form name="addScript" action="add_script.php" method="post">
						<label>Date</label>
						<input type="text" class="input-xlarge required" id="scriptDateField" name="date" maxlength="230">
						<label>Script Contents</label>
						<textarea rows="20" class="ckeditor span9 input-xlarge required" id="scriptContent" name="scriptContent"></textarea><br/>
						<input type="submit" name="submit" class="btn btn-primary">
					</form>';
					
	}

	$page->display();
?>
