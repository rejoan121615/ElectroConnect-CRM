<header>
    <div class=" card  ps-3 p-2 ">
        <div class=" d-flex flex-row align-items-center justify-content-between ">
            <p class=" mb-0 me-4 ">Welcome, <span class=" fw-bold">{{ Auth::user()->username }}</span></p>
            <div class="">
                <div class="dropdown">
                    <button class="btn btn-primary bg-transparent text-dark border-0 dropdown-toggle" type="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <div class="avatar avatar-lg ">
                            <img src="https://zuramai.github.io/mazer/demo/assets/compiled/jpg/3.jpg"
                                alt="Avatar Image">
                        </div>
                    </button>
                    <ul class="dropdown-menu border border-1 border-secondary  ">
                        <li><a class="dropdown-item" href="#">
                                <span style=" width: 1.2rem; margin-right: 5px; ">
                                    <i class="bi bi-person-circle"></i>
                                </span>
                                Profile</a></li>
                        <li><a class="dropdown-item" href="#"> <span
                                    style=" width: 1.2rem; margin-right: 5px; "><i class="bi bi-gear-fill"></i></span>
                                Setting</a></li>
                        <li>
                            <form method="POST" action="{{ route('logout')}}">
                                @csrf
                                <button class=" dropdown-item">
                                    <span style=" width: 1.2rem; margin-right: 5px; "><i
                                            class="bi bi-box-arrow-in-left"></i></span> Logout
                                </button>
                            </form>
                            {{-- <a class="dropdown-item " href="user/logout"> 
                                <span style=" width: 1.2rem; margin-right: 5px; "><i
                                        class="bi bi-box-arrow-in-left"></i></span> Logout</a> --}}
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</header>
