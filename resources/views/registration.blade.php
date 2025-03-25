<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f7fc;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .form-container {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
            color: #444;
        }

        input[type="text"],
        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            font-size: 16px;
        }

        button {
            width: 100%;
            padding: 12px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }

        .error {
            color: #e74c3c;
            font-size: 14px;
        }

        .form-container div {
            margin-bottom: 15px;
        }

        .form-container span {
            font-size: 14px;
            color: #e74c3c;
        }
    </style>
</head>
<body>

<div class="form-container">
    <h2>Register</h2>
    <form method="POST" action="{{ route('register_new') }}">
        @csrf

        <div>
            <label for="name">Name</label>
            <input id="name" type="text" name="name" required >
            @error('name') 
                <span class="error">{{ $message }}</span>
            @enderror
          
        </div>

        <div>
            <label for="email">Email</label>
            <input id="email" type="email" name="email" required >
            @error('email') 
                <span class="error">{{ $message }}</span>
            @enderror
            
        </div>

        <div>
            <label for="password">Password</label>
            <input id="password" type="password" name="password" required>
           
        </div>


        <button type="submit">Register</button>
    </form>
</div>

</body>
</html>
