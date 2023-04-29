@if (session()->has('message'))
    <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 3000)" x-show="show"
        class="absolute top-24 left-1/2 -translate-x-1/2  p-2 text-center bg-green-500 text-white w-[600px] mx-auto">
        <p>{{ session('message') }}</p>
    </div>
@endif
