<x-app-layout>
    <div class="max-w-xl mx-auto bg-white dark:bg-[#1D1D1B] shadow-md rounded-xl p-6 mt-6 text-black dark:text-white">
        <h2 class="text-2xl font-bold mb-4">
            {{ isset($product) ? 'Edit Produk' : 'Tambah Produk' }}
        </h2>

        <form action="{{ isset($product) ? route('products.update', $product) : route('products.store') }}" method="POST" class="space-y-5">
            @csrf
            @if(isset($product)) @method('PUT') @endif

            <div>
                <label class="block mb-1 font-medium" for="nama">Nama</label>
                <input
                    type="text"
                    id="nama"
                    name="nama"
                    value="{{ old('nama', $product->nama ?? '') }}"
                    required
                    class="w-full px-4 py-2 border border-gray-300 dark:border-[#444] rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-[#2a2a2a]"
                >
            </div>

            <div>
                <label class="block mb-1 font-medium" for="kategori">Kategori</label>
                <select
                    id="kategori"
                    name="kategori"
                    class="w-full px-4 py-2 border border-gray-300 dark:border-[#444] rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-[#2a2a2a]"
                >
                    @foreach ($categories as $category)
                        <option value="{{ $category }}" {{ old('kategori', $product->kategori ?? '') == $category ? 'selected' : '' }}>
                            {{ $category }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div>
                <label class="block mb-1 font-medium" for="harga">Harga</label>
                <input
                    type="number"
                    id="harga"
                    name="harga"
                    value="{{ old('harga', $product->harga ?? '') }}"
                    class="w-full px-4 py-2 border border-gray-300 dark:border-[#444] rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-[#2a2a2a]"
                >
            </div>

            <div>
                <label class="block mb-1 font-medium" for="stok">Stok</label>
                <input
                    type="number"
                    id="stok"
                    name="stok"
                    value="{{ old('stok', $product->stok ?? '') }}"
                    class="w-full px-4 py-2 border border-gray-300 dark:border-[#444] rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-[#2a2a2a]"
                >
            </div>

            <div class="flex justify-end space-x-4">
    <a href="{{ url()->previous() }}"
       class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-semibold px-5 py-2 rounded-lg transition-all duration-200">
        Batal
    </a>

                <button
                    type="submit"
                    class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-5 py-2 rounded-lg transition-all duration-200"
                >
                    {{ isset($product) ? 'Update' : 'Tambah' }}
                </button>
            </div>
        </form>
    </div>
</x-app-layout>
