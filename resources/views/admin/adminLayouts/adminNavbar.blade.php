<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #ffee53;">
    <a class="navbar-brand" href="/admin">
        <img src="img/logoprinter.png" width="55" height="55" class="d-inline-block align-top" alt="">
        <h1 style="color: rgb(0, 0, 0); font-size: 30px; margin-left: 5px; text-align: left; display: inline-block; margin-top: 7px;"> <!-- Menambahkan margin-top -->
            Jual Beli Printer
        </h1>
        <span class="badge bg-secondary" style="color: #ffee53; background-color:black; margin-left: 5px;">Admin</span>
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarText">
        <ul class="navbar-nav ml-auto">
            @auth
            <li class="nav-item">
                <a class="nav-link {{($title === "Home")?'active':''}}" href="/admin" style="color: rgb(0, 0, 0); margin-right: 20px; font-size: 20px;">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{($title === "OrderPending")?'active':''}}" href="/orderpending" style="color: rgb(0, 0, 0); margin-right: 20px; font-size: 20px;">Order Pending</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{($title === "OrderConfirmed")?'active':''}}" href="/orderconfirmed" style="color: rgb(0, 0, 0); margin-right: 20px; font-size: 20px;">Order Confirmed</a>
            </li>
                <li class="nav-item" style="margin-right: 10px;">
                    <form action="/logout" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-outline-primary" style="margin-top: 3px">Logout</button>
                    </form>
                </li>
            @endauth
        </ul>
    </div>
</nav>
