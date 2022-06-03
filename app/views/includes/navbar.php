<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-3" aria-label="Fourth navbar example">
    <div class="container">
    <a class="navbar-brand" href="<?php echo URLROOT; ?>"><?php echo SiteName; ?></a>
    <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarsExample04">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
                <a class="nav-link" aria-current="page" href="<?php echo URLROOT; ?>">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" aria-current="page" href="<?php echo URLROOT; ?>/pages/about">About</a>
            </li>
            
            <!-- <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-bs-toggle="dropdown" aria-expanded="false">Dropdown</a>
                <ul class="dropdown-menu" aria-labelledby="dropdown04">
                <li><a class="dropdown-item" href="#">Action</a></li>
                <li><a class="dropdown-item" href="#">Another action</a></li>
                <li><a class="dropdown-item" href="#">Something else here</a></li>
                </ul>
            </li> -->
        </ul>
        <!-- <form>
        <input class="form-control" type="text" placeholder="Search" aria-label="Search">
        </form> -->
        <ul class="navbar-nav ml-auto mb-2 mb-lg-0">
            <li class="nav-item">
                <a class="nav-link" aria-current="page" href="<?php echo URLROOT; ?>/users/register">Register</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" aria-current="page" href="<?php echo URLROOT; ?>/users/login">Login</a>
            </li>
        </ul>
    </div>
    </div>
    </div>
</nav>