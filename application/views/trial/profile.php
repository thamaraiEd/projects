<div class="demo">
    <div class="container">
        <div class="row">
            <div class="col-lg-offset-3 col-lg-6 col-md-offset-2 col-md-8 col-sm-offset-1 col-sm-10">
                <div class="email-signature">
                    <div class="signature-icon">
                        <i class="fa fa-user"></i>
                    </div>
                    <div class="signature-details">
                        <h2 class="title"><?php echo $this->session->fname; ?></h2> 
                    </div>
                    <ul class="signature-content">
                        <li><span class="fa fa-phone"></span> <?php echo $this->session->contactnumber; ?></li>
                        <li><span class="fa fa-map-marker-alt"></span> #2021 Lorem Ipsum</li>
                        <li><span class="fa fa-envelope"></span> <?php echo $this->session->username; ?></li>
                    </ul>
                     
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.demo{ background-color: #CFEEF0; margin:0px; padding: 60px 0 !important;}
.email-signature{
    background: #fff;
    font-family: 'Raleway', sans-serif;
    text-align: center;
    padding: 10px 0 0;
    box-shadow: 5px 5px 0 rgba(0, 0, 0, 0.1);
}
.email-signature .signature-icon{
    color: #fff;
    background-color: #F29F11;
    font-size: 30px;
    line-height: 60px;
    height: 60px;
    width: 60px;
    margin: 0 auto 10px;
    border-radius: 50%;
}
.email-signature .signature-details{
    padding: 0 15px;
    margin: 0 0 10px;
}
.email-signature .title{
    color: #DE2461;
    font-family: 'Roboto Slab', serif;
    font-size: 30px;
    font-weight: 500;
    margin: 0 0 1px;
}
.email-signature .post{
    color: #1EB3B9;
    font-size: 17px;
    font-weight: 700;
    letter-spacing: 1px;
    text-transform: capitalize;
}
.email-signature .signature-content{
    font-size: 0;
    padding: 0;
    margin: 0;
    list-style: none;
}
.email-signature .signature-content li{
    color: #fff;
    background-color: #1EB3B9;
    font-size: 13px;
    letter-spacing: 0.5px;
    width: 27%;
    min-height: 90px;
    padding: 20px 10px;
    margin-bottom: 3px;
    vertical-align: top;
    display: inline-block;
}
.email-signature .signature-content li:nth-child(2){
    background-color: #F29F11;
    width: 31%;
}
.email-signature .signature-content li:nth-child(3){
    background-color: #DE2461;
    width: 42%;
}
.email-signature .signature-content li span{
    font-size: 15px;
    width: 30px;
    padding: 0 0 5px;
    margin: 0 auto 5px;
    border-bottom: 2px solid #fff;
    display: block;
}
.email-signature .icon{
    padding: 7px 0;
    margin: 0;
    list-style: none;
}
.email-signature .icon li{
    font-size: 18px;
    margin: 0 4px;
    display: inline-block;
}
.email-signature .icon li a{
    color: #fff;
    background-color: #DE2461;
    font-size: 15px;
    line-height: 30px;
    width: 30px;
    height: 30px;
    border-radius: 50%;
    transition: all 0.3s ease 0s;
}
.email-signature .icon li a:hover{
    color: #DE2461;
    background-color: #fff;
    box-shadow: 0 0 5px #DE2461 inset;
}
@media screen and (max-width:576px) {
    .email-signature .signature-content li,
    .email-signature .signature-content li:nth-child(2),
    .email-signature .signature-content li:nth-child(3){
        width: 100%;
        margin: 0;
        display: block;
    }
}
</style>