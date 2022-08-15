<style>
    .cta-whatsapp-wrapper
    {

        position: fixed;
        bottom:100px;
        right: 20px;
        cursor: pointer;
    }
    .cta-whatsapp-wrapper .img-cta-whatsapp
    {
        width:60px;
        height:60px;
    }
    .cta-whatsapp-wrapper .img-cta-whatsapp img
    {
        width: 100%;
        position: relative;
    }
    /*.cta-whatsapp-wrapper .img-cta-whatsapp:after*/
    /*{*/
    /*    content: 'فروشگاه اینترنتی الکمارکتینگ';*/
    /*    width: 150px;*/
    /*    right:50px;*/
    /*    top:30%;*/
    /*    z-index:50000;*/
    /*    position: absolute;*/
    /*    background-color:#79ba7d;*/
    /*    padding:2px 5px;*/
    /*    border-radius:5px;*/
    /*    color: #f2faff;*/
    /*    text-align: center;*/
    /*}*/
    .box-cta-whatsapp-wrapper
    {
        position: fixed;
        background-color:#79ba7e;
        bottom:20px;
        right: 10px;
        width:320px;
        padding: 15px 10px;
        text-align: justify;
        font-size:0.8em;
        border-radius: 4px;
        color: #f2faff;
        display: none;
        opacity: 0.95;
    }
    .box-cta-whatsapp-wrapper h5
    {
        font-size:1.1em !important;
        text-align: center;
        margin:20px 0;
        font-weight: 600;
        color:  #262626;
    }
    .box-cta-whatsapp-wrapper a
    {
        background-color:#f2faff;
        display: block;
        padding:7px;
        text-align: center;
        color:  #262626;
        border-radius: 4px;
        font-size:1.1em;
        font-weight: 600;
    }
    .box-cta-whatsapp-wrapper span
    {
        position: absolute;
        top:10px;
    }
    .box-cta-whatsapp-wrapper span img
    {
        width:30px;
        z-index: 99;
        margin-top:-5px
    }
    .box-cta-whatsapp-wrapper a:hover
    {
        color:#79ba7e;
    }
    body {
        direction: rtl;
    }
</style>
<section class="cta-whatsapp-wrapper">
    <div class="img-cta-whatsapp" style="">
        <a href="https://wa.me/989120938596?text=سلام. وقت بخیر! من از طریق فروشگاه اینترنتی الکمارکتینگ با شما ارتباط میگیرم!" target="_blank">
            <img src="{{ asset('assets/img/social/whatsapp.png') }}" alt="لوگوی شبکه اجتماعی واتس آپ">
        </a>
    </div>
</section>