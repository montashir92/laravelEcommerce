<div class="sidebar">
    <div class="sidebar_category">
        <h3>Category</h3>
        <div class="list-group">
            @foreach(App\Models\Category::where('parent_id', NULL)->get() as $parent)
            <a href="#main{{ $parent->id }}" class="list-group-item list-group-item-action" data-toggle="collapse">
                <img src="{{ asset('images/categories/'.$parent->image) }}" width="30" class="mr-2">
                {{ $parent->name }}
            </a>
            
            <div class="collapse
                 @if(Route::is('categories.show'))
                    @if(App\Models\Category::ParentOrNotCategory($parent->id, $category->id))
                     show
                    @endif
                 @endif
                 " id="main{{ $parent->id }}">
                <div class="child-rows">
                    @foreach(App\Models\Category::where('parent_id', $parent->id)->get() as $child)
                        <a href="{{ route('categories.show', $child->id) }}" class="list-group-item list-group-item-action
                           @if(Route::is('categories.show'))
                            @if($child->id == $category->id))
                             active
                            @endif
                            @endif
                           ">
                            {{ $child->name }}
                        </a>
                    @endforeach
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <div class="sidebar_brand">

        <h3>Brands</h3>

        <div class="list-group">
            @foreach(App\Models\Brand::orderBy('name', 'asc')->get() as $brand)
            <a href="{{ route('brands.show', $brand->id) }}" class="list-group-item list-group-item-action">
                <img src="{!! asset('images/brands/'.$brand->image) !!}" width="30" class="mr-2">
                {{ $brand->name }}
            </a>
            @endforeach
        </div>
    </div>

</div>
