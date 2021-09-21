<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Hi, {{ Auth::user()->name }} 
        </h2>
    </x-slot>

    <div class="py-12">
        <div>
            <h3>This is Admin page</h3>
        </div>
    </div>
</x-app-layout>
