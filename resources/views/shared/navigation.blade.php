<nav>
  @if (Auth::check())
    <ul>
      <li><a href="/messages">Messages</a></li>
      @if (Auth::user()->is_employer && isset($isAllListingsPage))
        <li><a href="/listings/create">Post a Listing</a></li>
      @else
        @if (isset($isMessagesPage))
          <li><a href="/messages/compose">Compose</a></li>
        @else
          <li><a href="/listings/">Listings</a></li>
        @endif
      @endif
    </ul>
    @if (isset($middle))
      @if ($middle == 'logo')
        <div class="logo">
          <a href="/">Eximius</a>
        </div> <!-- .logo -->
      @endif
    @endif
    <ul>
      <li><a href="/auth/logout">Logout</a></li>
      <li><a href="/profile/edit">Settings</a></li>
    </ul>
  @else
    <ul>
      <li><a href="/">Welcome</a></li>
      <li><a href="/blog/">Blog</a></li>
    </ul>
    <div class="logo">
      <a href="/">Eximius</a>
    </div> <!-- .logo -->
    <ul>
      <li><a href="/listings">Listings</a></li>
      <li><a href="/auth/register">Sign Up</a></li>
    </ul>
  @endif
</nav>
