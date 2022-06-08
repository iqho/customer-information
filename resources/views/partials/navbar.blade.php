<nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom border-gray">
    <a class="navbar-brand ps-2" href="{{ url('/') }}">
<img src="https://winwinsp.com/site/images/logo.png" alt="Test Project Logo" style="height: 50px; width: 250px">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02"
        aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0 ps-5">
            <li class="nav-item active">
                <a class="nav-link py-0" href="{{ url('/') }}" style="border-right: 1px solid rgb(207, 207, 207); color:black">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link py-0" href="{{ url('/add-customer') }}" style="color:black">Add New Customer</a>
            </li>
        </ul>
    </div>
</nav>
