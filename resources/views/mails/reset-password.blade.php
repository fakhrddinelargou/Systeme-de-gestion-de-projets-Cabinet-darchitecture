<h2>Reset Password</h2>

<p>Click the button below to reset your password:</p>

<a href="{{ url('/reset-password/'.$token.'?email='.$email) }}">
    Reset Password
</a>