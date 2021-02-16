<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Colorlib Templates">
    <meta name="author" content="Colorlib">
    <meta name="keywords" content="Colorlib Templates">

    <!-- Title Page-->
    <title>Au Register Forms by Colorlib</title>

    <!-- Icons font CSS-->
    <link href="<?php echo base_url(); ?>assets/vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="<?php echo base_url(); ?>assets/vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <!-- Font special for pages-->
  

    <!-- Vendor CSS-->
    <link href="<?php echo base_url(); ?>assets/vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="<?php echo base_url(); ?>assets/vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="<?php echo base_url(); ?>assets/css/main.css" rel="stylesheet" media="all">
</head>

<body>
    <div class="page-wrapper bg-blue p-t-100 p-b-100 font-robo">
        <div class="wrapper wrapper--w680">
            <div class="card card-1">
                <div class="card-heading"></div>
                <div class="card-body">
                    <h2 class="title  glow-on-hover" style="font-family:Poppins, sans-serif">Please fill form details</h2>
                    <form method="POST">
                        <div class="input-group">
						<!--<label for="txtOPassword">School Name <span style="color:red">*</span></label>-->
                            <input class="input--style-1" type="text" placeholder="School Name" name="schoolname" id="schoolname">
                        </div>
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-groupss">
								<!--<label for="txtOPassword">School Address <span style="color:red">*</span></label>-->
                                
                                  <textarea class="form-control input--style-1" name="scladdress" id="scladdress" placeholder="School Address" style="width: 357px; border-radius: 5px;border: 2px solid #ccc;"></textarea>  
                                </div>  
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <div class="rs-select2 js-select-simple select--no-search">
                                      <input class="input--style-1" type="text" placeholder="City" name="city" id="city">
                                    </div>
                                </div>
                            </div>
                        </div>
						<div class="row row-space">
                           <div class="col-2">
                                <div class="input-group">
                                    <div class="rs-select2 js-select-simple select--no-search">
                                      <input class="input--style-1" type="text" placeholder="State" name="txtstate" id="txtstate">
                                    </div>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <div class="rs-select2 js-select-simple select--no-search">
                                      <input class="input--style-1" type="text" placeholder="Country" name="txtcountry" id="txtcountry">
                                    </div>
                                </div>
                            </div>
                        </div>
						<div class="row row-space">
                           <div class="col-2">
                                <div class="input-group">
                                    <div class="rs-select2 js-select-simple select--no-search">
                                      <input class="input--style-1" type="text" placeholder="Name of Single Point of Contact (SPoC)" name="txtspocname" id="txtspocname">
                                    </div>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <div class="rs-select2 js-select-simple select--no-search">
                                      <input class="input--style-1" type="text" placeholder="Email Id of SPoC"  name="txtspocmailid" id="txtspocmailid">
                                    </div>
                                </div>
                            </div>
                        </div>
						<div class="row row-space">
                           <div class="col-2">
                                <div class="input-group">
                                    <div class="rs-select2 js-select-simple select--no-search">
                                      <input class="input--style-1" type="text" placeholder="Contact Number of SPoC" name="txtspocmobileno" id="txtspocmobileno">
                                    </div>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <div class="rs-select2 js-select-simple select--no-search">
                                        <select name="gender">
                                            <option   selected="selected">Grades</option>
                                            <option>Grade I</option>
                                            <option>Grade II</option>
                                            <option>Grade III</option>
                                            <option>Grade IV</option>
                                            <option>Grade V</option> 
                                            <option>Grade VI</option> 
                                            <option>Grade VII</option> 
                                            <option>Grade VIII</option> 
                                        </select>
                                        <div class="select-dropdown"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
						
						
						<div class="row row-space">
                             <div class="col-2">
                                <div class="input-group">
                                    <div class="rs-select2 js-select-simple select--no-search">
                                      <input class="input--style-1" type="text" placeholder="Total Number of License" name="name">
                                    </div>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <div class="rs-select2 js-select-simple select--no-search">
                                        <select name="gender">
                                            <option disabled="disabled" selected="selected">Month Pack</option>
                                            <option>3 Month</option>
                                            <option>6 Month</option>
                                            <option>9 Month</option>
                                            <option>12 Month</option>
                                        </select>
                                        <div class="select-dropdown"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                      <!--  <div class="input-group">
                            <div class="rs-select2 js-select-simple select--no-search">
                                <select name="class">
                                    <option disabled="disabled" selected="selected">CLASS</option>
                                    <option>Class 1</option>
                                    <option>Class 2</option>
                                    <option>Class 3</option>
                                </select>
                                <div class="select-dropdown"></div>
                            </div>
                        </div>
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <input class="input--style-1" type="text" placeholder="REGISTRATION CODE" name="res_code">
                                </div>
                            </div>
                        </div>-->
                        <div class="p-t-20 wrap">
                            <button class="button" type="submit">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/stylenew.css">
    <!-- Jquery JS-->
    <script src="<?php echo base_url(); ?>assets/vendor/jquery/jquery.min.js"></script>
    <!-- Vendor JS-->
    <script src="<?php echo base_url(); ?>assets/vendor/select2/select2.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/vendor/datepicker/moment.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/vendor/datepicker/daterangepicker.js"></script>

    <!-- Main JS-->
    <script src="<?php echo base_url(); ?>assets/js/global.js"></script> 
	
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>
<!-- end document-->
