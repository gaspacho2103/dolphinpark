<?php
				require_once('server/config.php');

				$connect = new Mysqli(SERVERNAME,DB_LOGIN,DB_PASSWORD,DB_NAME);
				$sql = "SELECT * FROM `Company`";
				$result = $connect->query($sql);
				$company = $result->fetch_assoc();
?>

<div class="footer__desc">
			<div class="container footer__desc-container">
				<div class="footer__social">
					<h4>Наши контакты</h4>
					<ul>
                        <li>
							<img src="assets/icons/telephone.svg" alt="Telephone">
							<a href="#"><?=$company['Telephone']?></a>
						</li>
						<li>
							<img src="assets/icons/mail.svg" alt="Email">
							<a href="#"><?=$company['Email']?></a>
						</li>
					</ul>
				</div>
				<div class="footer__social">
					<h4>Наши соц.сети</h4>
					<ul>
						<li>
							<img src="assets/icons/vk.svg" alt="VK">
							<a href="<?=$company['Vkontakte']?>">VKontakte</a>
						</li>
						<li>
							<img src="assets/icons/youtube.svg" alt="Youtube">
							<a href="<?=$company['YouTube']?>">YouTube</a>
						</li>
						<li>
							<img src="assets/icons/telegram.svg" alt="Telegram">
							<a href="<?=$company['Telegram']?>">Telegram</a>
						</li>
						<li>
							<img src="assets/icons/instagram.svg" alt="Instagram">
							<a href="<?=$company['Instagram']?>">Instagram</a>
						</li>
					</ul>
				</div>
			</div>
		</div>

		<?php
			$connect->close();
		?>

		<div class="footer__copy">
			<div class="container">
				<p>Copyright by Waldemar Tkatskiy</p>
			</div>
		</div>