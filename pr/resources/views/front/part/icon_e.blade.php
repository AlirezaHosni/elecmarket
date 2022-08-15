<style>
    .shopping-features{
        width: 100%;
        background: #ffffff;
        padding: 15px;
        float: right;
        text-align: center;
    }
    .shopping-features .item{
        padding: 0 70px 0 0;
        text-align: right;
        position: relative;
        width: 20%;
        float: right;
        margin: 0 auto;
        display: inline-block;
    }

    .shopping-features .item span{
        display: block;
        float: right;
    }

    .shopping-features .item span.icon-shopping{
        height: auto;
        padding: 0;
        line-height: normal;
        text-align: center;
        margin: 0!important;
        font-size: 36px;
        color: #616161;
        position: absolute;
        right: 10px;
    }

    .shopping-features .item span.title-shopping{
        color: #999;
        font-size: 14px;
        font-weight: 600;
        margin-bottom: 5px;
        margin-top: 5px;
        width: 100%;
    }

    .shopping-features .item span.desc-shopping{
        color: #aaa;
        font-size: 12px;
        font-weight: 400;
    }
    @media (max-width: 768px){
        .shopping-features .item{
            width: 50%;
            text-align: center;
            margin-bottom: 20px;
            padding-top: 70px;
            padding-right: 0;
        }

        .shopping-features .item span{
            float: none;
        }

        .shopping-features .item span.icon-shopping{
            top: 0;
            width: 100%;
            right: 0;
        }

        footer.footer-main-site .footer-middlebar .footer-safety-partner .widget-product img{
            max-width: 50%;
        }

    }

</style>
<section class="d-block d-xl-block d-lg-block d-md-block d-sm-block order-1 icon-e">
        <div class="container-fluid">
            <div class="shopping-features">
                <div class="col-12">
                <div class="item">
                                            <span class="icon-shopping">
                                                <img
                                                    src="{{ asset('/assets/front/images/footer/features/delivery-truck.svg') }}"
                                                    width="50" alt="تحویل اکسپرس" class="img-shopping">
                                            </span>
                        <span class="title-shopping">تحویل اکسپرس</span>
                        <span class="desc-shopping">در کمترین زمان دریافت کنید</span>
                    </div>
                    <div class="item">
                                            <span class="icon-shopping">
                                                <img
                                                    src="{{ asset('/assets/front/images/footer/features/24-hours-support.svg') }}"
                                                    width="50" alt="پشتیبانی ۲۴ ساعته" class="img-shopping">
                                            </span>
                        <span class="title-shopping">پشتیبانی ۲۴ ساعته</span>
                        <span class="desc-shopping">پشتیبانی هفت روز هفته</span>
                    </div>
                    <div class="item">
                                            <span class="icon-shopping">
                                                <img
                                                    src="{{ asset('/assets/front/images/footer/features/easy-return.svg') }}"
                                                    width="50" alt="۷ روز ضمانت بازگشت" class="img-shopping">
                                            </span>
                        <span class="title-shopping">۷ روز ضمانت بازگشت</span>
                        <span class="desc-shopping">هفت روز مهلت دارید </span>
                    </div>
                    <div class="item">
                                            <span class="icon-shopping">
                                                <img
                                                    src="{{ asset('/assets/front/images/footer/features/original.svg') }}"
                                                    width="50"
                                                    alt="ضمانت اصل&zwnj;بودن کالا" class="img-shopping">
                                            </span>
                        <span class="title-shopping">ضمانت اصل&zwnj;بودن کالا</span>
                        <span class="desc-shopping">تایید اصالت کالا</span>
                    </div>
                    <div class="item">
                                            <span class="icon-shopping">
                                                <img src="{{ asset('/assets/front/images/footer/features/income.svg') }}" width="50" alt="پرداخت در محل" class="img-shopping">
                                            </span>
                        <span class="title-shopping">پرداخت در محل</span>
                        <span class="desc-shopping">هنگام دریافت پرداخت کنید</span>
                    </div>
                </div>
            </div>
        </div>
</section>
