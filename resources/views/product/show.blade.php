<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Show Product') }}
        </h2>
        <a style="color: #fff; margin-bottom:4px;" class="mt-4" href="{{ route('products.index') }}">.. All Products</a>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="text-white p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <img src="{{ $product->image }}" style="width: 100px;height:100px;" alt="">
                    <h2>{{ $product->name }}</h2>

                    <br>
                    <h6>Price Offers</h6>
                    <table id="table" class="table text-white">
                        <thead>
                            <tr>
                                <th>By User</th>
                                <th>Price</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($product->offers as $offer)
                            <tr>
                                <td>{{ $offer->user->name }}</td>
                                <td>{{ $offer->price }}</td>
                            </tr>
                            @empty
                                <td colspan="5">No offers available</td>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
