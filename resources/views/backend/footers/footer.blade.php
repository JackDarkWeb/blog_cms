<footer class="main-footer">
    <strong>
        Copyright &copy; {{ date("Y") }}

        <a href="{{ route_name("home") }}">
            @if(setting_logo_and_app_name()["app_name"])
                {{ setting_logo_and_app_name()["app_name"] }}
            @endif
        </a>.
    </strong>
    All rights reserved.
</footer>
