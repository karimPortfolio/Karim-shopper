

<div class="ml-auto flex justify-end items-center notification_bill">

    <div>

        <span class="flex justify-center items-center notification_icon">
            @php
                $notifications_num = Auth::user()->unreadNotifications->count()
            @endphp
            @if ($notifications_num > 0)
                <span class="position-absolute translate-middle badge rounded-pill bg-danger">
                    @if ($notifications_num <= 99)
                        {{ $notifications_num }}
                    @else
                        +99
                    @endif
                    <span class="visually-hidden">unread messages</span>
                </span>
            @endif
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-bell-fill" viewBox="0 0 16 16">
                <path d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2zm.995-14.901a1 1 0 1 0-1.99 0A5.002 5.002 0 0 0 3 6c0 1.098-.5 6-2 7h14c-1.5-1-2-5.902-2-7 0-2.42-1.72-4.44-4.005-4.901z" />
            </svg>
        </span>
    </div>
    <div class="drop_downed closed flex justify-end w-100 position-absolute top-[60px]">
        <div class="arrow_top_icon flex justify-end">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-caret-up-fill text-white" viewBox="0 0 16 16">
                <path d="m7.247 4.86-4.796 5.481c-.566.647-.106 1.659.753 1.659h9.592a1 1 0 0 0 .753-1.659l-4.796-5.48a1 1 0 0 0-1.506 0z"/>
            </svg>
        </div>
        <div class=" py-4 rounded-lg w-[420px] min-h-[130px] max-h-[560px] bg-white shadow-lg shadow-zinc-900 drop-shadow-lg" >
            <h2 class="text-3xl ml-3">Notifications @if ($notifications_num > 0) ({{ $notifications_num }}) @endif</h2>
            <ul class="pt-4 mt-2 mb-2 all_notifications max-h-[470px] overflow-y-scroll overflow-x-hidden">
                @if (count($notifications) > 0)
                    @foreach ($notifications as $notification)
                        <li @if ($notification->read_at === null) class="px-3 border-b-2 unreaded" @else class="border-b-3 mb-1 px-3 readed" @endif>
                            {{-- {{ $notification }} --}}
                            <a href="{{ route("showNotification", $notification->id) }}" class="position-relative px-3 text-dark text-decoration-none">
                                    <div class="flex">
                                        @if ($notification->read_at === null)
                                            <span class="badge bg-[#014797]">New</span>
                                        @endif
                                        <h5 @if ($notification->read_at === null) class="ml-2 mb-0" @else class="mb-0" @endif> {{ $notification->data['subject'] }} </h5>
                                    </div>

                                <p class="mb-0 mt-2">{{ $notification->data['content'] }}</p>
                                <p class="notification_time mt-1"> {{ \Carbon\Carbon::parse($notification->created_at)->diffForHumans() }} </p>
                            </a>
                        </li>
                    @endforeach
                @else
                    <h5 class="mt-4 text-1xl text-center">You have no notifications yet</h5>
                @endif

            </ul>
        </div>
    </div>

</div>

