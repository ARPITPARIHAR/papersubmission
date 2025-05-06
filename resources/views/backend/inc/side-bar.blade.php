<nav class="pcoded-navbar">
    <div class="pcoded-inner-navbar main-menu">
        <ul class="pcoded-item pcoded-left-item">
            @auth
            @if(auth()->user()->user_type === 'admin')
                <li class="{{ areActiveRoutes(['business-setting']) }}">
                    <a href="{{ route('business-setting') }}">
                        <span class="pcoded-micon"><i class="feather icon-menu"></i></span>
                        <span class="pcoded-mtext">{{ __('Business Settings') }}</span>
                    </a>
                </li>
            @endif
        @endauth

            @auth
    @if(in_array(auth()->user()->user_type, ['admin', 'staff']))
        <li class="{{ areActiveRoutes(['paper.index','paper.create','paper.edit']) }}">
            <a href="{{ route('paper.index') }}">
                <span class="pcoded-micon"><i class="feather icon-file"></i></span>
                <span class="pcoded-mtext">{{ __('Papers (Formators)') }}</span>
            </a>
        </li>
    @endif
@endauth

            @auth
            @if(auth()->user()->user_type === 'admin')
                <li class="{{ areActiveRoutes(['editor.index','editor.create','editor.edit']) }}">
                    <a href="{{ route('editor.index') }}">
                        <span class="pcoded-micon"><i class="feather icon-file"></i></span>
                        <span class="pcoded-mtext">{{ __('Add Editor') }}</span>
                    </a>
                </li>
            @endif
        @endauth

        @auth
        @if(in_array(auth()->user()->user_type, ['admin', 'author']))
            <li class="{{ areActiveRoutes(['submitpaper.index','submitpaper.create','submitpaper.edit']) }}">
                <a href="{{ route('submitpaper.index') }}">
                    <span class="pcoded-micon"><i class="feather icon-file"></i></span>
                    <span class="pcoded-mtext">{{ __('Submit Paper (Author)') }}</span>
                </a>
            </li>
        @endif
    @endauth

    @auth
    @if(in_array(auth()->user()->user_type, ['admin', 'c.a.']))
        <li class="{{ areActiveRoutes(['papersummary.index','papersummary.create','papersummary.edit']) }}">
            <a href="{{ route('papersummary.index') }}">
                <span class="pcoded-micon"><i class="feather icon-file"></i></span>
                <span class="pcoded-mtext">{{ __('Paper Summary (C.A.)') }}</span>
            </a>
        </li>
    @endif
@endauth






            <li class="{{ areActiveRoutes(['sliders.index','sliders.create','sliders.edit']) }}">
                <a href="{{ route('contact.index') }}">
                    <span class="pcoded-micon"><i class="feather icon-file"></i></span>
                    <span class="pcoded-mtext">{{ __('Contact') }}</span>
                </a>
            </li>






            {{-- <li class="{{ areActiveRoutes(['tenderservice.index','tenderservice.create','tenderservice.edit']) }}">
                <a href="{{ route('tenderservice.index') }}">
                    <span class="pcoded-micon"><i class="feather icon-file"></i></span>
                    <span class="pcoded-mtext">{{ __('Tender') }}</span>
                </a>
            </li>
            <li class="{{ areActiveRoutes(['trainingevent.index','trainingevent.create','trainingevent.edit']) }}">
                <a href="{{ route('trainingevent.index') }}">
                    <span class="pcoded-micon"><i class="feather icon-file"></i></span>
                    <span class="pcoded-mtext">{{ __('Tranining') }}</span>
                </a>
            </li>
            <li class="{{ areActiveRoutes(['study.index','study.create','study.edit']) }}">
                <a href="{{ route('study.index') }}">
                    <span class="pcoded-micon"><i class="feather icon-file"></i></span>
                    <span class="pcoded-mtext">{{ __('Study Matirials') }}</span>
                </a>
            </li>
            <li class="{{ areActiveRoutes(['relieve.index','relieve.create','relieve.edit']) }}">
                <a href="{{ route('relieve.index') }}">
                    <span class="pcoded-micon"><i class="feather icon-file"></i></span>
                    <span class="pcoded-mtext">{{ __('Reliving Orders') }}</span>
                </a>
            </li>
            <li class="{{ areActiveRoutes(['training.index','training.create','training.edit']) }}">
                <a href="{{ route('training.index') }}">
                    <span class="pcoded-micon"><i class="feather icon-file"></i></span>
                    <span class="pcoded-mtext">{{ __('Training & Events Held') }}</span>
                </a>
            </li>

            <li class="{{ areActiveRoutes(['upcoming.index','upcoming.create','upcoming.edit']) }}">
                <a href="{{ route('upcoming.index') }}">
                    <span class="pcoded-micon"><i class="feather icon-file"></i></span>
                    <span class="pcoded-mtext">{{ __(' Upcoming Training Programmers') }}</span>
                </a>
            </li>
 --}}
{{--

                </ul>
            </li>
        </ul>
    </div>
</nav>
