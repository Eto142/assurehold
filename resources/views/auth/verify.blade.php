<form method="POST" action="{{ route('verify.code') }}">
    @csrf
    <label>Email:</label>
    <input type="email" name="email" required>

    <label>Verification Code:</label>
    <input type="text" name="code" required maxlength="6">

    <button type="submit">Verify</button>
</form>
