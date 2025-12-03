<ul class="dropdown-menu notif-menu">
    @php  $notify=App\Helper\Helper::getNotify();  @endphp
    <div style="max-height: 350px; overflow: scroll; overflow-x: hidden;">
        @forelse ($notify as $n)
            <li class="p-2 d-flex">
                <a href="{{ $n->data['link'] ?? '#' }}" class="w-100  notifiaction_id" data-id="{{ $n->id }}"
                    target="_blank">
                    <span class="text-black-50 fw-light"
                        style="{{ $n->read_at ? '' : 'color: black !important;' }}">{{ $n->data['title'] }} :
                        {{ $n->data['message'] }}</span>
                    <p class="text-end fw-light mb-0 mt-2">{{ $n->created_at->diffForHumans() }}</p>
                </a>
            </li>
        @empty
            <p style="text-align: center;">لا يوجد اشعارات</p>
        @endforelse
    </div>
    <div class="notfim-bottom p-2" style="    border-top: 1px solid #ccc;">
        <a href="{{ route('user.notifications.index') }}">
            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-bell"
                viewBox="0 0 16 16">
                <path
                    d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2zM8 1.918l-.797.161A4.002 4.002 0 0 0 4 6c0 .628-.134 2.197-.459 3.742-.16.767-.376 1.566-.663 2.258h10.244c-.287-.692-.502-1.49-.663-2.258C12.134 8.197 12 6.628 12 6a4.002 4.002 0 0 0-3.203-3.92L8 1.917zM14.22 12c.223.447.481.801.78 1H1c.299-.199.557-.553.78-1C2.68 10.2 3 6.88 3 6c0-2.42 1.72-4.44 4.005-4.901a1 1 0 1 1 1.99 0A5.002 5.002 0 0 1 13 6c0 .88.32 4.2 1.22 6z" />
            </svg>
            عرض الكل
        </a>
    </div>
</ul>
