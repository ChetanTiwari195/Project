<div class="wrapper antialiased text-gray-900">
    <div>
        @if (!is_null($posts) && count($posts) > 0)
            @foreach ($posts as $post)
                <div class="relative px-6 -mt-16">
                    <img src="{{ asset($post->file) }}" alt="post image"
                        class="w-full object-cover object-center rounded-lg shadow-md">
                    <div class="bg-white p-6 rounded-lg shadow-lg">
                        <!-- Like and Comment buttons -->
                        <div class="flex justify-between items-center mb-4">
                            <div>
                                <button class="text-gray-600 hover:text-teal-600 focus:outline-none">
                                    <svg class="w-6 h-6 fill-current" viewBox="0 0 24 24">
                                        <!-- Like icon -->
                                    </svg>
                                </button>
                                <span class="ml-2 text-sm text-gray-600">100 Likes</span>
                            </div>
                            <div>
                                <button class="text-gray-600 hover:text-teal-600 focus:outline-none">
                                    <svg class="w-6 h-6 fill-current" viewBox="0 0 24 24">
                                        <!-- Comment icon -->
                                    </svg>
                                </button>
                                <span class="ml-2 text-sm text-gray-600">50 Comments</span>
                            </div>
                        </div>

                        <!-- Title of the post -->
                        <h4 class="mt-1 mb-2 text-xl font-semibold leading-tight truncate">
                            {{ $post->title }}
                        </h4>

                        <!-- Content of the post -->
                        <div class="content overflow-hidden" style="max-height: calc(1.2em * 2); line-height: 1.2em;">
                            <p class="text-gray-700">{{ $post->content }}</p>
                            <!-- Add more content here -->
                        </div>
                        <button class="selector text-teal-600 mt-2 focus:outline-none" onclick="toggleContent()">Show
                            more</button>
                    </div>
                </div>
            @endforeach
        @else
            <div class="relative px-6 -mt-16">
                <div class="bg-white p-6 rounded-lg shadow-lg">
                    <p class="text-center text-gray-600">No posts</p>
                </div>
            </div>
        @endif

        <script>
            function toggleContent() {
                const content = document.querySelector('.content');
                const button = document.querySelector('.selector');

                if (content.classList.contains('expanded')) {
                    content.style.maxHeight = 'calc(1.5em * 3)';
                    button.textContent = 'Show more';
                } else {
                    content.style.maxHeight = 'none';
                    button.textContent = 'Show less';
                }

                content.classList.toggle('expanded');
            }
        </script>
    </div>
</div>
