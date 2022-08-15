@php
    use App\Category;
@endphp
@php
    $categories_menu_asli = "";
    $categoriymenu = Category::with('categories')->where(['parent_id' => 0])->get();
   // dd($categoriymenu);
    $categoriymenu = json_decode(json_encode($categoriymenu));
    foreach ($categoriymenu as $cat) {
        $links = url('/products/category')."/".$cat->slug;
        $categories_menu_asli .= "<li><a href='#'><i class='fa fa-angle-down'></i>$cat->title </a>";
        $categories_menu_asli .="<ul>";
        //subcategory 0
        $sub_categoriesmenu = Category::where(['parent_id' => $cat->id])->get();
        foreach ($sub_categoriesmenu as $sub_categoriesmenu) {

            $links = url('/products/category')."/".$sub_categoriesmenu->slug;
            $categories_menu_asli .="<li class='has-children'><a href='$links'><span> $sub_categoriesmenu->title</span></a>";
            $categories_menu_asli .= "<ul>";
            //subcategory 1
            $sub_categoriesone = Category::where(['parent_id' => $sub_categoriesmenu->id])->get();
            foreach ($sub_categoriesone as $sub_categoriesone) {
                $links = url('/products/category')."/".$sub_categoriesone->slug;
                $categories_menu_asli .="<li><a href='$links'>  $sub_categoriesone->title </a></li>";
            }
            $categories_menu_asli .="</ul>";
            $categories_menu_asli .="</li>";
        }
        $categories_menu_asli .="</ul>";
        $categories_menu_asli .= "</li>";
    }

@endphp
<div class="bn_product_menu-container">
    <div class="bn_product_menu">
        <ul>
            @php echo $categories_menu_asli;  @endphp
        </ul>

    </div>
</div>
