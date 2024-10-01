<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
            background-color: #9AAA97;
            margin: 0;
            padding: 0;
        }

        .container {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .card {
            width: 80%;
            margin: 5% auto;
            padding: 5%;
            background-color: #ffffff;
            border: 1px solid #ddd;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .object-name {
            font-size: 1.5rem;
            color: #128603;
            margin-bottom: 10px;
        }

        .date {
            font-size: 1rem;
            color: #9AAA97;
            margin-bottom: 10px;
        }

        .author {
            padding-top: 5px;
            font-size: 1.2rem;
            margin-bottom: 10px;
        }

        .description {
            font-size: 1rem;
            color: #777;
        }

        .user-img {

            border-radius: 50%;
            width: 100px;
            max-width: 100%;
            float: left;
        }

        /* .immg {
            margin-top: 5%;
            width: 20%;
        } */

        .product-img {
            border-radius: 15px 15px;
            margin-left: 1%;
            float: right;
            width: 30%;
            max-width: 100%;
            margin-top: 10px;
        }

        .btn {
            color: white;
            margin-top: 10px;
            display: inline-block;
            padding: 10px 25px;
            border-radius: 50px;
            background-color: #128603;
            text-decoration: none;
        }

        .btn:hover {
            background-color: #1fbe0a;
        }

        .btn_cont {
            font-size: large;
            color: white;
        }

        .read-more-btn {

            text-decoration: none;
            color: black;
        }

        .read-more-txt {
            display: none;
        }

        .read-more-text--show {
            display: inline;
        }

        .cnt {
            display: flex;
            margin: 0;
            padding-top: 20px;

        }

        /* Responsive adjustments */
        @media screen and (max-width: 768px) {
            .card {
                width: 90%;
            }

            .user-img,
            .immg,
            .product-img {
                max-width: 100%;
            }
        }

        @media screen and (max-width: 480px) {
            .card {
                width: 95%;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="card">
            <div class="card-content">
                <h2 class="author">Varshik Jodhani</h2><br>
                <div class="immg"><img class="user-img" src="image.png" alt="user"> </div>
                <h1 class="object-name"> Recycle Chair </h1>
                <a class="description">
                    Nam aut illo magnam deserunt provident perferendis, saepe iusto quaerat quasi modi fugit porro esse
                    sit deleniti explicabo, aperiam, id dignissimos tempora labore temporibus? Alias velit voluptatem
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Ab suscipit nisi quis error, tempora nobis?
                    Est odio provident similique ipsum aliquid. Odit aut soluta ea placeat qui omnis quibusdam,
                    laudantium consectetur repellendus fugiat autem natus minus officiis! Numquam, quas est?
                </a>
                <span class="cnt"> Contect No :- 1234567890 </span>

            </div>
        </div>
    </div>


</body>

</html>