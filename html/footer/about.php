<?php
include_once ("../../setup.php");

$page->page_title = 'About';
$page->page_header = 'About';

$page->html .= '<p>Website created and designed by <a href="http://jhvisser.com">Justin Visser</a>. You can reach me at my personal email:
				<a href="mailto:fogestjv@gmail.com">fogestjv@gmail.com</a> or simply use the <a href="contact.php">Contact Form</a> which will direct
				emails to the same location. </p>
				
				<p>If anything is broken/breaks feel free to send me an email, or use the "Feedback" bar on the right to suggest feedback.
				I will be more then happy to fix/add to the website! I do roll out new versions without much prior notice therefore you may notice new problems
				which of course I can fix if you let me know of them :)</p>
				
				<p>Hope the site works well and provides all the features needed! The site can be used even after I graduate, I will keep it running and maintain it.</p>
				
				</br>
				<p>~ Justin Visser </br> <i>2014 Graduate</i></p>';

$page->display();
?>