<div class="page-header">
    <ul class="breadcrumbs">
        <li class="nav-home">
            <a href="{{url('/admin')}}">
                <i class="flaticon-home"></i>
            </a>
        </li>
        <li class="separator">
            <i class="flaticon-right-arrow"></i>
        </li>
        <li class="nav-item">
            <a href="#">{{ Str::replaceArray('_', [' '], Str::title(Request::segment(2))) }}</a>
        </li>
        <li class="separator">
            <i class="flaticon-right-arrow"></i>
        </li>
        <li class="nav-item">
            <a href="#">{{ Str::replaceArray('_', [' '], Str::title(Request::segment(3))) }}</a>
        </li>
    </ul>
</div>