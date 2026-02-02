<section class="py-24 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-end mb-16">
            <div>
                <span class="text-black font-bold tracking-widest uppercase text-xs mb-2 block">Market Journal</span>
                <h2 class="text-4xl md:text-5xl font-serif font-bold text-gray-900">Latest Insights</h2>
            </div>
            <a href="{{ route('blogs.index') }}" class="text-gray-900 font-bold uppercase text-xs tracking-widest border-b-2 border-black pb-2 hover:text-gray-600 hover:border-gray-600 transition">Read All News</a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-12">
            @foreach($blogs as $blog)
            <div class="group flex flex-col md:flex-row gap-8 items-center">
                <div class="w-full md:w-1/2 h-64 overflow-hidden">
                    <img src="{{ $blog->image }}" alt="{{ $blog->title }}" class="w-full h-full object-cover group-hover:scale-110 transition duration-700 grayscale group-hover:grayscale-0">
                </div>
                <div class="w-full md:w-1/2">
                    <span class="text-black font-bold text-[10px] uppercase tracking-widest mb-3 block">{{ $blog->category }}</span>
                    <h3 class="text-2xl font-serif font-bold text-gray-900 mb-4 group-hover:text-gray-600 transition leading-tight">
                        <a href="{{ route('blogs.show', $blog->slug) }}">{{ $blog->title }}</a>
                    </h3>
                    <p class="text-gray-400 text-xs font-bold uppercase tracking-widest mb-6">{{ $blog->created_at->format('F d, Y') }}</p>
                    <a href="{{ route('blogs.show', $blog->slug) }}" class="text-gray-900 font-bold uppercase text-[10px] tracking-widest hover:text-gray-600 transition">Read More →</a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>