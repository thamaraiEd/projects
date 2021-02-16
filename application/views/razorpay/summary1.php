<?php
$order_id="EdB2C_".$pay_id;
$productinfo=$Plan_Info['plan'];
$txnid = time();
$surl = $surl;
$furl = $furl;        
$key_id = RAZOR_KEY_ID;
$currency_code = $currency_code;            
$total = ($this->session->temp_Final_Pay_Amount* 100); 
$amount = $this->session->temp_Final_Pay_Amount;
$merchant_order_id = $order_id;
$card_holder_name =$this->session->temp_User;
$email=$this->session->temp_Email;
$phone=$this->session->temp_Mobile;
$name= APPLICATION_NAME;
$return_url = site_url().'index.php/razorpay/callback';

?>
<div class="container" style="min-height: 500px;padding: 10px 0px;">
<div class="col-md-12 col-sm-12 col-xs-12">
 

		<div class="col-md-12 col-sm-12 col-xs-12">


			<div class="row form-wrapper ">

<div class="row">
    <div class="col-lg-12 text-center">
        <h2 class="panel-title" style="font-size:28px;">Checkout Page</h2>                 
    </div>
</div><!-- /.row -->
 <form name="razorpay-form" id="razorpay-form" action="<?php echo $return_url; ?>" method="POST">
  <input type="hidden" name="razorpay_payment_id" id="razorpay_payment_id" />
  <input type="hidden" name="merchant_order_id" id="merchant_order_id" value="<?php echo $merchant_order_id; ?>"/>
  <input type="hidden" name="merchant_trans_id" id="merchant_trans_id" value="<?php echo $txnid; ?>"/>
  <input type="hidden" name="merchant_product_info_id" id="merchant_product_info_id" value="<?php echo $productinfo; ?>"/>
  <input type="hidden" name="merchant_surl_id" id="merchant_surl_id" value="<?php echo $surl; ?>"/>
  <input type="hidden" name="merchant_furl_id" id="merchant_furl_id" value="<?php echo $furl; ?>"/>
  <input type="hidden" name="card_holder_name_id" id="card_holder_name_id" value="<?php echo $card_holder_name; ?>"/>
  <input type="hidden" name="merchant_total" id="merchant_total" value="<?php echo $total; ?>"/>
  <input type="hidden" name="merchant_id" id="merchant_id" value="<?php echo $pay_id; ?>"/>
  <input type="hidden" name="merchant_amount" id="merchant_amount" value="<?php echo $amount; ?>"/>
</form>
    <!--<div class="row">   
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">                        
            <table class="table table-bordered table-hover table-striped print-table order-table" style="font-size:11px;">
                <thead class="bg-primary">
                    <tr> 
                        <th width="30%" class="text-left" style="vertical-align: inherit">Product Name</th>
                        <th width="15%" class="text-left" style="vertical-align: inherit">Product Price</th>
                        <th width="15%" class="text-left" style="vertical-align: inherit">Product Validity</th>
                        <th width="15%" class="text-right" style="vertical-align: inherit">Coupon Code</th>
                        <th width="15%" class="text-right" style="vertical-align: inherit">Discount %</th>
                        <th width="15%" class="text-right" style="vertical-align: inherit">Sub Total</th>                        
                    </tr>
                </thead>                        
                <tbody>                    
                    <tr> 
                        <td class="text-left"><?php echo $Plan_Info['plan'];?></td>
                        <td class="text-left"><?php echo $this->session->temp_payable_amount;?></td>
						<td class="text-left"><?php echo $Plan_Info['plan_duration'];?></td>
                        <td class="text-left"><?php echo $this->session->temp_Coupon;?></td>
                        <td class="text-left"><?php echo $this->session->temp_discount;?></td>
                        <td class="text-left"><?php echo $this->session->temp_Final_Pay_Amount;?></td>   
                    </tr>                        
                </tbody>                        
            </table>
        </div>
    </div>-->
	
	<div class="container">
		<div class="row">
    				<!-- BEGIN INVOICE -->
					<div class="col-xs-12">
						<div class="frmfreereg invoice">
							<div class="grid-body">
								<div class="invoice-title"> 
									<div class="row">
										<div class="col-xs-12">
											<div class="col-xs-6 text-left">
												<h3 style="margin:0px;" class="panel-title-left">Order ID<br>
												<span class="small">#<?php echo $order_id; ?></span></h3>
											</div>
											<div class="col-xs-6 text-right">
												<address>
													<h3  style="margin:0px;" class="panel-title-right"><strong>Order Date</strong><br>
													<span class="small"><?php echo date('d-m-Y'); ?></span></h3>
												</address>
											</div>
										</div>
									</div>
								</div>
								<hr>
								<div class="row">
									<div class="col-md-12">
										<div class="col-xs-6">
											<h3 class="panel-title1" style="margin:0px;">
												<strong>User Information</strong>
											</h3>
											<div class="user_info">
												<div class="col-xs-12">
													<div class="col-xs-3 nopad">Name</div><div class="col-xs-1 nopad"> : </div>
													<div class="col-xs-6"> <?php echo $this->session->temp_User; ?></div>
												</div>
												<div class="col-xs-12">
													<div class="col-xs-3 nopad">Mobile No</div><div class="col-xs-1 nopad"> : </div>
													<div class="col-xs-6">  <?php echo $this->session->temp_country_code." ".$this->session->temp_Mobile; ?></div>
												</div>
												<div class="col-xs-12">
													<div class="col-xs-3 nopad">Email</div><div class="col-xs-1 nopad"> : </div>
													<div class="col-xs-6">  <?php echo $this->session->temp_Email; ?></div>
												</div>
											</div>
										</div>  
									</div>  
								</div> 
								<div class="row" style="margin:20px 0px;">
									<div class="col-md-12">
										<h3 class="panel-title">ORDER SUMMARY</h3>
										<table class="table table-bordered table-hover table-striped print-table order-table">
											<thead class="bg-primary">
												<tr class="line"> 
													<th class="text-center"><strong>Product Name</strong></th>
													<th class="text-center"><strong>Product Price</strong></th>
													<th class="text-center"><strong>Product Validity</strong></th>
													<th class="text-center"><strong>Coupon Code</strong></th>
													<th class="text-center"><strong>Discount %</strong></th>
													<th class="text-center"><strong>Discount Amount</strong></th>
												</tr>
											</thead>
											<tbody>
												<tr>
													<td class="text-center"><?php echo $Plan_Info['plan'];?></td>
													<td class="text-center"><?php echo $this->session->temp_payable_amount;?></td>
													<td class="text-center"><?php echo $Plan_Info['plan_duration'];?></td>
													<td class="text-center">
													<?php 
													if(isset($this->session->temp_Coupon) && $this->session->temp_Coupon!='')
													{
														echo $this->session->temp_Coupon;
													}
													else
													{
														echo "-";
													}													
													?>
													</td>
													<td class="text-center">
													<?php 
													if(isset($this->session->temp_Coupon) && $this->session->temp_Coupon!='')
													{
														echo $this->session->temp_discount;
													}
													else
													{
														echo "-";
													}
													?>
													</td>
													<td class="text-center">
													<?php  
													if(isset($this->session->temp_Coupon) && $this->session->temp_Coupon!='')
													{
														echo ROUND((($this->session->temp_payable_amount*$this->session->temp_discount)/100),2);
													}
													else
													{
														echo 0;
													}
													?></td>   
												</tr>  
												<tr>
													<td colspan="4"></td>
													<td class="text-center"><strong>Total</strong></td>
													<td class="text-center"><strong><?php echo $currency_code." ".$this->session->temp_Final_Pay_Amount;?></strong></td>
												</tr>
											</tbody>
										</table>
									</div>									
								</div> 
							</div>
						</div>
					</div>
					<!-- END INVOICE -->
			</div>
	</div>

    <div class="row">
        <div class="col-lg-12 text-right">
            <!--<a href="<?php print site_url();?>" name="reset_add_emp" id="re-submit-emp" class="btn btn-warning"><i class="fa fa-mail-reply"></i> Back</a>-->
            <input  id="submit-pay" type="submit" onclick="razorpaySubmit(this);" value="Pay Now" class="btn btn-primary" />
        </div>
    </div>

