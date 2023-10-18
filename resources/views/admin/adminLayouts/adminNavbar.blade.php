      <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #ffee53;">
    <a class="navbar-brand" href="/home">
        <img src="img/logoprinter.png" width="70" height="70" class="d-inline-block align-top" alt="">
        <p style="color: rgb(0, 0, 0); font-size: 20px; margin-right: 10px; text-align: left; display: inline-block; margin-top: 10px;"> <!-- Menambahkan margin-top -->
            Jual Beli Printer <br>
            welcome admin hehe xixixi awoakwoakwak:D
        </p>
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarText">
        <ul class="navbar-nav ml-auto">
            @auth
            <li class="nav-item">
                <a class="nav-link {{($title === "Menu")?'active':''}}" href="/index" style="color: rgb(0, 0, 0); margin-right: 20px; font-size: 20px;">Menu</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{($title === "OrderPending")?'active':''}}" href="/orderPending" style="color: rgb(0, 0, 0); margin-right: 20px; font-size: 20px;">Order Pending</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{($title === "OrderConfirmed")?'active':''}}" href="/orderConfirmed" style="color: rgb(0, 0, 0); margin-right: 20px; font-size: 20px;">Order Confirmed</a>
            </li>
                <li class="nav-item" style="margin-right: 10px;">
                    <form action="/logout" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-outline-primary">Logout</button>
                    </form>
                </li>
            @endauth
        </ul>
    </div>
</nav>
