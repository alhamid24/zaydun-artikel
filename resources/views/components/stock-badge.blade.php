@props(['product'])

@if($product->stock <= 0)
    <span class="absolute top-3 right-3 z-10 bg-red-500 text-white text-[10px] font-black uppercase tracking-wider px-2.5 py-1 rounded-full shadow">Habis</span>
@elseif($product->stock <= 5)
    <span class="absolute top-3 right-3 z-10 bg-amber-400 text-white text-[10px] font-black uppercase tracking-wider px-2.5 py-1 rounded-full shadow">Sisa {{ $product->stock }}</span>
@endif
