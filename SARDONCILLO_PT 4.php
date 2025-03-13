<div style="display: flex; justify-content: center; align-items: center; min-height: 100vh;">
    <div class="container" style="text-align: center;">
        <h2>Calculate Sum of Squares and Cubes</h2>
        <form method="post">
            <input type="number" name="number" placeholder="Enter an upper limit" required>
            <br><br>
            <button type="submit" style="background-color: green; color: white; padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer;">Calculate</button>
        </form>
        <style>
            body {
                font-family: Arial, sans-serif;
                text-align: center;
                background: linear-gradient(135deg, rgb(156, 34, 38), rgb(122, 152, 237), rgb(120, 129, 207), rgb(145, 165, 232));
                background-size: 400% 400%;
                animation: gradientBG 10s ease infinite;
                overflow: hidden;
                margin: 0; /* Remove default body margin */
            }

            @keyframes gradientBG {
                0% {
                    background-position: 0% 50%;
                }

                50% {
                    background-position: 100% 50%;
                }

                100% {
                    background-position: 0% 50%;
                }
            }
            .container {
                padding: 20px;
                background-color: rgba(255, 255, 255, 0.8);
                border-radius: 10px;
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            }

            .result {
                margin-top: 20px;
                padding: 15px;
                background-color: #f0f0f0;
                border-radius: 5px;
            }
        </style>
       
    </div>
</div>