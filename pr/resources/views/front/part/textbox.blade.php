<!-- Start: TextBox -->
<?php
$color = \App\Setting::first();
$bgcolor = $color->bn_textbox ?? '#ffffff';
$text = \App\Text::latest()->get();

?>
<div class="bn_textbox" style="background-color: {{ $bgcolor??'#ffffff' }};margin-top: 5%">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <ul class="bn_textbox_slider">
                    @forelse($text as $row)
                        <li>
                            <p style="color: #0b0b0b">
                                {{ $row->text }}
                            </p>
                        </li>
                    @empty
                    @endforelse

                </ul>
            </div>
        </div>
    </div>
</div>
<!-- Start: Awards -->

