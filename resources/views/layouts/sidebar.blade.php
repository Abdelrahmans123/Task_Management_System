
@section('css')
    <style>
        .material-symbols-outlined {
            font-variation-settings:
                'FILL' 0,
                'wght' 400,
                'GRAD' 0,
                'opsz' 48
        }
    </style>

@endsection

<aside>
    <div class="top">
        <div class="logo">
            <a href="{{url('/')}}" class="ic">
                <i class="fa fa-book me-3 ico"></i>
                <h2 class="m-0 text-primary fs-4">Task Management System</h2>
            </a>
        </div>
        <div class="close" id="closeBtn">
            <i class=" fa-solid fa-xmark"></i>
        </div>
    </div>

    <div class="sidebar">
        <ul>

            <li class="nav-item">
                <a class="nav-link" href="{{ url('project') }}">{{ __('Projects') }}</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ url('task') }}">{{ __('Tasks') }}</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ url('employee') }}">{{ __('Employees') }}</a>
            </li>
        </ul>

    </div>
</aside>


