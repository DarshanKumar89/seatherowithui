<?php


$publishable_key = config('seathero.stripe.publishable_key');
$amount = 300;

?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Buy This Thing</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script type="text/javascript" src="https://js.stripe.com/v2/"></script>
	<script type="text/javascript">Stripe.setPublishableKey("<?php echo $publishable_key; ?>");</script>
	<script type="text/javascript">
function reportError(msg) {
	// Show the error in the form:
	$('#payment-errors').text(msg).addClass('alert alert-error');
	// re-enable the submit button:
	$('#submitBtn').prop('disabled', false);
	return false;
}

// Assumes jQuery is loaded!
// Watch for the document to be ready:
$(document).ready(function() {

	// Watch for a form submission:
	$("#payment-form").submit(function(event) {

		// Flag variable:
		var error = false;

		// disable the submit button to prevent repeated clicks:
		$('#submitBtn').attr("disabled", "disabled");

		// Get the values:
		var ccNum = $('.card-number').val(), cvcNum = $('.card-cvc').val(), expMonth = $('.card-expiry-month').val(), expYear = $('.card-expiry-year').val();

		// Validate the number:
		if (!Stripe.card.validateCardNumber(ccNum)) {
			error = true;
			reportError('The credit card number appears to be invalid.');
		}

		// Validate the CVC:
		if (!Stripe.card.validateCVC(cvcNum)) {
			error = true;
			reportError('The CVC number appears to be invalid.');
		}

		// Validate the expiration:
		if (!Stripe.card.validateExpiry(expMonth, expYear)) {
			error = true;
			reportError('The expiration date appears to be invalid.');
		}

		// Validate other form elements, if needed!

		// Check for errors:
		if (!error) {

			// Get the Stripe token:
			Stripe.card.createToken({
				number: ccNum,
				cvc: cvcNum,
				exp_month: expMonth,
				exp_year: expYear
			}, stripeResponseHandler);

		}

		// Prevent the form from submitting:
		return false;

	}); // Form submission

}); // Document ready.

// Function handles the Stripe response:
function stripeResponseHandler(status, response) {

	// Check for an error:
	if (response.error) {

		reportError(response.error.message);

	} else { // No errors, submit the form:

	  var f = $("#payment-form");

	  // Token contains id, last4, and card type:
	  var token = response['id'];

	  // Insert the token into the form so it gets submitted to the server
	  f.append("<input type='hidden' name='stripeToken' value='" + token + "' />");

	  // Submit the form:
	  f.get(0).submit();

	}

} // End of stripeResponseHandler() function.	
	</script>
</head>
<body>

		<form id="payment-form" method="post" action="<?php echo route('payment'); ?>">
		<?php // Show PHP errors, if they exist:
		if (isset($errors) && !empty($errors) && is_array($errors)) {
			echo '<div class="alert alert-error"><h4>Error!</h4>The following error(s) occurred:<ul>';
			foreach ($errors as $e) {
				echo "<li>$e</li>";
			}
			echo '</ul></div>';
		}?>
		<div id="payment-errors"></div>
		<div class="help-block">You can pay using: Mastercard, Visa, American Express, JCB, Discover, and Diners Club.</div>

<div>
		<label>Card Number</label>
		<input type="text" size="20" autocomplete="off" class="card-number input-medium">
		<span class="help-block">Enter the number without spaces or hyphens.</span>
</div><div>
		<label>CVC</label>
		<input type="text" size="4" autocomplete="off" class="card-cvc input-mini">
</div><div>
		<label>Expiration (MM/YYYY)</label>
		<input type="text" size="2" class="card-expiry-month input-mini">
		<span> / </span>
		<input type="text" size="4" class="card-expiry-year input-mini">
</div>
		<button type="submit" class="btn" id="submitBtn">Pay</button>
</form> 


</body>
</html>