

<h2>Hello from Woo!</h2>

<a href="{!! $data['link'] !!}" title="">Click this link to confirm your e-mail.</a>
    
    <form action="" method="post" accept-charset="utf-8">

    	<input type="hidden" name="token" value="{{ $data['token'] }}">

    </form>
