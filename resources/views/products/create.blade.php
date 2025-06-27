<x-app-layout>
    <div class="max-w-2xl mx-auto bg-white dark:bg-[#1D1D1B] p-8 rounded-xl shadow-md mt-6">
        <h1 class="text-2xl font-bold text-gray-800 dark:text-white mb-6">
            {{ isset($product) ? 'Edit Produk' : 'Tambah Produk' }}
        </h1>

        <form action="{{ isset($product) ? route('products.update', $product) : route('products.store') }}" method="POST" class="space-y-6">
            @csrf
            @if(isset($product)) @method('PUT') @endif

            <div>
                <label for="nama" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Nama</label>
                <input type="text" id="nama" name="nama"
                       value="{{ old('nama', $product->nama ?? '') }}"
                       required
                       class="w-full px-4 py-2 rounded-lg border border-gray-300 dark:border-[#3E3E3A] bg-white dark:bg-[#1D1D1B] text-gray-800 dark:text-white shadow-sm focus:ring-2 focus:ring-blue-500 focus:outline-none" />
            </div>

            <div>
                <label for="kategori" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Kategori</label>
                <select name="kategori" id="kategori"
                        class="w-full px-4 py-2 rounded-lg border border-gray-300 dark:border-[#3E3E3A] bg-white dark:bg-[#1D1D1B] text-gray-800 dark:text-white shadow-sm focus:ring-2 focus:ring-blue-500 focus:outline-none">
                    @foreach ($categories as $category)
                        <option value="{{ $category }}" {{ (old('kategori', $product->kategori ?? '') == $category) ? 'selected' : '' }}>
                            {{ $category }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div>
                <label for="harga" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Harga</label>
                <input type="number" id="harga" name="harga"
                       value="{{ old('harga', $product->harga ?? '') }}"
                       class="w-full px-4 py-2 rounded-lg border border-gray-300 dark:border-[#3E3E3A] bg-white dark:bg-[#1D1D1B] text-gray-800 dark:text-white shadow-sm focus:ring-2 focus:ring-blue-500 focus:outline-none" />
            </div>

            <div>
                <label for="stok" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Stok</label>
                <input type="number" id="stok" name="stok"
                       value="{{ old('stok', $product->stok ?? '') }}"
                       class="w-full px-4 py-2 rounded-lg border border-gray-300 dark:border-[#3E3E3A] bg-white dark:bg-[#1D1D1B] text-gray-800 dark:text-white shadow-sm focus:ring-2 focus:ring-blue-500 focus:outline-none" />
            </div>

            <div class="flex justify-end space-x-4">
    <a href="{{ url()->previous() }}"
       class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-semibold px-5 py-2 rounded-lg transition-all duration-200">
        Batal
    </a>
                <button type="submit"
                        class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-6 py-2 rounded-lg transition duration-200">
                    {{ isset($product) ? 'Update Produk' : 'Tambah Produk' }}
                </button>
            </div>
        </form>
    </div>
</x-app-layout>