</div>
</div>
</div>
</div>

 
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script>
	var razorpay_options =
	{
		key: "<?php echo $key_id; ?>",
		amount: "<?php echo $total; ?>",
		name: "<?php echo $name; ?>",
		description: "<?php echo $order_id; ?>",
		netbanking: true,
		currency: "<?php echo $currency_code; ?>",
		prefill:
		{
			name:"<?php echo $card_holder_name; ?>",
			email: "<?php echo $email; ?>",
			contact: "<?php echo $phone; ?>"
		},
		notes:
		{
			soolegal_order_id: "<?php echo $order_id; ?>",
		},
		handler: function (transaction)
		{
			document.getElementById('razorpay_payment_id').value = transaction.razorpay_payment_id;
			document.getElementById('razorpay-form').submit();
		},
		"modal":
		{
			"ondismiss": function()
			{
				location.reload()
			}
		}
	};
	var razorpay_submit_btn, razorpay_instance;

	function razorpaySubmit(el)
	{
		
		if(typeof Razorpay == 'undefined')
		{
			setTimeout(razorpaySubmit, 200);
			if(!razorpay_submit_btn && el)
			{
				razorpay_submit_btn = el;
				el.disabled = true;
				el.value = 'Please wait...';  
			}
		}
		else
		{
			if(!razorpay_instance)
			{
				razorpay_instance = new Razorpay(razorpay_options);
				if(razorpay_submit_btn)
				{
				  razorpay_submit_btn.disabled = false;
				  razorpay_submit_btn.value = "Pay Now";
				}
			}
		  razorpay_instance.open();
		}
	}  
	
</script>

<style>
.invoice {
    padding: 30px;
}

.invoice h2 {
	margin-top: 0px;
	line-height: 0.8em;
}

.invoice .small {
	font-weight: 300;
}

.invoice hr {
	margin-top: 10px;
	border-color: #a55b37;
}

.invoice .table tr.line {
	border-bottom: 1px solid #a55b37;
}

.invoice .table td {
	font-size: 1.1em;
}
.bg-primary {
    color: #fff;
    background-color: #673AB7;
}

.invoice .identity {
	margin-top: 10px;
	font-size: 1.1em;
	font-weight: 300;
}

.invoice .identity strong {
	font-weight: 600;  
}

.user_info{
	font-size:17px;  font-family: "Montserrat-SemiBold";
}
.panel-title1{color: #ff8a50;
    font-size: 22px;
    text-decoration: underline;}
.nopad{padding:0px;}
.panel-title-left {
    text-align: center;
    font-size: 19px;
    margin-bottom: 15px;
    color: #000;
    font-family: "Montserrat-Black";
    text-transform: uppercase;
}
.panel-title-right{
    text-align: center;
    font-size: 19px;
    margin-bottom: 15px;
    color: #000;
    font-family: "Montserrat-Black";
    text-transform: uppercase;
}
h3 .small
{
	color: #E91E63;
}
</style>
