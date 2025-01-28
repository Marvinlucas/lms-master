<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Guru Certificate</title>
    
    <style>
        @page {
            size: letter landscape;
            margin: 0;
        }

        body {
            font-family: 'Arial', sans-serif;
            background-color: #f7f7f7;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
        }

        .container {
            width: 100%;
            max-width: 100%;
            height: 92.6%;
            max-height: 92.6%;
            padding: 20px;
            background-color: #f0f0f0;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            background-image: url('data:image/;base64,{{ $background }}');
            background-size: cover;
            background-repeat: no-repeat;
            background-color: #fff;
            border-radius: 0;
            box-shadow: none;
            padding: 30px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .content {

            margin-top: 10%;
            width: 70%;
            text-align: center;
        }

        .image {
            display: inline-block;
            vertical-align: middle;
            padding: 20px;
            margin-right: -3%;
            text-align: center;
        }

        .image img {
            max-width: 100%;
            height: auto;
        }

        .text-head {
            display: inline-block;
            vertical-align: middle;
            padding: 20px;
            text-align: left;
            /* Left-align text */
            margin-bottom: 1%;
        }

        .text-head p {
            margin: 0;
            font-size: 39px;
            line-height: 1.2;
            font-family: nunito;
            font-weight: bold;
        }

        .text-body-title p {
            margin: 0;
            font-size: 14px;
            line-height: 1.2;
            font-family: nunito;
            font-weight: bold;
            margin-bottom: 5%;
        }

        .text-body-name p {
            margin: 0;
            font-size: 49px;
            line-height: 1.2;
            font-family: nunito;
            font-weight: bold;
            margin-bottom: 5%;
        }

        .text-body-course p {
            margin: 0;
            font-size: 14px;
            line-height: 1.2;
            font-family: nunito;
            margin-bottom: 8%;
        }
        .text-body-date p {
            margin: 0;
            font-size: 14px;
            line-height: 1.2;
            font-family: nunito;
            margin-bottom: 5%;
        }
        /* Add this CSS code to style the positions and signatures */
        .text-body-sign {
            margin-top: 5%;
            display: flex;
            justify-content: space-between;
        }

        .person {
            margin-bottom: 20px;
            display: inline-block;
            vertical-align: middle;
            padding: 20px;
            text-align: center;
        }

        .person p {
            margin: 0;
            font-size: 16px;
            font-weight: bold;
        }

        .signature {
            display: inline-block;
            border-top: 1px solid #000;
            width: 200px;
            padding-bottom: 3px;
        }


        /* Style for green text */
        .black-text {
            color: #000000;
        }

        /* Style for red text */
        .red-text {
            color: #FA5D4E;
        }

        .bold-text {
            font-weight: bold;
        }
        

    </style>
</head>

<body>
    <div class="container">
        
        <div class="content">
            <div class="image">
                <img src="data:image/;base64, {{ $logo }}" style="height: 80px;"/>
{{--<img src="img/logo/favicon-guru.png" alt="Sample Image" style="height: 80px;">--}}
            </div>
            <div class="text-head">
                <p><span class="black-text">CERTIFICATE</span><br><span class="red-text">OF COMPLETION</span></p>
            </div>
            <div class="text-body">
                <div class="text-body-title">
                    <p>THIS CERTIFICATE IS PRESENTED TO:</p>
                </div>
                <div class="text-body-name">
                    <p><span class="red-text">{{ $username }} {{$usermiddleinitial}}. {{ $userlastname }}</span></p>
                </div>
                <div class="text-body-course">
                    <p>For completing the <span class="bold-text">{{ $course }}</span><br>course in <span
                            class="bold-text">{{ $term }}</span></p>
                </div>
                <!-- Add the following code inside the "text-body-sign" div -->
               
                <div class="text-body-sign">
                    <div class="person"> 
                        <div class="signature1">
                            <img src="data:image/;base64, {{ $signature_1 }}" alt="General Manager Signature" style="width: 100px; height: auto;">
                            {{--<img src="img/logo/sign.png" alt="General Manager Signature" style="width: 100px; height: auto;">--}}
                        </div>
                        <p><span class="signature red-text">{{ $position_1 }}</span></p>
                        <p>{{ $name_1 }}</p>
                    </div>
                    <div class="person">
                        <div class="signature1">
                            <img src="img/logo/sign.png" alt="General Manager Signature" style="width: 100px; height: auto;">
                            {{--<img src="data:image/;base64, {{ $signature_2 }}" alt="General Manager Signature" style="width: 100px; height: auto;">--}}
                        </div>
                        <p><span class="signature red-text">{{ $position_2 }}</span></p>
                        <p>{{ $name_2 }}</p>
                    </div>
                </div>
                <div class="text-body-date">
                    <p><span class="bold-text">On {{ \Carbon\Carbon::parse($date)->format('F d, Y') }}</span></p>
                </div>

            </div>

        </div>
    </div>
</body>

</html>
