<section id="slide" class="slider-section @if(config('theme_layout') == 3) pt150 @endif">
    <div id="slider-item" class="slider-item-details default-owl-theme">
        @foreach($slides as $slide)
            <div class="slider-area slider-bg-5 relative-position" style="background: none;">
                <div class="bg-image @if($slide->overlay == 1) overlay  @endif"
                     style="background-image: url({{asset('storage/uploads/'.$slide->bg_image)}})"></div>
                @php $ar_content = json_decode($slide->ar_content) @endphp
                <div class="slider-text">
                    @if(isset($ar_content->widget))
                        @if($ar_content->widget->type == 2)
                           
                            <div class="layer-1-3">
                                <span class="timer-data d-none" data-timer="{{$ar_content->widget->timer}}"></span>
                                <div class="coming-countdown ul-li">
                                    <ul>
                                        <li class="days">
                                            <span class="number"></span>
                                            <span class>@lang('labels.frontend.layouts.partials.days')</span>
                                        </li>

                                        <li class="hours">
                                            <span class="number"></span>
                                            <span class>@lang('labels.frontend.layouts.partials.hours')</span>
                                        </li>

                                        <li class="minutes">
                                            <span class="number"></span>
                                            <span class>@lang('labels.frontend.layouts.partials.minutes')</span>
                                        </li>

                                        <li class="seconds">
                                            <span class="number"></span>
                                            <span class>@lang('labels.frontend.layouts.partials.seconds')</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        @endif
                    @endif

                    <div class="section-title headline  ">
                        @if($ar_content->hero_text_ar)
                            <div class="layer-1-3">
                                <h2><span>{{ $ar_content->hero_text_ar }}</span></h2>
                            </div>
                        @endif
                        @if($ar_content->sub_text_ar)
                            <div class="layer-1-1 pt-5  font-weight-bold">
                                <span class="subtitle text-uppercase">{{$ar_content->sub_text_ar}}</span>
                            </div>
                        @endif

                    </div>
                    @if(isset($ar_content->widget))
                        <div class="layer-1-3">
                            @if($ar_content->widget->type == 1)
                                <div class="search-course mb30 relative-position">
                                    <form action="{{route('search')}}" method="get">
                                        <input class="course" name="q" type="text"
                                               placeholder="@lang('labels.frontend.layouts.partials.search_placeholder')">
                                        <div class="nws-button text-center  gradient-bg text-capitalize">
                                            <button type="submit"
                                                    value="Submit">@lang('labels.frontend.layouts.partials.search_courses')</button>
                                        </div>
                                    </form>
                                </div>
                            @endif


                        </div>
                    @endif
                    @if(isset($ar_content->buttons))
                        <div class="layer-1-4">
                            <div class="about-btn ">
                                @foreach($ar_content->buttons as $button)
                                    <div class="genius-btn  text-uppercase ul-li-block bold-font">
                                        <a href="{{$button->link}}">{{$button->label}}
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif


                </div>
            </div>
        @endforeach
    </div>
</section>


@push('after-scripts')
    <script>
        if ($('.coming-countdown').length > 0) {
            var date = $('.coming-countdown').siblings('.timer-data').data('timer')
            // Specify the deadline date
            var deadlineDate = new Date(date).getTime();
            // var deadlineDate = new Date('2019/02/09 22:00').getTime();

            // Cache all countdown boxes into consts
            var countdownDays = document.querySelector('.days .number');
            var countdownHours = document.querySelector('.hours .number');
            var countdownMinutes = document.querySelector('.minutes .number');
            var countdownSeconds = document.querySelector('.seconds .number');

            // Update the count down every 1 second (1000 milliseconds)
            setInterval(function () {
                // Get current date and time
                var currentDate = new Date().getTime();

                // Calculate the distance between current date and time and the deadline date and time
                var distance = deadlineDate - currentDate;

                // Time calculations for days, hours, minutes and seconds
                var days = Math.floor(distance / (1000 * 60 * 60 * 24));
                var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                var seconds = Math.floor((distance % (1000 * 60)) / 1000);

                // Insert the result data into individual countdown boxes
                countdownDays.innerHTML = days;
                countdownHours.innerHTML = hours;
                countdownMinutes.innerHTML = minutes;
                countdownSeconds.innerHTML = seconds;

                if (distance < 0) {
                    $('.coming-countdown').empty();
                }
            }, 1000);

        }
        @if(count($slides) == 1)
        $('#slider-item').owlCarousel({
            margin: 0,
            responsiveClass: true,
            nav: true,
            loop: false,
            dots: true,
            autoplay: false,
            navText: ["<i class='fas fa-chevron-left'></i>", "<i class='fas fa-chevron-right'></i>"],
            smartSpeed: 1000,
            responsive: {
                0: {
                    items: 1,
                },
                400: {
                    items: 1,
                },
                600: {
                    items: 1,
                },
                700: {
                    items: 1,
                },
                800: {
                    items: 1,
                },
                1000: {
                    items: 1,

                }
            },
        });
        $('#slider-item .owl-nav').hide();
        setTimeout(() => {
            $('#slider-item .owl-dots').hide();
        }, 300);



        @endif

    </script>
@endpush