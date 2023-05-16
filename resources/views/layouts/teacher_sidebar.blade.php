<!-- sidebar -->
<div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white">
    <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
        <li class="nav-item">
            <a href="/admin" class="nav-link align-middle px-0">
                <i class="fs-4 bi-house"></i> <span class="ms-1 d-none d-sm-inline">Dashboard</span>
            </a>
        </li>
        <li>
            <a href="{{ route('batch.index') }}" class="nav-link px-0 align-middle">
                <i class="fs-4 bi-table"></i> <span class="ms-1 d-none d-sm-inline">Batch</span></a>
        </li>
        <li>
            <a href="{{ route('course.index') }}" class="nav-link px-0 align-middle">
                <i class="fs-4 bi-table"></i> <span class="ms-1 d-none d-sm-inline">Course</span></a>
        </li>
        <li>
            <a href="#submenu1" data-bs-toggle="collapse" class="nav-link px-0 align-middle">
                <i class="fs-4 bi-speedometer2"></i> <span class="ms-1 d-none d-sm-inline">Classes</span> </a>
            <ul class="collapse show nav flex-column ms-1" id="submenu1" data-bs-parent="#menu">
                <li class="w-100">
                    <a href="{{ route('lmsclass.index', ['type' => 'schedule']) }}" class="nav-link px-0"> <span class="d-none d-sm-inline">Class</span> Schedules </a>
                </li>
                <li>
                    <a href="{{ route('lmsclass.index', ['type' => 'tute']) }}" class="nav-link px-0"> <span class="d-none d-sm-inline">Class</span> Tutes </a>
                </li>
                <li>
                    <a href="{{ route('lmsclass.index', ['type' => 'video']) }}" class="nav-link px-0"> <span class="d-none d-sm-inline">Class</span> Videos </a>
                </li>
            </ul>
        </li>
    </ul>
</div>
<!-- sidebar -->