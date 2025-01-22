<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="billing.css">
</head>

<body>
    <div class="cont">
        <div class="form sign-up">
            <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post">
                <h2>Billing</h2>
                <label>
                    <span>MFR</span>
                    <input type="text" name="ownername" required>
                </label>
                <label>
                    <span>Item</span>
                    <input type="text" name="drug-id" required>
                </label>
                <label>
                    <span>Pack</span>
                    <input type="text" name="drug-cer-no" required>
                </label>
                <label>
                    <span>Batch No</span>
                    <input type="text" name="email" required>
                </label>
                <label>
                    <span>Exp Dt</span>
                    <input type="date" name="password" required>
                </label>
                <label>
                    <span>MRP</span>
                    <input type="number" name="confirmpassword" required>
                </label>
                <label>
                    <span>Rate</span>
                    <input type="number" name="confirmpassword" required>
                </label>
                <label>
                    <span>Qut.</span>
                    <input type="number" name="confirmpassword" required>
                </label>
                <label>
                    <span>GST</span>
                    <input type="number" name="confirmpassword" required>
                </label>
                <label>
                    <span>Total</span>
                    <input type="number" name="confirmpassword" required>
                </label>
                <button class="submit" type="submit">SUBMIT</button>
            </form>
        </div>
    </div>
</body>

</html>