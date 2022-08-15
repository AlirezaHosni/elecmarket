<section class="p-tabs">
    <ul class="c-box-tabs">
        <li class="c-box-tabs__tab is-active"><a id="desc" href="#"><i class="fa fa-glasses"></i>
                <span>بررسی تخصصی</span></a></li>
        <li class="c-box-tabs__tab"><a id="params" href="#"><i class="fa fa-tasks"></i> <span>جزییات فنی</span></a>
        </li>
        <li class="c-box-tabs__tab"><a id="comments" href="#"><i class="fa fa-comments"></i>
                <span>نظرات کاربران</span></a></li>
    </ul>
    <div class="c-box--tabs p-tabs__content">
        <div id="desc" class="c-content-expert is-active">
            <article>
                <h2 class="c-params__headline"> بررسی تخصصی <span> {{ $productDetails->title }} </span>
                </h2>
                <section class="c-content-expert__summary">
                    <div class="c-mask">
                        <div class="c-mask__text c-mask__text--product-summary"
                             style="max-height: 500px;height: outh;">
                            <p style="height: auto">{!! $productDetails->description !!}</p>
                        </div>
                    </div>
                        
                </section>
            </article>
        </div>
        <div id="params">
            <article>
                <h2 class="c-params__headline"> جزییات فنی <span>{{ $productDetails->title }} </span>
                </h2>
                {!!  $productDetails->description_short !!}
            </article>
        </div>
        <div id="comments">
            <h2 class="c-comments__headline"> امتیاز کاربران به: <span>{{ $productDetails->title }}</span>
            </h2>
            <div class="c-comments__summary">
                <div class="c-comments__summary-note"><span>شما هم می‌توانید در مورد این کالا نظر بدهید.</span>
                    <p>برای ثبت نظر، لازم است ابتدا وارد حساب کاربری خود شوید. اگر این محصول را قبلا از
                        خریده باشید، نظر شما به عنوان مالک محصول ثبت خواهد شد.</p> <a href="#"
                                                                                      class="btn-add-comment is-disabled"><span>افزودن نظر جدید</span></a>
                </div>
            </div>
            <div id="questions" class="is-active">
                <div class="c-faq__headline"> نظرات<span>نظرات کاربران</span></div>
                @auth
                <form action="{{ url('/add-comment') }}" method="post" class="c-form-faq">
                    @csrf
                    <input type="hidden" name="product_id" value="{{ $productDetails->id }}">
                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                    <textarea class="form-control form-control-rounded" id="comment_body" rows="5" name="comment_body" required></textarea>

                    <div class="form-row">
                        <button class="btn-tertiary">ثبت </button>
                        <div class="agreement">
                            <input id="agree" type="checkbox">
                        </div>
                    </div>
                </form>
                @endauth
                <div id="product-questions-list">
                    <ul class="c-faq__list">
                        @foreach($productDetails->comments as $comment)
                        <li class="is-question">
                            <div class="section">
                                <div class="c-faq__header c-faq__header--question header">
                                    <p class="h5"> نظر <span>{{ $comment->user->username }} </span></p>
                                </div>
                                <p>{{ $comment->body }}</p>
                                <div class="footer"> <em>{{  Verta($comment->user->created_at)->format('%d %B %Y H:i')  }}</em>
                                </div>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                </div>


            </div>

        </div>
    </div>
</section>
