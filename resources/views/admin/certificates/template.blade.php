<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
        body {
            background: #ccc;
            margin: 0;
            font-family: Arial, sans-serif;
        }

        .certificate-container {
            position: relative;
            width: 794px; /* Adjusted width for A4 size */
            height: 1128px; /* Adjusted height for A4 size */
            background-color: #618597;
            padding: 5px;
            color: #333;
            box-shadow: 0 0 5px rgba(0, 0, 0, .5);
            margin: auto;
            page-break-before: auto; /* Add this to prevent page breaks before the element */
        }

        /* .outer-border {
            width: 100%;
            height: 100%;
            position: absolute;
            border: 2px solid #fff;
        } */

        .certificate-border {
            max-width: 100%;
            max-height: 100%;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
            padding: 0;
            border: 1px solid #E1E5F0;
            background-color: rgba(255, 255, 255, 1);
        }

        .certificate-content {
            max-width: 650px;
            max-height: 1128px;
            margin: auto;
            text-align: center;
            padding: 37px;
        }

        .certificate-title h2 {
            font-family: 'Pinyon Script', cursive;
            font-size: 30px;
            margin-bottom: 10px;
        }

        /* .certificate-logo img {
            width: 10;
            height: 10px;
            margin-top: 20px;
        } */

        .certificate-body {
            margin-top: 15px;
        }

        .certificate-name h3 {
            font-size: 24px;
        }

        .achievement h3 {
            font-family: 'Pinyon Script', cursive;
            margin-top: 50px;
        }

        .achievement h5,
        .certificate-text h5 {
            margin-top: 10px;
        }

        hr {
            width: 50%;
            margin-top: 0px;
            margin-bottom: 10px;
        }

        .certificate-footer {
            display: flex;
            justify-content: space-between;
            margin-top: 50px;
        }

        .certified h3,
        .certified h5 {
            font-size: 16px;
            margin: 0;
        }

        .back-img{
            content: "";
            position: absolute;
            background-image: url('./assets/images/resources/logo.png');
            background-repeat: no-repeat;
            background-position: center;
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
            background-image-resize: 5;
            background-image-opacity: 0.1;
        }
    </style>
</head>

<body>
    <div class="certificate-container">
        <div class="border outer-border"></div>
        <div class="border inner-border"></div>

        <div class="border certificate-border back-img">
            <div class="certificate-content">
                <div class="certificate-title">
                    <h2>Chakaria Probashi Society</h2>
                </div>

                <div class="certificate-logo" style="height: 330px; width:330px;margin-left: 130px;">
                    <img src="assets/images/resources/logo.png" alt="">
                </div>

                <div class="certificate-body">
                    <div class="certificate-name">
                        <h1>{{ $member->name }}</h1>
                        <h4>
                            Member
                        </h4>
                    </div>

                    <div class="achievement">
                        <h3>Achievement</h3>
                        <hr>
                        <h5>Winner</h5>
                    </div>

                    <div class="certificate-text">
                        <h3>Certified Member Of CPS</h3>
                        <h5>with fundamental knowledge Of CPS</h5>
                        <small>Issued 03 january 2014</small>
                    </div>
                </div>

                <div class="certificate-footer">
                    <div class="certified">
                        <h3>Chairman</h3>
                        <h5>Chakara Probashi Society</h5>
                    </div>

                    <div class="certified">
                        <h3>Executive Member</h3>
                        <h5>Chakara Probashi Society</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
