@if(Session::has('flash_message_success'))
    <div class="alert alert-success alert-block" style="width: 60%;
    border-radius: 40px;
    font-weight: 600;
    padding: 7px 20px;
    display: flex;
    justify-content: space-between;
    margin: 20px auto;">

        <strong>{!! session('flash_message_success') !!}</strong>
        <button type="button" class="close" data-dismiss="alert" style="float: left;outline: none;
    color: #856404;">×</button>
    </div>
@endif
@if(Session::has('flash_message_error'))
    <div class="alert alert-error alert-block" style="width: 60%;
    border-radius: 40px;
    font-weight: 600;
    padding: 7px 20px;
    display: flex;
    color: #b9151b;
    justify-content: space-between;
    margin: 20px auto;">

        <strong  style="color: #b9151b;">{!! session('flash_message_error') !!}</strong>
        <button type="button" class="close" data-dismiss="alert" style="float: left;outline: none;
    color: #856404;">×</button>
    </div>
@endif
