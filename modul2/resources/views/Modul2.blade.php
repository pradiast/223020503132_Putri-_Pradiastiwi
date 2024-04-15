

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="{{asset('JS/inputan.JS')}}"></script>
    <title>Document</title>
</head>
<body>
    <form id="Input" onsubmit="return validateinput()">
        <ul>
            <li>
                <label for="username">username</label>
            <input type="text" name="username" id="username">
            </li>
            <br/>
            <li>
                <label for="password">password</label>
            <input type="text" name="password" id="password">
            </li>
            <br/>
            <li>
            <button type="submit">submit</button>
            </li>
            <li>
                <span id="usernameError" class="error"></span>
            </li>
            <li>
                <span id="passwordError" class="error"></span>
            </li>
        </ul>
    </form>
</body>
</html>
