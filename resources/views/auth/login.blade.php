@extends("layout.layout")
@section("content")
    <div class="flex flex-col items-center w-[300px] mx-auto">
        <h3 class="mb-5 text-3xl font-bold underline text-center">
            Đăng nhập
        </h3>
        <form action="{{ route('login.authenticate') }}" method="POST" class="w-full">
            @csrf
            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" name="email" id="email" class="py-2 px-3 mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                @error("email")
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-4">
                <label for="password" class="block text-sm font-medium text-gray-700">Mật khẩu</label>
                <input type="password" name="password" id="password" class="py-2 px-3 mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                @error("password")
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>
            <button type="submit" class="w-full bg-blue-500 text-white py-2 rounded-md hover:bg-blue-600">Đăng nhập</button>
            <div>
                <p class="mt-4 text-sm text-center">Chưa có tài khoản? <a href="{{ route('register') }}" class="text-blue-500 hover:underline">Đăng ký</a></p>
            </div>
        </form>
    </div>
@endsection
