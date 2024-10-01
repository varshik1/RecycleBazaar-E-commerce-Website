<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
        }

        .container {
            top: 20px;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        }

        h1 {
            text-align: center;
            color: #333;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            font-weight: bold;
        }

        input[type="text"],
        input[type="email"],
        input[type="tel"],
        textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        textarea {
            height: 120px;
        }

        button {
            background-color: #4b8cfb;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            transform: scale(1.04);
        }

        /* Popup styles */
        .popup {
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: rgba(0, 0, 0, 0.7);
            padding: 20px;
            color: #fff;
            border-radius: 5px;
            display: none;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Contact Us</h1>
        <form id="contactForm">
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="phone">Phone Number:</label>
                <input type="tel" id="phone" name="phone" required>
            </div>
            <div class="form-group">
                <label for="message">Message:</label>
                <textarea id="message" name="message" required></textarea>
            </div>
            <button type="submit">Send Message</button>
        </form>
    </div>

    <!-- Popup div -->
    <div class="popup" id="popup">
        <p>Message sent successfully!</p>
    </div>

    <script>
        // Function to show popup
        function showPopup() {
            var popup = document.getElementById('popup');
            popup.style.display = 'block';
            setTimeout(function() {
                popup.style.display = 'none';
            }, 3000); // Popup will disappear after 3 seconds
        }

        // Form submission handler
        document.getElementById('contactForm').addEventListener('submit', function(event) {
            event.preventDefault(); // Prevent default form submission

            // Perform form validation or additional processing here

            // Simulate form submission success
            showPopup();

            // Optional: Clear form fields after submission
            this.reset();
        });
    </script>
</body>

</html>
