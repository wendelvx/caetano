<style>
    .header_logout{
        display: flex;
        justify-content: space-between;
        
    }
</style>
<div class="header_logout">
<h1>AVP</h1>   
<form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>

</div>
 