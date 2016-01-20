<?php
$publishable_key = config('seathero.stripe.publishable_key');
$amount = 300;
?>

@extends('layout')

@section('content')
<script type="text/javascript" src="https://js.stripe.com/v2/"></script>
<script type="text/javascript">Stripe.setPublishableKey("<?php echo $publishable_key; ?>");</script>
<script type="text/javascript" src="{{ asset('/js/payment_util.js') }}"></script>

<div class="row bg3" >
	<div class="col-lg-2"></div>
	<div class="col-lg-8 text-center" >
		<div class="container" style="height:auto;">
			<h2 class=""></h2>
			</br>
			</br>
			</br>
			</br>
		</div>
		</br>
		</br>

		<div class="panel panel-default credit-card-box ">
			<div class="panel-heading display-table" >
				<div class="row" >
					<div class="col-lg-6" align="left" style="margin-top:10px" >
						<h5>Payment Details</h5>
					</div>
					<div class="col-lg-6" >                            
						<img class="img-responsive pull-right" src="http://i76.imgup.net/accepted_c22e0.png">
					</div>
				</div>                    
			</div>
			<div class="panel-body">
				
				<form role="form" id="payment-form" method="post" action="<?php echo route('processPreLaunchPayment'); ?>">
				{!! csrf_field() !!}
					<?php // Show PHP errors, if they exist:
					if(isset($errors) && !empty($errors) && is_array($errors)){
						echo '<div class="alert alert-error"><h4>Error!</h4>The following error(s) occurred:<ul>';
						foreach($errors as $e){
							echo "<li>$e</li>";
						}
						echo '</ul></div>';
					}?>
					<div id="payment-errors"></div>

					<div class="row">
						<div class="col-xs-12">
							<div class="form-group">
								<div class="input-group">
<input type="text" size="20" autocomplete="off" class="card-number form-control" placeholder="Valid Card Number">
									<span class="input-group-addon"><i class="fa fa-credit-card"></i></span>
								</div>
							</div>                            
						</div>
					</div>
					<div class="row">
						<div class="col-xs-7 col-md-7">
							<div class="form-group">
		<input type="text" size="7" maxlength="7" class="card-expiry form-control" placeholder="EXPIRATION - MM / YYYY">
							</div>
						</div>
						<div class="col-xs-5 col-md-5 pull-right">
							<div class="form-group">
		<input type="text" size="4" autocomplete="off" class="card-cvc form-control" placeholder="CVC Code">                                   
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-xs-12">
							<div class="form-group">
                                    
								<input type="text" class="form-control" name="Coupon Code" placeholder="Coupon Code" />
							</div>
						</div>                        
					</div>
					<div class="row">
						<div class="col-xs-12" align="center"  >
							<button class="btn btn-success btn-lg " type="submit">Start Subscription</button>
						</div>
					</div>
					<div class="row" style="display:none;">
						<div class="col-xs-12">
							<p class="payment-errors"></p>
						</div>
					</div>
				</form>
			</div>
		</div>       
	</div>
</div>
@endsection
