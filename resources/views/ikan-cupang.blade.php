<x-layout title="ikan-cupang" theme="ikan">
    <!-- HERO SECTION -->
    <header class="relative bg-blue-900 bg-center bg-cover pb-12 pt-20" style="background-image: url('https://images.unsplash.com/photo-1524704654690-b56c05c78a00?q=80&w=1920&auto=format&fit=crop');">
        <!-- Overlay Gelap -->
        <div class="absolute inset-0 bg-blue-900/40"></div>
        
        <div class="relative z-10 text-center px-4">
            <h1 class="text-6xl md:text-8xl font-black text-white italic drop-shadow-xl tracking-wide uppercase leading-tight mb-2">
                Fish<br>Aquariums
            </h1>
            <p class="text-2xl md:text-4xl text-white font-cursive drop-shadow-md mt-4">
                We design custom aquariums to fit your specific needs
            </p>

            <!-- NAVIGATION -->
            <nav class="mt-16 border-t border-b border-white/30 inline-block py-3">
                <ul class="flex flex-wrap justify-center items-center gap-x-4 md:gap-x-8 text-white font-bold uppercase text-xs md:text-sm tracking-widest">
                    <li class="relative">
                        <a href="#" class="hover:text-blue-200 transition-colors">Home</a>
                        <!-- Indikator Segitiga Aktif -->
                        <div class="absolute left-1/2 -bottom-4 transform -translate-x-1/2 w-0 h-0 border-l-[8px] border-l-transparent border-r-[8px] border-r-transparent border-b-[8px] border-b-white"></div>
                    </li>
                    <li class="text-white/50">|</li>
                    <li><a href="#" class="hover:text-blue-200 transition-colors">About</a></li>
                    <li class="text-white/50">|</li>
                    <li><a href="#" class="hover:text-blue-200 transition-colors">Services</a></li>
                    <li class="text-white/50">|</li>
                    <li><a href="#" class="hover:text-blue-200 transition-colors">Blog</a></li>
                    <li class="text-white/50">|</li>
                    <li><a href="#" class="hover:text-blue-200 transition-colors">Contacts</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <!-- MAIN CONTENT -->
    <main class="max-w-6xl mx-auto px-6 py-12 bg-white shadow-xl -mt-2 relative z-20">
        
        <!-- SECTION 1: 4 COLUMN CARDS -->
        <section class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            <!-- Card 1 -->
            <article>
                <h3 class="text-xl font-bold font-serif-italic mb-3 text-gray-900">Beginner Tips</h3>
                <img src="https://images.unsplash.com/photo-1522069169874-c58ec4b76be1?q=80&w=400&auto=format&fit=crop" alt="Fish" class="w-full h-48 object-cover">
                <div class="bg-[#5C9CD9] text-white p-5 text-sm leading-relaxed">
                    <p class="mb-4">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes.</p>
                    <a href="#" class="font-bold uppercase tracking-wider text-xs hover:underline">More</a>
                </div>
            </article>

            <!-- Card 2 -->
            <article>
                <h3 class="text-xl font-bold font-serif-italic mb-3 text-gray-900">Reef Aquarium</h3>
                <img src="https://images.unsplash.com/photo-1582967788606-a171c1080cb0?q=80&w=400&auto=format&fit=crop" alt="Fish" class="w-full h-48 object-cover">
                <div class="bg-[#5C9CD9] text-white p-5 text-sm leading-relaxed">
                    <p class="mb-4">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes.</p>
                    <a href="#" class="font-bold uppercase tracking-wider text-xs hover:underline">More</a>
                </div>
            </article>

            <!-- Card 3 -->
            <article>
                <h3 class="text-xl font-bold font-serif-italic mb-3 text-gray-900">Publications</h3>
                <img src="https://images.unsplash.com/photo-1534043464124-3be32fe000c9?q=80&w=400&auto=format&fit=crop" alt="Fish" class="w-full h-48 object-cover">
                <div class="bg-[#5C9CD9] text-white p-5 text-sm leading-relaxed">
                    <p class="mb-4">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes.</p>
                    <a href="#" class="font-bold uppercase tracking-wider text-xs hover:underline">More</a>
                </div>
            </article>

            <!-- Card 4 -->
            <article>
                <h3 class="text-xl font-bold font-serif-italic mb-3 text-gray-900">Useful Links</h3>
                <img src="https://images.unsplash.com/photo-1544551763-46a013bb70d5?q=80&w=400&auto=format&fit=crop" alt="Coral" class="w-full h-48 object-cover">
                <div class="bg-[#5C9CD9] text-white p-5 text-sm leading-relaxed">
                    <p class="mb-4">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes.</p>
                    <a href="#" class="font-bold uppercase tracking-wider text-xs hover:underline">More</a>
                </div>
            </article>
        </section>

        <hr class="my-12 border-gray-200">

        <!-- SECTION 2: 3 COLUMN CONTENT -->
        <section class="grid grid-cols-1 lg:grid-cols-4 gap-10">
            
            <!-- Col 1: Fish Tanks -->
            <div class="lg:col-span-1">
                <h3 class="text-2xl font-bold font-serif-italic mb-4 text-gray-900">Fish Tanks</h3>
                <div class="space-y-4 text-xs text-gray-500 leading-relaxed">
                    <p>LOREM IPSUM DOLOR SIT AMET,<br>consectetuer adipiscing elit. Aenean commodo ligula eget dolor.</p>
                    <p>LOREM IPSUM DOLOR SIT AMET,<br>consectetuer adipiscing elit. Aenean commodo ligula eget dolor.</p>
                    <p>LOREM IPSUM DOLOR SIT AMET,<br>consectetuer adipiscing elit. Aenean commodo ligula eget dolor.</p>
                    <p>LOREM IPSUM DOLOR SIT AMET,<br>consectetuer adipiscing elit. Aenean commodo ligula eget dolor.</p>
                </div>
                <a href="#" class="inline-block mt-6 font-bold text-[#5C9CD9] uppercase tracking-wider text-xs hover:underline">More</a>
            </div>

            <!-- Col 2: Fish Info (Takes up 2 columns space) -->
            <div class="lg:col-span-2">
                <h3 class="text-2xl font-bold font-serif-italic mb-4 text-gray-900">Fish Info</h3>
                <p class="text-xs text-gray-500 uppercase tracking-widest font-bold mb-4">Praesent justo dolor, lobortis quis, lobortis dignissim, pulvinar ac, lorem.</p>
                
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mb-4">
                    <div>
                        <img src="https://images.unsplash.com/photo-1629813589945-816912389146?q=80&w=400&auto=format&fit=crop" class="w-full h-32 object-cover mb-2" alt="Tank">
                        <p class="text-xs text-gray-500 uppercase font-bold">Dolor, lobortis quis sed.</p>
                        <p class="text-xs text-gray-400">Lorem ipsum dolor sit amet, consec.</p>
                    </div>
                    <div>
                        <img src="https://images.unsplash.com/photo-1524704654690-b56c05c78a00?q=80&w=400&auto=format&fit=crop" class="w-full h-32 object-cover mb-2" alt="Discus Fish">
                        <p class="text-xs text-gray-500 uppercase font-bold">Praesent justo dolor, lobortis.</p>
                        <p class="text-xs text-gray-400">Lorem ipsum dolor sit amet, consec.</p>
                    </div>
                </div>
                <p class="text-xs text-gray-500 leading-relaxed mb-4">Donec in erat. Praesent id leo. Morbi pede ipsum, malesuada eu, blandit sit amet, mattis vel, mauris. Praesent vulputate molestie urna. Aenean nonummy hendrerit mauris. Phasellus porta. Fusce suscipit varius mi.</p>
                <a href="#" class="inline-block font-bold text-[#5C9CD9] uppercase tracking-wider text-xs hover:underline">More</a>
            </div>

            <!-- Col 3: Latest News -->
            <div class="lg:col-span-1">
                <h3 class="text-2xl font-bold font-serif-italic mb-4 text-gray-900">Latest news</h3>
                <div class="space-y-6">
                    <div>
                        <p class="text-xs font-bold text-gray-500 mb-1">02.03.2013</p>
                        <p class="text-xs text-gray-500 leading-relaxed mb-2">Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis.</p>
                        <a href="#" class="font-bold text-[#5C9CD9] uppercase tracking-wider text-xs hover:underline">More</a>
                    </div>
                    <div>
                        <p class="text-xs font-bold text-gray-500 mb-1">02.03.2013</p>
                        <p class="text-xs text-gray-500 leading-relaxed mb-2">Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis.</p>
                        <a href="#" class="font-bold text-[#5C9CD9] uppercase tracking-wider text-xs hover:underline">More</a>
                    </div>
                    <div>
                        <p class="text-xs font-bold text-gray-500 mb-1">02.03.2013</p>
                        <p class="text-xs text-gray-500 leading-relaxed mb-2">Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis.</p>
                        <a href="#" class="font-bold text-[#5C9CD9] uppercase tracking-wider text-xs hover:underline">More</a>
                    </div>
                </div>
            </div>

        </section>
    </main>

    <!-- FOOTER -->
    <footer class="bg-[#4579B2] py-8 mt-12 text-center text-white/80 text-xs">
        <div class="flex justify-center space-x-3 mb-4">
            <!-- Icon Placeholder -->
            <a href="#" class="w-8 h-8 rounded-full bg-white/20 flex items-center justify-center hover:bg-white/40 transition">f</a>
            <a href="#" class="w-8 h-8 rounded-full bg-white/20 flex items-center justify-center hover:bg-white/40 transition">t</a>
        </div>
        <p>2013 © Privacy Policy</p>
    </footer>
</x-layout>