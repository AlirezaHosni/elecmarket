@if(isset($selected_category))
    @foreach($categories as $sub_category)
        <option value="{{$sub_category->id}}" @if($selected_category->parent_id == $sub_category->id) selected @endif>{{str_repeat('------>', $level)}} {{$sub_category->title}}</option>
        @if(count($sub_category->parent) > 0)
            @include('admin.partials.category', ['categories' => $sub_category->parent, 'level' => $level+1, 'selected_category'=> $selected_category])
        @endif
    @endforeach
@else
    @foreach($categories as $sub_category)
        <option value="{{$sub_category->id}}">{{str_repeat('------>', $level)}} {{$sub_category->title}}</option>
        @if(count($sub_category->parent) > 0)
            @include('admin.partials.category', ['categories' => $sub_category->parent, 'level' => $level+1])
        @endif
    @endforeach
@endif
