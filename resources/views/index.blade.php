<!DOCTYPE html>
<html>

<head>
    <title>Login</title>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
    <link rel="stylesheet" href="{{ asset('assets/css/admin.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}" type="text/css">
    <script language="JavaScript" type="text/javascript" src="{{ asset('assets/js/scripts.js') }}"></script>
</head>

<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0" onLoad="">
    <div class="fullsection">
        <div class="sidebar">
            <table width="230" border="0" cellspacing="0" cellpadding="0" height="100%"
                background="{{ asset('assets/images/leftPanelBkgd.jpg') }}">
                <tbody>
                    <tr align="left">
                        <td height="136" valign="top" colspan="2">
                            <table width="100%" border="0" cellspacing="0" cellpadding="0" height="29"
                                background="{{ asset('assets/images/midPanelBkgd.jpg') }}">
                                <tbody>
                                    <tr>
                                        <td width="49">
                                            <div align="center"><img src="{{ asset('assets/images/search.jpg') }}"
                                                    width="35" height="5"></div>
                                        </td>
                                        <td width="91">
                                            &nbsp;
                                        </td>
                                        <td width="30">
                                            &nbsp;
                                        </td>
                                        <td width="67"><img src="{{ asset('assets/images/clear.gif') }}"
                                                width="8" height="29"></td>
                                    </tr>
                                </tbody>
                            </table>
                            <table width="233" border="0" cellspacing="0" cellpadding="0" height="175"
                                background="{{ asset('assets/images/leftPanelBkgd.jpg') }}">
                                <tbody>
                                    <tr>
                                        <td rowspan="2" width="209" valign="top">
                                            <table width="179" border="0" cellspacing="0" cellpadding="0"
                                                height="100%">
                                                <tbody>
                                                    <tr>
                                                        <td height="7"><img
                                                                src="{{ asset('assets/images/clear.gif') }}"
                                                                width="209" height="7"></td>
                                                    </tr>
                                                    <tr valign="top">
                                                        <td>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                        <td width="24" height="54" valign="top"><img
                                                src="{{ asset('assets/images/cornerBig.jpg') }}" width="28"
                                                height="43"><br>
                                            <img src="{{ asset('assets/images/blueDot.jpg') }}" width="1"
                                                height="13">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="24" valign="top" background=""> <img
                                                src="{{ asset('assets/images/blueDot.jpg') }}" width="1"
                                                height="260">
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="maincontent">
            <table width="100%" border="0" cellspacing="0" cellpadding="0" height="34">
                <tbody>
                    <tr>
                        <td valign="top" width="27"><img src="{{ asset('assets/images/cornerSmall.jpg') }}"
                                width="25" height="30"></td>
                        <td colspan="2" width="439">
                            <table width="97%" border="0" cellspacing="0" cellpadding="0">
                                <!-- background="images/blueBarTab.jpg"-->
                                <tbody>
                                    <tr>
                                        <td height="12" width="67%">
                                            <div align="left">
                                                <!--img src="images/blueBarStart.jpg" width="36" height="15"-->
                                            </div>
                                        </td>
                                        <td height="12" width="33%" align="right">
                                            <!--img src="images/blueBarTail.jpg" width="144" height="15"-->
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                </tbody>
            </table>
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                    <td><img src="images/clear.gif" width="1" height="10"></td>
                </tr>
            </table>
            <table width="100%" height="35" border="0" cellspacing="0" cellpadding="0">
                <tr>
                    <td>
                        <table width="520" border="0" cellspacing="0" cellpadding="6">
                            <tr>
                                <td width="8"><img src="{{ asset('assets/images/clear.gif') }}" width="8"
                                        height="1">
                                </td>
                                <td width="100%" class="frmToolHeader">LOGIN</td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                    <td width="20"><img src="{{ asset('assets/images/clear.gif') }}" width="20"
                            height="50"></td>
                    <td width="100%">
                        <table width="500" border="0" cellspacing="0" cellpadding="1">
                            <tr>
                                <td class="frmBorder">
                                    <table width="100%" border="0" cellspacing="0" cellpadding="1">
                                        <tr>
                                            <td class="frmBackground">
                                                <form class="loginForm" name="loginForm" method="post"
                                                    action="{{ route('submit_login') }}">
                                                    @csrf
                                                    <table width="100%" border="0" cellspacing="1"
                                                        cellpadding="3">
                                                        <tr>
                                                            <td colspan="2" class="frmRequired">&nbsp;</td>
                                                        </tr>
                                                        <tr>
                                                            <td width="175" class="frmDescriptionBold">Username:
                                                            </td>
                                                            <td class="frmInput">
                                                                <input type="text" name="username" value=""
                                                                    class="textbox" style="width:306" required>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td width="175" class="frmDescriptionBold">Password:
                                                            </td>
                                                            <td class="frmInput">
                                                                <input type="password" name="password" value=""
                                                                    class="textbox" style="width:306" required>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td width="175" class="frmDescriptionBold"></td>
                                                            <td align="right" class="frmInput">
                                                                <input type="image"
                                                                    src="{{ asset('assets/images/btnSubmit.gif') }}"
                                                                    name="submit" value="submit" align="middle"
                                                                    alt="Submit">
                                                            </td>
                                                        </tr>
                                                        <tr align="center">
                                                            <td colspan="2" class="frmStatus">&nbsp;
                                                                @if (session('error'))
                                                                    <div class="alert alert-danger">
                                                                        {{ session('error') }}
                                                                    </div>
                                                                @endif
                                                                @if ($errors->any())
                                                                    <div class="alert alert-danger">
                                                                        <ul>
                                                                            @foreach ($errors->all() as $error)
                                                                                <li>{{ $error }}</li>
                                                                            @endforeach
                                                                        </ul>
                                                                    </div>
                                                                @endif
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </form>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                    <td height="25"></td>
                </tr>
            </table>
        </div>
    </div>


</body>

</html>
