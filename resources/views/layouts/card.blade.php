<div class="wrapper antialiased text-gray-900 w-2/3">
    <div class="bg-white shadow-lg rounded-lg overflow-hidden m-3">
        @if (!is_null($posts) && count($posts) > 0)
            <div class="relative z-10 flex flex-row items-center p-2 ">
                <div class="w-8 h-8 rounded-full overflow-hidden border-2 border-gray-800 shadow-lg">
                    <img src="{{ asset($friendDetail->photo) }}" alt="Friend's Profile Photo"
                        class="object-cover w-full h-full">
                </div>
                <div>
                    <div>
                        <p class="antialiased font-semibold px-2">
                            {{ $friendDetail->name }}
                        </p>
                    </div>
                    <div>
                        <p class="antialiased font-light px-2">
                            {{ $friendDetail->email }}
                        </p>
                    </div>
                </div>
            </div>
            <div class="flex lg:flex-row md:flex-col sm: flex-col items-center bg-left bg-cover lg:h-80 md:min-h-80 "
                style="background-image: url({{ asset($post->file) }})">
                <div class="backdrop-blur-2xl">
                    <div class="ansolute z-0 lg:h-80">
                        <img src="{{ asset($post->file) }}" class="h-full w-full object-cover object-center">
                    </div>
                </div>


                <div class="h-full backdrop-blur-2xl flex flex-col justify-center">
                    <div>
                        <div>
                            <h4 class="px-2 text-xl font-semibold leading-tight truncate">
                                {{ $post->title }}
                            </h4>
                        </div>
                        <div class="overflow-hidden p-2">
                            <p class="text-slate-900 ">{{ $post->content }} its only showing show more but the line is
                                only
                                one in the content in this case the button should be hidden</p>
                        </div>
                        <div class="flex flex-row items-center px-2 pt-2 ">
                            <div class="pr-4">
                                <button class="like-button focus:outline-none" onclick="toggleLike(this)">
                                    <svg width="30px" height="30px" viewBox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path class="like-icon" fill-rule="evenodd" clip-rule="evenodd"
                                            d="M12 6.00019C10.2006 3.90317 7.19377 3.2551 4.93923 5.17534C2.68468 7.09558 2.36727 10.3061 4.13778 12.5772C5.60984 14.4654 10.0648 18.4479 11.5249 19.7369C11.6882 19.8811 11.7699 19.9532 11.8652 19.9815C11.9483 20.0062 12.0393 20.0062 12.1225 19.9815C12.2178 19.9532 12.2994 19.8811 12.4628 19.7369C13.9229 18.4479 18.3778 14.4654 19.8499 12.5772C21.6204 10.3061 21.3417 7.07538 19.0484 5.17534C16.7551 3.2753 13.7994 3.90317 12 6.00019Z"
                                            stroke="#000000" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                    </svg>
                                </button>
                            </div>
                            <div>
                                <button class="custom-button focus:outline-none" onclick="toggleCustom(this)">
                                    <svg width="30px" height="30px" viewBox="0 -0.5 25 25" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M5.5 12.9543C5.51239 14.0398 5.95555 15.076 6.73197 15.8348C7.50838 16.5936 8.55445 17.0128 9.64 17.0003H11.646C12.1915 17.0007 12.7131 17.224 13.09 17.6183L14.159 18.7363C14.3281 18.9076 14.5588 19.004 14.7995 19.004C15.0402 19.004 15.2709 18.9076 15.44 18.7363L17.1 17.0003L17.645 16.3923C17.7454 16.2833 17.8548 16.1829 17.972 16.0923C18.9349 15.3354 19.4979 14.179 19.5 12.9543V8.04428C19.4731 5.7845 17.6198 3.97417 15.36 4.00028H9.64C7.38021 3.97417 5.5269 5.7845 5.5 8.04428V12.9543Z"
                                            stroke="#000000" stroke-width="1.5" stroke-linecap="round"
                                            stroke-linejoin="round" fill="none" />
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M7.5 10.5002C7.5 9.94796 7.94772 9.50024 8.5 9.50024C9.05228 9.50024 9.5 9.94796 9.5 10.5002C9.5 11.0525 9.05228 11.5002 8.5 11.5002C8.23478 11.5002 7.98043 11.3949 7.79289 11.2074C7.60536 11.0198 7.5 10.7655 7.5 10.5002Z"
                                            stroke="#000000" stroke-linecap="round" stroke-linejoin="round" />
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M11.5 10.5002C11.5 9.94796 11.9477 9.50024 12.5 9.50024C13.0523 9.50024 13.5 9.94796 13.5 10.5002C13.5 11.0525 13.0523 11.5002 12.5 11.5002C11.9477 11.5002 11.5 11.0525 11.5 10.5002Z"
                                            stroke="#000000" stroke-linecap="round" stroke-linejoin="round" />
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M15.5 10.5002C15.5 9.94796 15.9477 9.50024 16.5 9.50024C17.0523 9.50024 17.5 9.94796 17.5 10.5002C17.5 11.0525 17.0523 11.5002 16.5 11.5002C15.9477 11.5002 15.5 11.0525 15.5 10.5002Z"
                                            stroke="#000000" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        @else
            <div class="p-6">
                <p class="text-center text-gray-600">No posts</p>
            </div>
        @endif
    </div>
</div>

<script>
    function toggleLike(button) {
        button.classList.toggle('active');
    }

    function toggleCustom(button) {
        const paths = button.querySelectorAll('path');
        paths.forEach(path => {
            if (path.getAttribute('fill') === 'none') {
                path.setAttribute('fill', 'black');
            } else {
                path.setAttribute('fill', 'none');
            }
        });
    }
</script>
