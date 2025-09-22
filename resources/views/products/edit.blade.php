@extends("layout.layout")
@section("content")
<div class="flex flex-col items-center w-[500px] mx-auto">
   <h3 class="mb-5 text-3xl font-bold underline text-center"> Chỉnh sửa sản phẩm</h3>
   <form action="{{ route("products.update", $product->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method("PUT")
        <div class="mb-4">
            <img src="{{ $product->getImageURL() }}" alt="">
        </div>
        <div class="mb-4">  
            <label for="image" class="block text-gray-700 font-bold mb-2">Thay ảnh sản phẩm:</label>
            <input value="{{ $product->getImageURL() }}" type="file" id="image" name="image" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </div>
        <div class="mb-4">
            <label for="name" class="block text-gray-700 font-bold mb-2">Tên sản phẩm:</label>
            <input type="text" id="name" name="name" value="{{ $product->name }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </div>
        <div class="mb-4">
            <label for="price" class="block text-gray-700 font-bold mb-2">Giá:</label>
            <input type="number" id="price" name="price" value="{{ $product->price }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </div>
        <div class="mb-4">
            <label for="quantity" class="block text-gray-700 font-bold mb-2">Số lượng:</label>
            <input type="number" id="quantity" name="quantity" value="{{ $product->quantity }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </div>
        <div class="mb-4">
            <label for="description" class="block text-gray-700 font-bold mb-2">Mô tả:</label>
            <textarea id="description" name="description" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">{{ $product->description }}</textarea>
        </div>
        <div>
            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" type="submit">Lưu</button>
        </div>
   </form>
</div>
@endsection
