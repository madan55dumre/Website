<!DOCTYPE html>
<html>
<head>
<title>Forgot Password</title>

<style>

body{
    margin:0;
    font-family: Arial;
    background: linear-gradient(135deg, #6a11cb, #2575fc);
    height:100vh;
    display:flex;
    justify-content:center;
    align-items:center;
}

.box{
    width:350px;
    background:white;
    padding:30px;
    border-radius:15px;
    box-shadow:0 10px 25px rgba(0,0,0,0.3);
    text-align:center;
}

h2{
    color:#2575fc;
    margin-bottom:20px;
}

input{
    width:100%;
    padding:12px;
    margin:10px 0;
    border:1px solid #ccc;
    border-radius:8px;
    outline:none;
}

input:focus{
    border-color:#2575fc;
}

button{
    width:100%;
    padding:12px;
    background:linear-gradient(90deg,#6a11cb,#2575fc);
    color:white;
    border:none;
    border-radius:8px;
    font-size:16px;
    cursor:pointer;
    transition:0.3s;
}

button:hover{
    opacity:0.9;
    transform:scale(1.02);
}

small{
    display:block;
    margin-top:10px;
    color:gray;
}

</style>

</head>

<body>

<div class="box">

    <h2>Forgot Password</h2>

    <form action="send_reset.php" method="POST">

        <input type="email" name="email" placeholder="Enter your email" required>

        <button type="submit">Send Reset Link</button>

    </form>

    <small>We will send a reset link to your email</small>

</div>

</body>
</html>