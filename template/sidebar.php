<!-- Sidebar -->
	<div id="sidebar">
		<div class="inner">

			<!-- Search -->
				<section id="search" class="alt">
					<form method="post" action="#">
						<input type="text" name="query" id="query" placeholder="Search" />
					</form>
				</section>

			<!-- Menu -->
				<nav id="menu">
					<header class="major">
						<h2>Site Navigation</h2>
					</header>
					<ul>
						<?php createNavigation(0, 'Navigation', $lan);?>
					</ul>
				</nav>

			<!-- Section -->
				<section>
					<header class="major">
						<h2><?php if($lan=='en') echo 'Important Links'; else echo 'महत्वपुर्ण लिंकहरु';?></h2>
					</header>
					
					<ul class="contact">
						<?php
						$links = $groups->getByParentIdAndType(0, 'Important_Links');
						while($row = $conn->fetchArray($links)){
							if($lan=='en')
								echo '<li><a href="en/'.$row['urlname'].'" target="_blank">'.$row['nameen'].'</a></li>';
							else
								echo '<li><a href="'.$row['urlname'].'" target="_blank">'.$row['name'].'</a></li>';
						}
						?>
					</ul>
				</section>

			<!-- Section -->
				<section>
					<!-- <header class="major">
						<h2>Miscellaneous</h2>
					</header> -->
					<div class="mini-posts">
						<article>
							<a href="https://mail2.nitc.gov.np/src/login.php" class="image" target="_blank"><img src="images/checkmail.png" alt="" /></a>
							<p>You can check your recent emails here.</p>
						</article>
						<article>
							<a href="http://www.mfd.gov.np/" class="image" target="_blank"><img src="images/weather.jpg" alt="" /></a>
							<p>You can see weather condtion details here.</p>
						</article>
					</div>
					<!-- <ul class="actions">
						<li><a href="#" class="button">More</a></li>
					</ul> -->
				</section>

			<!-- Footer -->
				<footer id="footer">
					<p class="copyright">Copyright &copy; Department of Environment. All rights reserved. Powered By: 
					<a href="http://www.krishighar.com">Team Krishighar</a></p>
				</footer>

		</div>
	</div>