<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('My Products') }}
        </h2>
        <a style="color: #fff; margin-bottom:4px;" class="mt-4" href="{{ route('products.create') }}">+ New Product</a>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div>
                    <table id="table" class="table text-white">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Last Offer Price</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($products as $product)
                            <tr>
                                <td>{{ $product->id }}</td>
                                <td><img src="{{ $product->image }}" style="width:100px; height:100px;" alt=""></td>
                                <td>{{ $product->name }}</td>
                                <td>
                                    {{ $product->offers->first() ? $product->offers->first()->price . ' By ' . $product->offers->first()->user->name : '-' }}
                                    <br>
                                    <a href="{{ route('products.show', $product->id) }}" style="color: #50a1ff">
                                        Show All Offers
                                    </a>
                                </td>
                                <td><a href="{{ route('products.show', $product->id) }}" style="color: #50a1ff">Show</a></td>
                            </tr>
                            @empty
                                <td colspan="5">No products available</td>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
