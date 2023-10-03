<!-- <!DOCTYPE html>

<html>

    <head>

        <meta charset="utf-8" />

        

        <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    </head>

    <body>
        
        <p>Name: <?php echo $name; ?></p>
        <p>Phone Number: <?php echo $phone; ?></p>
        <p><?php echo $message; ?></p>
    </body>

</html> -->

<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
    <meta http-equiv="Content-Type" content="text/html;"/>
    <meta charset="UTF-8">
    <style media="all">
        @font-face {
            font-family: 'Roboto';
            src: url("{{ static_asset('fonts/Roboto-Regular.ttf') }}") format("truetype");
            font-weight: normal;
            font-style: normal;
        }

        * {
            margin: 0;
            padding: 0;
            line-height: 1.3;
            font-family: 'Arial';
            color: #333542;
        }

        body {
            font-size: .875rem;
        }

        .gry-color *,
        .gry-color {
            color: #000;
        }

        table {
            width: 100%;
        }

        table th {
            font-weight: normal;
        }

        table.padding th {
            padding: .5rem .7rem;
        }

        table.padding td {
            padding: .7rem;
        }

        table.sm-padding td {
            padding: .2rem .7rem;
        }

        .border-bottom td,
        .border-bottom th {
            border-bottom: 1px solid #eceff4;
        }

        .text-left {
            text-align: left;
        }

        .text-right {
            text-align: right;
        }

        .small {
            font-size: .85rem;
        }

        .currency {

        }
    </style>
</head>
<body>
<div>

    <div >
        <table style="padding: 2px 15px;">
            <tr>
                <td>

                    <img src="https://labaidcancer.com/asset/images/resources/logo-1.png" height="60" style="display:inline-block;">

                </td>
            </tr>
        </table>
        <table style="background: #6E59A6;padding: 2px 15px; ">
            <tr>
                <td style="font-size: 1.2rem; color: white;" class="strong">Labaid Cancer And Super Speciality Center</td>
                <td class="text-right"></td>
            </tr>
            <tr>
                <td style="color: white;" class="gry-color small">26 Green Road, Dhanmondi Dhaka, PO :1205</td>
                <td class="text-right"></td>
            </tr>
            <tr>
                <td style="color: white;" class="gry-color small">Hotline: 10664</td>
            </tr>
        </table>

    </div>

    <div style="padding: 1.5rem;padding-bottom: 0">
        <!-- <p>Patient Name: Sagor</p>
        <p>Doctor Name: Dr. Sagor</p>
        <p>Department: Dr. Sagor</p>
        <p>Appointment Date: 10 Oct 2022</p> -->
        <p>
            Dear <?php echo $p_name; ?>,<br>
            <br>
            Your appointment with <?php echo $d_name; ?> on <strong><?php echo $appointment_date; ?></strong>  at <strong><?php echo $appointment_time; ?></strong> has been confirmed. <br><br>
            Your serial Number  <strong><?php echo $serial; ?></strong><br><br>
            For general inquiries, Call our hotline number 10664 or visit our official website <a style="color:blue;" href="https://labaidcancer.com/">https://labaidcancer.com</a> for further information.

            <br><br>
            Thank you,<br><br>
            <br>
            <img src="https://labaidcancer.com/asset/images/resources/logo-1.png" height="30" style="display:inline-block;">
<br>
            Labaid Cancer And Super Speciality Center
        </p>
    </div>





</div>
</body>
</html>
