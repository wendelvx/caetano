<style>
    .header_logout {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 18px 35px;
        background: linear-gradient(135deg, #000000, #1a1a1a);
        border-bottom: 3px solid #e63946;
        font-family: 'Impact', 'Rock Salt', 'Arial Black', sans-serif;
        color: #f1f1f1;
        box-shadow: 0 4px 20px rgba(0,0,0,0.9);
        text-transform: uppercase;
        letter-spacing: 1px;
    }

    .header_logout h1 {
        margin: 0;
        font-size: 30px;
        font-weight: bold;
        color: #e63946;
        text-shadow: 2px 2px 6px rgba(0,0,0,0.9);
    }

    .header_logout form {
        margin: 0;
    }

    .header_logout form a {
        display: inline-block;
        padding: 10px 20px;
        border-radius: 6px;
        background: #e63946;
        color: #fff;
        font-weight: bold;
        font-size: 14px;
        text-decoration: none;
        text-transform: uppercase;
        transition: all 0.3s ease;
        border: 2px solid #e63946;
        box-shadow: 0 0 10px rgba(230,57,70,0.7);
    }

    .header_logout form a:hover {
        background: #000;
        color: #e63946;
        transform: scale(1.1) rotate(-2deg);
        box-shadow: 0 0 15px #e63946;
    }
</style>

<div class="header_logout">
    <h1>Caetano Gym 🏋️‍♂️🤘</h1>   
    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <x-dropdown-link :href="route('logout')"
            onclick="event.preventDefault();
                        this.closest('form').submit();">
            {{ __('Log Out') }}
        </x-dropdown-link>
    </form>
</div>
