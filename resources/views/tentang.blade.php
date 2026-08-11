<x-layout title="tetang" theme="tentang">
    <main class="max-w-4xl mx-auto px-4 py-16 flex-1 w-full">
        <div class="text-center mb-12 reveal">
            <h1 class="text-3xl font-extrabold text-slate-800">Tentang Kami</h1>
            <p class="text-slate-500 mt-2">Mengenal Zaydun lebih dekat</p>
        </div>

        <!-- PROFIL PEMILIK -->
        @if($owner)
        <div class="bg-white rounded-3xl border border-slate-200 p-8 md:p-12 mb-8 reveal">
            <div class="flex flex-col md:flex-row items-center md:items-start gap-8">
                <div class="shrink-0">
                    @if($owner->photo)
                        <img decoding="async" src="{{ asset('uploads/owner/'.$owner->photo) }}" alt="{{ $owner->name }}" class="w-32 h-32 md:w-40 md:h-40 object-cover rounded-3xl shadow-lg">
                    @else
                        <div class="w-32 h-32 md:w-40 md:h-40 bg-gradient-to-br from-cyan-500 to-emerald-500 rounded-3xl flex items-center justify-center text-5xl text-white font-black shadow-lg">
                            {{ substr($owner->name, 0, 1) }}
                        </div>
                    @endif
                </div>
                <div class="flex-1 text-center md:text-left space-y-4">
                    <div>
                        <h2 class="text-2xl font-black text-slate-800">Hai, saya {{ $owner->name }}</h2>
                        @if($owner->title)
                            <p class="text-cyan-600 font-bold text-sm mt-1">{{ $owner->title }}</p>
                        @endif
                    </div>
                    @if($owner->bio)
                        <div class="text-slate-600 leading-relaxed whitespace-pre-line">{{ $owner->bio }}</div>
                    @endif
                    <div class="pt-2">
                        <a href="https://wa.me/6281234567890?text=Halo%20{{ urlencode($owner->name) }},%20saya%20ingin%20bertanya%20seputar%20Zaydun" target="_blank" class="z-btn inline-flex items-center gap-2 bg-emerald-500 hover:bg-emerald-600 text-white font-bold text-sm px-6 py-3 rounded-xl transition shadow-sm">
                            <x-icon name="wa" class="w-4 h-4 inline-block -mt-0.5 align-middle" /> Chat dengan {{ $owner->name }}
                        </a>
                    </div>
                </div>
            </div>
        </div>
        @endif

        <!-- TENTANG ZAYDUN -->
        <div class="bg-white rounded-3xl border border-slate-200 p-8 md:p-12 space-y-6 reveal">
            <div class="flex items-center gap-4 mb-6">
                <div class="w-16 h-16 bg-gradient-to-br from-cyan-500 to-emerald-500 rounded-2xl flex items-center justify-center text-3xl text-white font-black">Z</div>
                <div>
                    <h2 class="text-xl font-extrabold text-slate-800">Zaydun</h2>
                    <p class="text-sm text-slate-500">Platform Inspirasi & Kebutuhan Para Penghobi</p>
                </div>
            </div>

            <div class="space-y-4 text-slate-600 leading-relaxed">
                <p>
                    Zaydun hadir sebagai platform edukasi dan marketplace yang berfokus pada dua bidang hobi utama: <strong class="text-cyan-600">Ikan Cupang</strong> dan <strong class="text-emerald-600">Tumbuhan</strong>.
                </p>
                <p>
                    Kami menyediakan artikel-artikel berkualitas seputar tips perawatan, panduan pemula, hingga rekomendasi produk terbaik yang dapat Anda beli langsung melalui WhatsApp.
                </p>
                <p>
                    Visi kami adalah menjadi sumber informasi terpercaya bagi para penghobi di Indonesia, membantu Anda menemukan inspirasi dan kebutuhan hobi dalam satu tempat.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 pt-6">
                <div class="bg-cyan-50 rounded-2xl p-5 border border-cyan-100">
                    <div class="mb-2"><x-icon name="fish" class="w-8 h-8 text-cyan-500" /></div>
                    <h3 class="font-bold text-slate-800 text-sm">Ikan Cupang</h3>
                    <p class="text-xs text-slate-500 mt-1">Tips perawatan, jenis-jenis, dan produk unggulan untuk ikan cupang Anda.</p>
                </div>
                <div class="bg-emerald-50 rounded-2xl p-5 border border-emerald-100">
                    <div class="mb-2"><x-icon name="sprout" class="w-8 h-8 text-emerald-500" /></div>
                    <h3 class="font-bold text-slate-800 text-sm">Tumbuhan</h3>
                    <p class="text-xs text-slate-500 mt-1">Panduan menanam, perawatan, dan produk untuk hobi berkebun Anda.</p>
                </div>
            </div>
        </div>
    </main>
</x-layout>