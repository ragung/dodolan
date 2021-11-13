<nav>
    <ul>
        <li><a href="index.php">Home</a></li>
		<li><a href="merek.php">Brand</a>
			<ul>
				<li>
					<a href="wimcycle.php">Hoodie</a>
				</li>
				<li>
					<a href="polygon.php">t-shirt</a>
				</li>
				<li>
					<a href="santa.php">Tas</a>
				</li>

			</ul>
        </li>
        <li><a href="keranjang.php">Shopping Chart</a></li>
        <li><a href="checkout.php">Checkout</a></li>
        <li><a href="riwayat.php">Shopping History</a></li>
		
		<?php if(isset($_SESSION['pelanggan'])): ?>
					<li>
						<a href="index.php" class="navbar-brand" style="margin-left: 5cm"><?php echo $_SESSION['pelanggan']['nama_pelanggan']; ?> </a>
					</li>
					<li><a href="logout.php" onclick="return confirm('Are you sure want to Log out')">Sign Out</a></li>
					
					<?php else: ?>
					<li><a href="daftar.php" style="margin-left: 5cm;"><b>Sign Up</a></b></li>
					<li><a href="login.php"><b>Sign in</b></a></li>
		<?php endif ?>
    </ul>
	
</nav>