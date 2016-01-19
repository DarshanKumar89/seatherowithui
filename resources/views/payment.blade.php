<?php


$publishable_key = config('seathero.stripe.publishable_key');
$amount = 300;

?>
<html>

	<head></head>
	<body>
<form action="charge.php" method="post">
  <script src="https://checkout.stripe.com/checkout.js" class="stripe-button"
          data-key="<?php echo $publishable_key; ?>"
          data-description="some description"
          data-amount="<?php echo $amount; ?>"
          data-locale="auto"></script>
</form>
	</body>
</html>