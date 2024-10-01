<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Page</title>
    <style>
        body {
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #9AAA97;
            color: black;
            text-align: center;
            padding: 20px;
        }

        main {
            display: flex;
            justify-content: space-around;
            padding: 20px;
        }

        .product-image img {
            border-radius: 15px 15px;
            width: 65%;
            max-width: 100%;
            margin-top: 7%;
            margin-left: 15%;

        }

        .product-details {
            margin-top: 3%;
            margin-right: 20%;
            max-width: 300px;
        }
    </style>
</head>

<body>
    <header>
        <h1> Flower Pots </h1>
    </header>

    <main>
        <div class="product-image">
            <img src="flower-plots.jpg" alt="Product Image">
        </div>
        <div class="product-details">
            <h2>Description:</h2>
            <p>This is a product description. Lorem ipsum dolor sit amet consectetur adipisicing elit. Sint, ut!</p>
            <h2>Price:</h2>
            <p>$20</p>
            <h2>Contect no:</h2>
            <p>1234567890</p>
        </div>
    </main>
</body>

</html>