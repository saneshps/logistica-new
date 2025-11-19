<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Satisfaction Survey</title>
    <!-- Google Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@100;400;700&display=swap" rel="stylesheet">
    <!-- Google Font -->
    <style>
        table,
        th,
        td {
            border-collapse: collapse;
            font-family: 'Josefin Sans', sans-serif;
        }
    </style>
</head>

<body>

    <table style="width: 800px; margin: 0 auto; ">
        <tr>
            <td style="width: 60%;"> <strong>
                    <h4> CUSTOMER SATISFACTION SURVEY </h4>
                </strong> </td>
            <td style="width: 25%; margin: 0 auto; text-align: end;"> <img style="width: 160px;" src="{{asset('assets/img/footer-logo.png')}}"
                    alt="logo"> </td>
        </tr>


    </table>
    <table style="width: 800px; margin: 0 auto; margin-bottom: 0px;">
        <tr>
            <td style="padding-left: 0px; padding-right: 20px; line-height: 26px; text-align: justify;">
                <p> Please take a few moments to complete our Customer Satisfaction Survey. Your responses will help us
                    address any issues you may have and target our services better to meet your specified requirements.
                    Your responses will be kept confidential. Thank you for your time and valuable input.</p>
            </td>

        </tr>


    </table>
 
    <table style="width: 800px; margin: 0 auto; margin-bottom: 20px;">
        <tr>
            <td style="width: 30%; padding: 10px; background-color: #ccc; border: 1px solid black;"> <strong> Name of
                    the Customer </strong>
            </td>
            <td style="width: 70%; padding-left: 10px; border: 1px solid black;">{{$data['customer_name']}} </td>
        </tr>
        <tr>
            <td style="width: 30%; padding: 10px; background-color: #ccc;border: 1px solid black;"> <strong> Contact
                    Person </strong>
            </td>
            <td style="width: 70%; padding-left: 10px;border: 1px solid black;"> {{$data['contact_person']}} </td>
        </tr>
        <tr>
            <td style="width: 30%; padding: 10px; background-color: #ccc;border: 1px solid black;"> <strong> Contact No.
                </strong>
            </td>
            <td style="width: 70%; padding-left: 10px;border: 1px solid black;"> {{$data['contact_no']}} </td>
        </tr>
        <tr>
            <td style="width: 30%; padding: 10px; background-color: #ccc;border: 1px solid black;"> <strong> Contract
                    Details </strong>
            </td>
            <td style="width: 70%; padding-left: 10px;border: 1px solid black;"> {{$data['contract_details']}} </td>
        </tr>

    </table>

    <table style="width: 800px; margin: 0 auto; margin-bottom: 20px;">

        <tr style="background-color: #ccc; text-align: center;">
            <th rowspan="2" style="padding-top: 20px; padding-bottom: 20px;border: 1px solid black;"> Rating Criteria
            </th>
            <td style="border: 1px solid black;"> <strong> Poor </strong> </td>
            <td style="border: 1px solid black;"> <strong> Average </strong> </td>
            <td style="border: 1px solid black;"> <strong> Good </strong> </td>
            <td style="border: 1px solid black;"> <strong> Very Good </strong> </td>
            <td style="border: 1px solid black;"> <strong> Excellent </strong> </td>
        </tr>
        <tr style="background-color: #ccc; text-align: center;">
            <td style="border: 1px solid black;"> <strong> Below 40% </strong> </td>
            <td style="border: 1px solid black;"> <strong> 40% -75% </strong> </td>
            <td style="border: 1px solid black;"> <strong> 75%-85% </strong> </td>
            <td style="border: 1px solid black;"> <strong> 85%-90% </strong> </td>
            <td style="border: 1px solid black;"> <strong> Above 90% </strong> </td>
        </tr>
        <tr style="text-align: center;">
            <td
                style="width: 30%;padding-top: 15px; padding-bottom: 15px; padding-left: 15px; line-height: 22px; text-align: left;border: 1px solid black;">
                Work progress in line
                with Schedule /
                Delivery on time</td>
            <td style="border: 1px solid black;"> @if($data['work_progress']=='1') <img src="{{asset('assets/img/checked.png')}}" style="width:25px"> @endif</td>
            <td style="border: 1px solid black;"> @if($data['work_progress']=='2') <img src="{{asset('assets/img/checked.png')}}" style="width:25px"> @endif</td>
            <td style="border: 1px solid black;"> @if($data['work_progress']=='3') <img src="{{asset('assets/img/checked.png')}}" style="width:25px"> @endif </td>
            <td style="border: 1px solid black;"> @if($data['work_progress']=='4') <img src="{{asset('assets/img/checked.png')}}" style="width:25px"> @endif </td>
            <td style="border: 1px solid black;"> @if($data['work_progress']=='5') <img src="{{asset('assets/img/checked.png')}}" style="width:25px"> @endif</td>
        </tr>
        <tr style="text-align: center;">
            <td
                style="width: 30%;padding-top: 15px; padding-bottom: 15px; padding-left: 15px; line-height: 22px; text-align: left;border: 1px solid black;">
                Quality of Service </td>
            <td style="border: 1px solid black;"> @if($data['quality_of_service']=='1') <img src="{{asset('assets/img/checked.png')}}" style="width:25px"> @endif</td>
            <td style="border: 1px solid black;"> @if($data['quality_of_service']=='2') <img src="{{asset('assets/img/checked.png')}}" style="width:25px"> @endif</td>
            <td style="border: 1px solid black;"> @if($data['quality_of_service']=='3') <img src="{{asset('assets/img/checked.png')}}" style="width:25px"> @endif</td>
            <td style="border: 1px solid black;"> @if($data['quality_of_service']=='4') <img src="{{asset('assets/img/checked.png')}}" style="width:25px"> @endif</td>
            <td style="border: 1px solid black;"> @if($data['quality_of_service']=='5') <img src="{{asset('assets/img/checked.png')}}" style="width:25px"> @endif</td>
        </tr>
        <tr style="text-align: center;">
            <td
                style="width: 30%;padding-top: 15px; padding-bottom: 15px; padding-left: 15px; line-height: 22px; text-align: left;border: 1px solid black;">
                Response time for
                attending to complaints </td>
            <td style="border: 1px solid black;"> @if($data['respone_time']=='1') <img src="{{asset('assets/img/checked.png')}}" style="width:25px"> @endif</td>
            <td style="border: 1px solid black;"> @if($data['respone_time']=='2') <img src="{{asset('assets/img/checked.png')}}" style="width:25px"> @endif</td>
            <td style="border: 1px solid black;"> @if($data['respone_time']=='3') <img src="{{asset('assets/img/checked.png')}}" style="width:25px"> @endif</td>
            <td style="border: 1px solid black;"> @if($data['respone_time']=='4') <img src="{{asset('assets/img/checked.png')}}" style="width:25px"> @endif</td>
            <td style="border: 1px solid black;"> @if($data['respone_time']=='5') <img src="{{asset('assets/img/checked.png')}}" style="width:25px"> @endif</td>
        </tr>
        <tr style="text-align: center;">
            <td
                style="width: 30%;padding-top: 15px; padding-bottom: 15px; padding-left: 15px; line-height: 22px; text-align: left;border: 1px solid black;">
                Communication </td>
            <td style="border: 1px solid black;"> @if($data['communication']=='1') <img src="{{asset('assets/img/checked.png')}}" style="width:25px"> @endif</td>
            <td style="border: 1px solid black;"> @if($data['communication']=='2') <img src="{{asset('assets/img/checked.png')}}" style="width:25px"> @endif</td>
            <td style="border: 1px solid black;"> @if($data['communication']=='3') <img src="{{asset('assets/img/checked.png')}}" style="width:25px"> @endif</td>
            <td style="border: 1px solid black;"> @if($data['communication']=='4') <img src="{{asset('assets/img/checked.png')}}" style="width:25px"> @endif</td>
            <td style="border: 1px solid black;"> @if($data['communication']=='5') <img src="{{asset('assets/img/checked.png')}}" style="width:25px"> @endif</td>
        </tr>
        <tr style="text-align: center;">
            <td
                style="width: 30%;padding-top: 15px; padding-bottom: 15px; padding-left: 15px; line-height: 22px; text-align: left;border: 1px solid black;">
                Courtesy of our Staff
            </td>
            <td style="border: 1px solid black;"> @if($data['courtesy_our_staff']=='1') <img src="{{asset('assets/img/checked.png')}}" style="width:25px"> @endif</td>
            <td style="border: 1px solid black;"> @if($data['courtesy_our_staff']=='2') <img src="{{asset('assets/img/checked.png')}}" style="width:25px"> @endif</td>
            <td style="border: 1px solid black;"> @if($data['courtesy_our_staff']=='3') <img src="{{asset('assets/img/checked.png')}}" style="width:25px"> @endif</td>
            <td style="border: 1px solid black;"> @if($data['courtesy_our_staff']=='4') <img src="{{asset('assets/img/checked.png')}}" style="width:25px"> @endif</td>
            <td style="border: 1px solid black;"> @if($data['courtesy_our_staff']=='5') <img src="{{asset('assets/img/checked.png')}}" style="width:25px"> @endif</td>
        </tr>
        <tr style="text-align: center;">
            <td
                style="width: 30%;padding-top: 15px; padding-bottom: 15px; padding-left: 15px; line-height: 22px; text-align: left;border: 1px solid black;">
                <strong> Overall Rating </strong>
            </td>
            <td style="border: 1px solid black;"> @if($data['overall_rating']=='1') <img src="{{asset('assets/img/checked.png')}}" style="width:25px"> @endif</td>
            <td style="border: 1px solid black;"> @if($data['overall_rating']=='2') <img src="{{asset('assets/img/checked.png')}}" style="width:25px"> @endif</td>
            <td style="border: 1px solid black;"> @if($data['overall_rating']=='3') <img src="{{asset('assets/img/checked.png')}}" style="width:25px"> @endif</td>
            <td style="border: 1px solid black;"> @if($data['overall_rating']=='4') <img src="{{asset('assets/img/checked.png')}}" style="width:25px"> @endif</td>
            <td style="border: 1px solid black;"> @if($data['overall_rating']=='5') <img src="{{asset('assets/img/checked.png')}}" style="width:25px"> @endif</td>
        </tr>

    </table>

    <table style="width: 800px; margin: 0 auto; margin-bottom: 20px;">
        <tr>
            <td style="width: 30%; padding: 10px;border: 1px solid black;"> Any other requirements (if any)
            </td>
            <td style="width: 70%; padding-left: 10px;border: 1px solid black;"> {{$data['requirements']}} </td>
        </tr>
        <tr>
            <td style="width: 30%; padding: 10px;border: 1px solid black;"> Suggestions for improvement (if any)
            </td>
            <td style="width: 70%; padding-left: 10px;border: 1px solid black;"> {{$data['improvements']}} </td>
        </tr>
        <tr>
            <td style="width: 30%; padding: 10px;border: 1px solid black;"> Complaints (if any)
            </td>
            <td style="width: 70%; padding-left: 10px;border: 1px solid black;"> {{$data['complaints']}} </td>
        </tr>


    </table>

    <table style="width: 800px; margin: 0 auto; margin-bottom: 80px;">
        <tr>
            <td height="100" style="width: 45%; padding-left: 10px; text-align: center;border: 1px solid black;">{{$data['designation']}}  </td>
            <td height="100" style="width: 45%; padding-left: 10px; text-align: center;border: 1px solid black;">{{$data['date']}} </td>
            
        </tr>
        <tr>
            <!--<td style="width: 30%; padding: 10px; text-align: center;border: 1px solid black;"> <strong> Signature-->
            <!--    </strong>-->
            <!--</td>-->
            <td style="width: 45%; padding-left: 10px; text-align: center;border: 1px solid black;">   <strong>
                    Designation </strong> </td>
            <td style="width: 45%; padding-left: 10px; text-align: center;border: 1px solid black;">  <strong> Date
                </strong> </td>
        </tr>



    </table>

    <table style="width: 800px; margin: 0 auto; margin-bottom: 20px;">
        <tr>
            <td
                style="padding-left: 7px; padding-top: 7px; padding-bottom: 7px; padding-right: 7px; text-align: center; font-size: 13px;border: 1px solid black;">
                ENK-IMS-FO-06C Rev: 01
            </td>
            <td
                style="padding-left: 7px; padding-top: 7px; padding-bottom: 7px; padding-right: 7px; text-align: center; font-size: 13px;border: 1px solid black;">
                CUSTOMER SATISFACTION
                SURVEY </td>
            <td
                style="padding-left: 7px; padding-top: 7px; padding-bottom: 7px; padding-right: 7px; text-align: center; font-size: 13px;border: 1px solid black;">
                02/10/2023 </td>
            <td
                style="padding-left: 7px; padding-top: 7px; padding-bottom: 7px; padding-right: 7px; text-align: center; font-size: 13px;border: 1px solid black;">
                Page 1 of 1 </td>
        </tr>

    </table>

</body>

</html>