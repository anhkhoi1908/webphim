<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/ae360af17e.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Sidebar With Bootstrap</title>
</head>

<body>
    <div class="wrapper">
        <!-- Sidebar -->
        <aside id="sidebar" style="background-color: #222">
            <div class="h-100">
                <div class="sidebar-logo">
                    <a href="#">Dozing Bird</a>
                </div>
                <!-- Sidebar Navigation -->
                <ul class="sidebar-nav">
                    <li class="sidebar-header">
                        Tools & Components
                    </li>
                    <li class="sidebar-item">
                        <a href="#" class="sidebar-link">
                            <i class="fa-solid fa-list pe-2"></i>
                            Dashboard
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="{{route('category.index')}}" class="sidebar-link collapsed" data-bs-toggle="collapse" data-bs-target="#pages"
                            aria-expanded="false" aria-controls="pages">
                            <i class="fa-regular fa-file-lines pe-2"></i>
                            Category
                        </a>
                        <ul id="pages" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                            <li class="sidebar-item">
                                <a href="{{route('category.create')}}" class="sidebar-link">Create</a>
                            </li>
                            <li class="sidebar-item">
                                <a href="{{route('category.index')}}" class="sidebar-link">List</a>
                            </li>

                        </ul>
                    </li>
                    <li class="sidebar-item">
                        <a href="#" class="sidebar-link collapsed" data-bs-toggle="collapse" data-bs-target="#dashboard"
                            aria-expanded="false" aria-controls="dashboard">
                            <i class="fa-solid fa-sliders pe-2"></i>
                            Genre
                        </a>
                        <ul id="dashboard" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                            <li class="sidebar-item">
                                <a href="{{route('genre.create')}}" class="sidebar-link">Create</a>
                            </li>
                            <li class="sidebar-item">
                                <a href="{{route('genre.index')}}" class="sidebar-link">List</a>
                            </li>
                        </ul>
                    </li>
                    <li class="sidebar-item">
                        <a href="#" class="sidebar-link collapsed" data-bs-toggle="collapse" data-bs-target="#country"
                            aria-expanded="false" aria-controls="country">
                            <i class="fa-solid fa-earth-americas pe-2"></i>
                            Country
                        </a>
                        <ul id="country" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                            <li class="sidebar-item">
                                <a href="{{route('country.create')}}" class="sidebar-link">Create</a>
                            </li>
                            <li class="sidebar-item">
                                <a href="{{route('country.index')}}" class="sidebar-link">List</a>
                            </li>
                        </ul>
                    </li>
                    <li class="sidebar-item">
                        <a href="#" class="sidebar-link collapsed" data-bs-toggle="collapse" data-bs-target="#movie"
                            aria-expanded="false" aria-controls="movie">
                            <i class="fa-solid fa-video pe-2"></i>
                            Movie
                        </a>
                        <ul id="movie" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                            <li class="sidebar-item">
                                <a href="{{route('movie.create')}}" class="sidebar-link">Create</a>
                            </li>
                            <li class="sidebar-item">
                                <a href="{{route('movie.index')}}" class="sidebar-link">List</a>
                            </li>
                        </ul>
                    </li>
                    <li class="sidebar-item">
                        <a href="#" class="sidebar-link collapsed" data-bs-toggle="collapse" data-bs-target="#episode"
                            aria-expanded="false" aria-controls="episode">
                            <i class="fa-solid fa-clapperboard pe-2"></i>
                            Episode
                        </a>
                        <ul id="episode" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                            <li class="sidebar-item">
                                <a href="{{route('episode.create')}}" class="sidebar-link">Create</a>
                            </li>
                            <li class="sidebar-item">
                                <a href="{{route('episode.index')}}" class="sidebar-link">List</a>
                            </li>
                        </ul>
                    </li>
                    <li class="sidebar-header">
                        Multi Level Nav
                    </li>
                    <li class="sidebar-item">
                        <a href="#" class="sidebar-link collapsed" data-bs-toggle="collapse" data-bs-target="#multi"
                            aria-expanded="false" aria-controls="multi">
                            <i class="fa-solid fa-share-nodes pe-2"></i>
                            Multi Level
                        </a>
                        <ul id="multi" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                            <li class="sidebar-item">
                                <a href="#" class="sidebar-link collapsed" data-bs-toggle="collapse"
                                    data-bs-target="#multi-two" aria-expanded="false" aria-controls="multi-two">
                                    Two Links
                                </a>
                                <ul id="multi-two" class="sidebar-dropdown list-unstyled collapse">
                                    <li class="sidebar-item">
                                        <a href="#" class="sidebar-link">Link 1</a>
                                    </li>
                                    <li class="sidebar-item">
                                        <a href="#" class="sidebar-link">Link 2</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </aside>
        <!-- Main Component -->
        <div class="main" style="overflow-x: auto">
            <nav class="navbar navbar-expand px-3 border-bottom">
                <!-- Button for sidebar toggle -->
                <button class="btn" type="button" data-bs-theme="dark">
                    <span class="navbar-toggler-icon" style="background: #222"></span>
                </button>
            </nav>
            <main class="content px-3 py-2">
                <div class="container-fluid">
                    <div class="mb-3">
                        {{-- <h3 style="color: #222">Bootstrap Sidebar Tutorial</h3> --}}
                        @yield('content')
                    </div>
                </div>
            </main>
        </div>
    </div>

    <script>
        const toggler = document.querySelector(".btn");
        toggler.addEventListener("click",function(){
            document.querySelector("#sidebar").classList.toggle("collapsed");
        });
    </script>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins&display=swap');

        *,
        ::after,
        ::before {
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            /* background-image: url("https://codzsword.github.io/bootstrap-sidebar/background-image.jpg"); */
            background-repeat: no-repeat;
            background-position: center bottom;
            background-size: cover;
        }
        
        h3 {
            font-size: 1.2375rem;
            color: #FFF;
        }
        
        a {
            cursor: pointer;
            text-decoration: none;
            font-family: 'Poppins', sans-serif;
        }
        
        li {
            list-style: none;
        }
        
        /* Layout skeleton */
        
        .wrapper {
            align-items: stretch;
            display: flex;
            width: 100%;
        }
        
        #sidebar {
            max-width: 264px;
            min-width: 200px;
            transition: all 0.35s ease-in-out;
            box-shadow: 0 0 35px 0 rgba(49, 57, 66, 0.5);
            z-index: 1111;
        }
        
        /* Sidebar collapse */
        
        #sidebar.collapsed {
            margin-left: -200px;
        }
        
        .main {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            width: 100%;
            overflow: hidden;
            transition: all 0.35s ease-in-out;
        }
        
        .sidebar-logo {
            padding: 1.15rem 1.5rem;
        }
        
        .sidebar-logo a {
            color: #e9ecef;
            font-size: 1.25rem;
            font-weight: 600;
        }
        
        .sidebar-nav {
            padding: 0;
        }
        
        .sidebar-header {
            color: #e9ecef;
            font-size: .75rem;
            padding: 1.5rem 1.5rem .375rem;
        }
        
        a.sidebar-link {
            padding: .625rem 1.625rem;
            color: #e9ecef;
            position: relative;
            display: block;
            font-size: 1rem;
        }
        
        .sidebar-link[data-bs-toggle="collapse"]::after {
            border: solid;
            border-width: 0 .075rem .075rem 0;
            content: "";
            display: inline-block;
            padding: 2px;
            position: absolute;
            right: 1.5rem;
            top: 1.4rem;
            transform: rotate(-135deg);
            transition: all .2s ease-out;
        }
        
        .sidebar-link[data-bs-toggle="collapse"].collapsed::after {
            transform: rotate(45deg);
            transition: all .2s ease-out;
        }
        
        .content {
            flex: 1;
            max-width: 100vw;
            width: 100vw;
        }
        
        /* Responsive */
        
        @media (min-width:768px) {
            .content {
                width: auto;
            }
        }

    </style>
    
</body>

</html>