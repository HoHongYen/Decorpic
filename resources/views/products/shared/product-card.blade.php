<div class="border p-4 rounded-lg shadow hover:shadow-lg transition duration-300">
    <a href="{{ route('products.show', $product->id) }}">
        <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}"
            class="w-full h-48 object-cover mb-4 rounded">
            <div class="flex justify-between items-center">
                <h4 class="text-lg font-semibold mb-2">{{ $product->name }}</h4>
                <a href="{{ route("products.edit", $product->id) }}" class="text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white">Chỉnh sửa</a>
            </div>
        <p class="text-gray-600 mb-2">Giá: {{ $product->price }}</p>
        <p class="text-gray-600">Số lượng trong kho: {{ $product->quantity }}</p>
    </a>
</div>
