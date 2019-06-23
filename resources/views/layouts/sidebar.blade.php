
<div id="sidebar-wrapper">
    <aside id="sidebar">
        <ul id="sidemenu" class="sidebar-nav">
            <li>
                <a href="{{url("home")}}">
                    <span class="sidebar-icon"><i class="fa fa-dashboard"></i></span>
                    <span class="sidebar-title">Home</span>
                </a>
            </li>

            <li>
                <a href="{{action('VacancyController@index')}}">
                    <span class="sidebar-icon"><i class="fa fa-database"></i></span>
                    <span class="sidebar-title">Lowongan</span>
                </a>
            </li>
            @if(Auth::User()->role=="ADMIN")
            <li>
                <a href="{{action('PsychoTestController@index')}}">
                    <span class="sidebar-icon"><i class="fa fa-newspaper-o"></i></span>
                    <span class="sidebar-title">Psikotest</span>
                </a>
            </li>
            <li>
                <a href="{{action('ScoringTypeController@index')}}">
                    <span class="sidebar-icon"><i class="fa fa-terminal"></i></span>
                    <span class="sidebar-title">Config</span>
                </a>
            </li>
            @endif
        </ul>
    </aside>
</div>