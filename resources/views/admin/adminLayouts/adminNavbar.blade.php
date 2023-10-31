<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #4497db;">
    <a class="navbar-brand" href="/admin">
    <img src="{{ asset('img/logoprinter.png') }}" width="70" height="70" class="d-inline-block align-top" alt="">
        <h1 style="color: white; font-size: 30px; margin-left: 10px; text-align: left; display: inline-block; margin-top: 15px;"> <!-- Menambahkan margin-top -->
            Jual Beli Printer
        </h1>
        <span class="badge bg-secondary" style="color: white; background-color:black; margin-left: 5px;">Admin</span>
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarText">
        <ul class="navbar-nav ml-auto">
            @auth
            <li class="nav-item">
                <a class="nav-link {{($title === "Home")?'active':''}}" href="/admin" style="color: white; margin-right: 20px; font-size: 20px;">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{($title === "OrderPending")?'active':''}}" href="/orderpending" style="color: white; margin-right: 20px; font-size: 20px;">Order Pending</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{($title === "OrderConfirmed")?'active':''}}" href="/orderconfirmed" style="color: white; margin-right: 20px; font-size: 20px;">Order Confirmed</a>
            </li>
                <li class="nav-item" style="margin-right: 10px;">
                    <form action="/logout" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-outline-light" style="margin-top: 3px">Logout</button>
                    </form>
                </li>
            @endauth
        </ul>
    </div>
</nav>
