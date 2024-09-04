<div class="max-w-sm rounded overflow-hidden shadow-lg bg-white">
    <div class="px-6 py-4 bg-gradient-to-r from-{{ $color }}-400 to-{{ $color }}-500">
        <div class="font-bold text-white text-xl mb-2">{{ $title }}</div>
        <p class="text-white text-base">{{ $slot }}</p>
    </div>
    <div class="px-6 pt-4 text-right pb-2 bg-gray-100">
        <a href="{{ $link }}">
            <button class="hover:bg-{{ $color }}-500 bg-{{ $color }}-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">{{ $linkText }}</button>
        </a>
        <a href="{{ $addLink }}">
            <span class="hover:bg-yellow-500 bg-yellow-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">{{ $addLinkText }}</span>
        </a>
    </div>
</div>
