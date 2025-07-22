<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Invoice</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
        }

        .invoice-header {
            font-size: 18px;
            font-weight: bold;
        }

        .invoice-details {
            margin-top: 20px;
        }

        .invoice-details table {
            width: 100%;
            border-collapse: collapse;
        }

        .invoice-details th,
        .invoice-details td {
            /* border: 1px solid #ddd; */
            padding: 8px;
            text-align: left;
        }
    </style>
</head>

<body>

    <div class="invoice-details">
        <table>
            <tr>
                <td align="center" valign="top" colspan="3" style="padding: 5px 15px;">
                    <h2
                        style="font-family: &#39;Montserrat&#39;, sans-serif;font-size: 32px;line-height: 20px;font-weight: 700;color: #001b30;margin: 10px 0 13px;text-decoration: underline;">
                        Client Address</h2>
                </td>
            </tr>

            <tr>
                <td align="left" valign="top" colspan="3" style="padding: 10px;">
                    <table width="100%" border="0" class="admit_cart_bodyMiddleTbl"
                        style="border-collapse: collapse;border: 0;font-weight: 600;">
                        <tbody>
                            <tr>
                                <th align="center" style="border: 0;padding: 5px 5px; background: #f2f2f2;">Sl</th>
                                <th align="center" style="border: 0;padding: 5px 5px; background: #f2f2f2;">Client</th>
                                <th align="center" style="border: 0;padding: 5px 5px; background: #f2f2f2;">Address</th>
                                <th align="center" style="border: 0;padding: 5px 5px; background: #f2f2f2;">City</th>
                                <th align="center" style="border: 0;padding: 5px 5px; background: #f2f2f2;">State</th>
                                <th align="center" style="border: 0;padding: 5px 5px; background: #f2f2f2;">Zipcode</th>
                            </tr>
                            @foreach ($addressList as $data)
                                <tr>
                                    <td align="center" valign="top" style="border: 0;padding: 5px 15px;">
                                        {{ $loop->iteration }} </td>
                                    <td align="center" valign="top" style="border: 0;padding: 5px 15px;">
                                        {{ $data['first_name'] }} {{ $data['last_name'] }} </td>
                                    <td align="center" valign="top" style="border: 0; padding: 5px 5px;">
                                        {{ $data['address'] }}</td>
                                    <td align="center" valign="top" style="border: 0; padding: 5px 5px;">
                                        {{ $data['city'] }}</td>
                                    <td align="center" valign="top" style="border: 0; padding: 5px 5px;">
                                        {{ $data->stateDetails['title'] }}</td>
                                    <td align="center" valign="top" style="border: 0; padding: 5px 5px;">
                                        {{ $data['zipcode'] }}</td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </td>
            </tr>




        </table>
    </div>
</body>

</html>
