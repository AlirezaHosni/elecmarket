@foreach($categories as $sub_category)
    <tr>
        <th class="text-center">{{$sub_category->id}}</th>
        <th> <span
                class="badge bg-success" style="margin-right: 10px;margin-left: 10px;"> {{ $sub_category->children->title??'' }}</span>{{str_repeat('-->', $level)}} {{$sub_category->title}}</th>
        <th>{{ $sub_category->slug }}</th>
        <th>@if($sub_category->parent_id==0) <span
                class="badge bg-danger"> دسته مادر </span> @else <span
                class="badge bg-success"> {{ $sub_category->children->title??'' }}</span> @endif </th>
        <th>{{ Verta($sub_category->updated_at)->format('%d %B %Y H:i') }}</th>
        <td>@if($sub_category->status=="0") <span
                class="badge bg-danger">در حال بررسی</span> @else <span
                class="badge badge-primary">تایید شده</span> @endif</td>
        <td class="text-center">
            <div class="tools">
                <a href="{{ url('/ad/categories/edit/'.$sub_category->id) }}"
                   style="margin-right: 10px;margin-left: 10px;">
                    <i class="fa fa-edit"></i>
                </a>
                <a id="delRole" rel="{{ $sub_category->id }}"
                   rel1="categories/del"
                   href="javascript:"
                   class="deleteRecord">
                    <i class="fa fa-trash-o"></i>
                </a>
            </div>


        </td>
    </tr>
    @if(count($sub_category->parent) > 0)
        @include('admin.partials.category_list', ['categories' => $sub_category->parent, 'level' => $level+1])
    @endif
@endforeach
