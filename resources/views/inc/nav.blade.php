<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container"> 
        <a class="navbar-brand" href="{{ route('index') }}">netzwelt coding challenge</a>
        
        <div class="ml-auto">
            <form id="logout-form" action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="btn btn btn-danger">Logout</button>
            </form>            
        </div>
    </div>
</nav>
