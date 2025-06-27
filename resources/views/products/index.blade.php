<x-app-layout>
        <x-slot name="header">
<div class="flex items-center justify-between">
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
        {{ __('📦 Daftar Produk') }}
    </h2>
</div>
    </x-slot>
    <div class="max-w-7xl mx-auto px-6 py-8">

        @if (session('success'))
            <div class="mb-4 p-4 bg-green-100 text-green-800 rounded-md shadow-sm">
                {{ session('success') }}
            </div>
        @endif

        <div class="flex justify-end mb-4">
            <a href="{{ route('products.create') }}"
               class="bg-green-500 hover:bg-green-600 text-white font-medium py-2 px-4 rounded-lg transition duration-200">
                + Tambah Produk
            </a>
        </div>

        <div class="bg-white dark:bg-[#1D1D1B] shadow-md rounded-lg p-6 mb-6">
    <h2 class="text-lg font-semibold text-gray-800 dark:text-gray-200 mb-4">Filter Produk</h2>

    <form method="GET" action="{{ route('products.index') }}" class="grid grid-cols-1 md:grid-cols-3 gap-4">
        <div>
            <label for="search" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Nama Produk</label>
            <input type="text" name="search" id="search" value="{{ request('search') }}"
                class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:ring focus:ring-blue-400 focus:outline-none dark:bg-[#2A2A28] dark:text-white"
                placeholder="Cari nama...">
        </div>

        <div>
            <label for="kategori" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Kategori</label>
            <select name="kategori" id="kategori"
                class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:ring focus:ring-blue-400 focus:outline-none dark:bg-[#2A2A28] dark:text-white">
                <option value="">Semua</option>
                @foreach ($categories as $category)
                    <option value="{{ $category }}" {{ request('kategori') == $category ? 'selected' : '' }}>
                        {{ $category }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="flex items-end space-x-2">
            <button type="submit"
                class="bg-blue-600 hover:bg-blue-700 text-white font-medium px-4 py-2 rounded-md transition duration-200">
                Filter
            </button>
            <a href="{{ route('products.index') }}"
        class="px-4 py-2 bg-gray-200 hover:bg-gray-300 text-gray-800 dark:bg-gray-700 dark:text-white dark:hover:bg-gray-600 rounded-md transition duration-200 font-medium">
        Reset
            </a>
        </div>
    </form>
</div>


        <div class="bg-white dark:bg-[#1D1D1B] shadow-md rounded-lg overflow-x-auto">
            <table class="min-w-full table-auto text-sm">
                <thead class="bg-gray-100 dark:bg-[#2C2C2C] text-gray-700 dark:text-gray-300">
                    <tr>
                        <th class="px-6 py-3 text-left">Nama</th>
                        <th class="px-6 py-3 text-left">Kategori</th>
                        <th class="px-6 py-3 text-left">Harga</th>
                        <th class="px-6 py-3 text-left">Stok</th>
                        <th class="px-6 py-3 text-left">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                    @forelse ($products as $product)
                        <tr class="hover:bg-gray-50 dark:hover:bg-[#292929]">
                            <td class="px-6 py-3 text-gray-800 dark:text-white">{{ $product->nama }}</td>
                            <td class="px-6 py-3 text-gray-700 dark:text-gray-300">{{ $product->kategori }}</td>
                            <td class="px-6 py-3 text-gray-800 dark:text-white">Rp {{ number_format($product->harga, 2, ',', '.') }}</td>
                            <td class="px-6 py-3 text-gray-800 dark:text-white">{{ $product->stok }}</td>
                            <td class="px-6 py-3">
                                <a href="{{ route('products.edit', $product) }}"
                                   class="text-blue-600 hover:underline dark:text-blue-400">Edit</a>

                               <form id="delete-form-{{ $product->id }}" action="{{ route('products.destroy', $product) }}" method="POST" class="inline">
    @csrf
    @method('DELETE')
    <button type="button"
            onclick="confirmDelete({{ $product->id }})"
            class="text-red-600 hover:underline ml-2 dark:text-red-400">
        Hapus
    </button>
</form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-6 py-3 text-center text-gray-500 dark:text-gray-400">
                                Tidak ada produk ditemukan.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-6">
            {{ $products->links() }}
        </div>
    </div>
</x-app-layout>

<script>
    function confirmDelete(productId) {
        Swal.fire({
            title: 'Yakin?',
            text: '',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#e3342f',
            cancelButtonColor: '#6c757d',
            confirmButtonText: 'Ya',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('delete-form-' + productId).submit();
            }
        });
    }
</script>
