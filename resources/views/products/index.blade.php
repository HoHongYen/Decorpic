@extends("layout.layout")
@section("content")
   <h3 class="mb-5 text-3xl font-bold underline text-center"> Tất cả sản phẩm</h3>
   <div class="flex flex-col items-center w-[800px] mx-auto">
       <div class="grid grid-cols-3 gap-4">
           @forelse ($products as $product)
           @include("products.shared.product-card")
           @empty
           <p class="col-span-3 text-center text-gray-500">Không có sản phẩm nào.</p>
           @endforelse
        </div>
        <div class="mt-5 flex justify-end w-full">
            {{ $products->links() }}
        </div>
    </div>
@endsection
