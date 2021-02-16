 
<div id="loadingimage" style="display:none;" class="loader"></div>
<div class="demo">
    <div class="container">
        <div class="row">
		<?php
		foreach($ChildList as $row)
		{
			?> 
            <div class="col-md-4 col-md-4 col-sm-3 col-sm-6">
                <div class="email-signature">
                    <div class="signature-content">
                        <div class="signature-icon">
                           <i class="fa fa-user-circle" aria-hidden="true" style="font-size: 56px;margin: 30px auto;"></i>  
                        </div>
                        <div class="signature-details">
                            <h2 class="title"><?php echo $row['student_name']; ?></h2>
                            <span class="post"><?php echo $row['Grade']; ?></span>
                        </div>
                        <ul class="content">
                            <li><i class="fa fa-phone"></i> <?php echo $row['username']; ?></li>
                            <li><i class="fa fa-globe"></i> <?php echo $row['band_curriculum']; ?></li>
                            <li><i class="fa fa-envelope"></i> <?php echo $row['pack_name']; ?></li>
                        </ul>
                        <ul class="icon">
                            <li><a href="javascript:;" class="">Login</a></li> 
                        </ul>
                    </div>
                </div>
            </div>
		<?php
		}
		?>
	  </div>
    </div>
</div> 
 
<!--<script src="<?php echo base_url(); ?>assetsnew/css/jquery.min.js"></script>-->
 <link href="<?php echo base_url(); ?>assets/css/commonstyle.css" rel="stylesheet"> 
 <script type="text/javascript"> 
 $(document).ready(function(){
    $('.new-counter-value').each(function(){
        $(this).prop('Counter',0).animate({
            Counter: $(this).text()
        },{
            duration: 3500,
            easing: 'swing',
            step: function (now){
                $(this).text(Math.ceil(now));
            }
        });
    });
});
</script>
<style> 
.inactiveLink{pointer-events: none;cursor: default;}
</style>
 
 
<style>
.demo{ background: #e7e7e7;margin:0px; padding:60px 0; } 
.email-signature{
    color: #fff;
    background: #EB0B54;
    font-family: 'Roboto Slab', sans-serif;
    text-align: center;
    margin: 0 0 20px;
    box-shadow: 0 0 25px -10px rgba(0,0,0,0.5);
    position: relative;
    z-index: 1;
}
.email-signature:before,
.email-signature:after{
    content: '';
    background: linear-gradient(to left,#FD1356 0, #FD1356 23%,#fff 23%,#fff 26.3%,#4D4D4D 26.3%,#4D4D4D 50%,#fff 50%, #fff 53.3%,#FD1356 53.3%,#FD1356 77%,#fff 77%,#fff 80.3%,#4D4D4D 80.3%);
    height: 30px;
    width: 100%;
    position: absolute;
    left: 0;
    top: 0;
}
.email-signature:after{
    transform: rotateY(180deg);
    top: auto;
    bottom: 0;
}
.email-signature .signature-content{
    color: #333;
    background-color: #fff;
    padding: 50px 25px;
    border-radius: 0 180px;
}
.email-signature .signature-icon{
    width: 120px;
    height: 120px;
    border: 5px solid #EB0B54;
    outline: 3px solid #fff;
    outline-offset: -8px;
    box-shadow: 0 0 15px -5px rgba(0,0,0,0.5);
    margin: 0 auto 15px;
    overflow: hidden;
}
.email-signature .signature-icon img{
    width: 100%;
    height: auto;
}
.email-signature .signature-details{ margin: 0 0 15px; }
.email-signature .title{
    font-size: 22px;
    font-weight: 600;
    text-transform: capitalize;
    margin: 0 0 2px;
}
.email-signature .post{
    font-size: 14px;
    font-weight: 500;
    text-transform: capitalize;
}
.email-signature .content{
    text-align: left;
    padding: 0 0 0 20px;
    margin: 0 0 20px;
    list-style: none;
    display: inline-block;
}
.email-signature .content li{
    font-size: 13px;
    font-weight: 500;
    margin-bottom: 2px;
}
.email-signature .content li:last-child{ margin-bottom: 0; }
.email-signature .content li i{
    color: #fff;
    background-color: #EB0B54;
    font-size: 12px;
    text-align: center;
    line-height: 30px;
    height: 30px;
    width: 30px;
    margin: 0 4px 0 0;
    clip-path: polygon(50% 0%, 100% 50%, 50% 100%, 0% 50%);
}
.email-signature .icon{
    padding: 0;
    margin: 0;
    list-style: none;
}
.email-signature .icon li{
    display: inline-block;
    margin: 0 2px;
}
.email-signature .icon li a{
    color: #333;
    text-align: center;
    line-height: 23px; 
    border: 1px solid #333;
    display: block;
    transition: all 0.3s ease;
	padding: 5px 19px;
    font-weight: bold;
}
.email-signature .icon li a:hover{
    color: #fff;
    background-color: #EB0B54;
    border-radius: 50%;
}
</style>