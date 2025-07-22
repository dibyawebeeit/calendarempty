@extends('dashboard::layouts.master')
@section('title', 'Invoice')

@section('content')
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tbody>
            <tr>
                <td><img src="assets/images/clear.gif" width="1" height="10"></td>
            </tr>
        </tbody>
    </table>
    <table width="100%" height="35" border="0" cellspacing="0" cellpadding="0">
        <tbody>
            <tr>
                <td>
                    <table width="520" border="0" cellspacing="0" cellpadding="6">
                        <tbody>
                            <tr>
                                <td width="8"><img src="assets/images/clear.gif" width="8" height="1"></td>
                                <td width="100%" class="frmToolHeader">CREATE INVOICE</td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
        </tbody>
    </table>
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tbody>
            <tr>
                <td><img src="assets/images/clear.gif" width="1" height="3"></td>
            </tr>
        </tbody>
    </table>
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tbody>
            <tr>
                <td width="20"><img src="assets/images/clear.gif" width="20" height="1"></td>
                <td width="100%">
                    <table width="500" border="0" cellspacing="0" cellpadding="0">
                        <tbody>
                            <tr>
                                <td class="frmBorder"><img src="assets/images/clear.gif" width="1" height="1">
                                </td>
                            </tr>
                            <tr>
                                <td><img src="assets/images/clear.gif" width="1" height="1"></td>
                            </tr>
                            <tr>
                                <td>
                                    <table width="100%" border="0" cellspacing="0" cellpadding="4">
                                        <tbody>
                                            <tr>
                                                <td class="frmHeader">CLIENT/DATE</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td><img src="assets/images/clear.gif" width="1" height="2"></td>
                            </tr>
                        </tbody>
                    </table>
                    <table width="500" border="0" cellspacing="0" cellpadding="1">
                        <tbody>
                            <tr>
                                <td class="frmBorder">
                                    <table width="100%" border="0" cellspacing="0" cellpadding="1">
                                        <tbody>
                                            <tr>
                                                <td class="frmBackground">
                                                    <form name="searchForm" method="post" action="createInvoice.php"
                                                        target="_blank">
                                                        <input type="hidden" name="month" value="">
                                                        <input type="hidden" name="year" value="">
                                                        <table width="100%" border="0" cellspacing="1"
                                                            cellpadding="3">
                                                            <tbody>
                                                                <tr>
                                                                    <td colspan="2" class="frmRequired">Select a
                                                                        client and date to create billing for
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td width="175" class="frmDescriptionBold">
                                                                        Client:</td>
                                                                    <td class="frmInput">
                                                                        <select name="id" class="inputstyle"
                                                                            style="width:306">
                                                                            <option></option>
                                                                            <option value="2">Ben Stephenson
                                                                            </option>
                                                                        </select>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td width="85" class="frmDescriptionBold">
                                                                        Invoice For:</td>
                                                                    <td class="frmInput">
                                                                        <select name="useDate" class="inputstyle"
                                                                            style="width:200" onchange="setDate();">
                                                                            <option value="3/2025" selected="">
                                                                                March 2025</option>
                                                                            <option value="2/2025">February 2025
                                                                            </option>
                                                                            <option value="1/2025">January 2025
                                                                            </option>
                                                                            <option value="12/2024">December
                                                                                2024</option>
                                                                            <option value="11/2024">November
                                                                                2024</option>
                                                                            <option value="10/2024">October 2024
                                                                            </option>
                                                                            <option value="9/2024">September
                                                                                2024</option>
                                                                            <option value="8/2024">August 2024
                                                                            </option>
                                                                            <option value="7/2024">July 2024
                                                                            </option>
                                                                            <option value="6/2024">June 2024
                                                                            </option>
                                                                            <option value="5/2024">May 2024
                                                                            </option>
                                                                            <option value="4/2024">April 2024
                                                                            </option>
                                                                            <option value="3/2024">March 2024
                                                                            </option>
                                                                            <option value="2/2024">February 2024
                                                                            </option>
                                                                            <option value="1/2024">January 2024
                                                                            </option>
                                                                            <option value="12/2023">December
                                                                                2023</option>
                                                                            <option value="11/2023">November
                                                                                2023</option>
                                                                            <option value="10/2023">October 2023
                                                                            </option>
                                                                            <option value="9/2023">September
                                                                                2023</option>
                                                                            <option value="8/2023">August 2023
                                                                            </option>
                                                                            <option value="7/2023">July 2023
                                                                            </option>
                                                                            <option value="6/2023">June 2023
                                                                            </option>
                                                                            <option value="5/2023">May 2023
                                                                            </option>
                                                                            <option value="4/2023">April 2023
                                                                            </option>
                                                                            <option value="3/2023">March 2023
                                                                            </option>
                                                                            <option value="2/2023">February 2023
                                                                            </option>
                                                                            <option value="1/2023">January 2023
                                                                            </option>
                                                                            <option value="12/2022">December
                                                                                2022</option>
                                                                            <option value="11/2022">November
                                                                                2022</option>
                                                                            <option value="10/2022">October 2022
                                                                            </option>
                                                                            <option value="9/2022">September
                                                                                2022</option>
                                                                            <option value="8/2022">August 2022
                                                                            </option>
                                                                            <option value="7/2022">July 2022
                                                                            </option>
                                                                            <option value="6/2022">June 2022
                                                                            </option>
                                                                            <option value="5/2022">May 2022
                                                                            </option>
                                                                            <option value="4/2022">April 2022
                                                                            </option>
                                                                            <option value="3/2022">March 2022
                                                                            </option>
                                                                            <option value="2/2022">February 2022
                                                                            </option>
                                                                            <option value="1/2022">January 2022
                                                                            </option>
                                                                            <option value="12/2021">December
                                                                                2021</option>
                                                                            <option value="11/2021">November
                                                                                2021</option>
                                                                            <option value="10/2021">October 2021
                                                                            </option>
                                                                            <option value="9/2021">September
                                                                                2021</option>
                                                                            <option value="8/2021">August 2021
                                                                            </option>
                                                                            <option value="7/2021">July 2021
                                                                            </option>
                                                                            <option value="6/2021">June 2021
                                                                            </option>
                                                                            <option value="5/2021">May 2021
                                                                            </option>
                                                                            <option value="4/2021">April 2021
                                                                            </option>
                                                                            <option value="3/2021">March 2021
                                                                            </option>
                                                                            <option value="2/2021">February 2021
                                                                            </option>
                                                                            <option value="1/2021">January 2021
                                                                            </option>
                                                                            <option value="12/2020">December
                                                                                2020</option>
                                                                            <option value="11/2020">November
                                                                                2020</option>
                                                                            <option value="10/2020">October 2020
                                                                            </option>
                                                                            <option value="9/2020">September
                                                                                2020</option>
                                                                            <option value="8/2020">August 2020
                                                                            </option>
                                                                            <option value="7/2020">July 2020
                                                                            </option>
                                                                            <option value="6/2020">June 2020
                                                                            </option>
                                                                            <option value="5/2020">May 2020
                                                                            </option>
                                                                            <option value="4/2020">April 2020
                                                                            </option>
                                                                            <option value="3/2020">March 2020
                                                                            </option>
                                                                            <option value="2/2020">February 2020
                                                                            </option>
                                                                            <option value="1/2020">January 2020
                                                                            </option>
                                                                            <option value="12/2019">December
                                                                                2019</option>
                                                                            <option value="11/2019">November
                                                                                2019</option>
                                                                            <option value="10/2019">October 2019
                                                                            </option>
                                                                            <option value="9/2019">September
                                                                                2019</option>
                                                                            <option value="8/2019">August 2019
                                                                            </option>
                                                                            <option value="7/2019">July 2019
                                                                            </option>
                                                                            <option value="6/2019">June 2019
                                                                            </option>
                                                                            <option value="5/2019">May 2019
                                                                            </option>
                                                                            <option value="4/2019">April 2019
                                                                            </option>
                                                                            <option value="3/2019">March 2019
                                                                            </option>
                                                                            <option value="2/2019">February 2019
                                                                            </option>
                                                                            <option value="1/2019">January 2019
                                                                            </option>
                                                                            <option value="12/2018">December
                                                                                2018</option>
                                                                            <option value="11/2018">November
                                                                                2018</option>
                                                                            <option value="10/2018">October 2018
                                                                            </option>
                                                                            <option value="9/2018">September
                                                                                2018</option>
                                                                            <option value="8/2018">August 2018
                                                                            </option>
                                                                            <option value="7/2018">July 2018
                                                                            </option>
                                                                            <option value="6/2018">June 2018
                                                                            </option>
                                                                            <option value="5/2018">May 2018
                                                                            </option>
                                                                            <option value="4/2018">April 2018
                                                                            </option>
                                                                            <option value="3/2018">March 2018
                                                                            </option>
                                                                            <option value="2/2018">February 2018
                                                                            </option>
                                                                            <option value="1/2018">January 2018
                                                                            </option>
                                                                            <option value="12/2017">December
                                                                                2017</option>
                                                                            <option value="11/2017">November
                                                                                2017</option>
                                                                            <option value="10/2017">October 2017
                                                                            </option>
                                                                            <option value="9/2017">September
                                                                                2017</option>
                                                                            <option value="8/2017">August 2017
                                                                            </option>
                                                                            <option value="7/2017">July 2017
                                                                            </option>
                                                                            <option value="6/2017">June 2017
                                                                            </option>
                                                                            <option value="5/2017">May 2017
                                                                            </option>
                                                                            <option value="4/2017">April 2017
                                                                            </option>
                                                                            <option value="3/2017">March 2017
                                                                            </option>
                                                                            <option value="2/2017">February 2017
                                                                            </option>
                                                                            <option value="1/2017">January 2017
                                                                            </option>
                                                                            <option value="12/2016">December
                                                                                2016</option>
                                                                            <option value="11/2016">November
                                                                                2016</option>
                                                                            <option value="10/2016">October 2016
                                                                            </option>
                                                                            <option value="9/2016">September
                                                                                2016</option>
                                                                            <option value="8/2016">August 2016
                                                                            </option>
                                                                            <option value="7/2016">July 2016
                                                                            </option>
                                                                            <option value="6/2016">June 2016
                                                                            </option>
                                                                            <option value="5/2016">May 2016
                                                                            </option>
                                                                            <option value="4/2016">April 2016
                                                                            </option>
                                                                            <option value="3/2016">March 2016
                                                                            </option>
                                                                            <option value="2/2016">February 2016
                                                                            </option>
                                                                            <option value="1/2016">January 2016
                                                                            </option>
                                                                            <option value="12/2015">December
                                                                                2015</option>
                                                                            <option value="11/2015">November
                                                                                2015</option>
                                                                            <option value="10/2015">October 2015
                                                                            </option>
                                                                            <option value="9/2015">September
                                                                                2015</option>
                                                                            <option value="8/2015">August 2015
                                                                            </option>
                                                                            <option value="7/2015">July 2015
                                                                            </option>
                                                                            <option value="6/2015">June 2015
                                                                            </option>
                                                                            <option value="5/2015">May 2015
                                                                            </option>
                                                                            <option value="4/2015">April 2015
                                                                            </option>
                                                                            <option value="3/2015">March 2015
                                                                            </option>
                                                                            <option value="2/2015">February 2015
                                                                            </option>
                                                                            <option value="1/2015">January 2015
                                                                            </option>
                                                                            <option value="12/2014">December
                                                                                2014</option>
                                                                            <option value="11/2014">November
                                                                                2014</option>
                                                                            <option value="10/2014">October 2014
                                                                            </option>
                                                                            <option value="9/2014">September
                                                                                2014</option>
                                                                            <option value="8/2014">August 2014
                                                                            </option>
                                                                            <option value="7/2014">July 2014
                                                                            </option>
                                                                            <option value="6/2014">June 2014
                                                                            </option>
                                                                            <option value="5/2014">May 2014
                                                                            </option>
                                                                            <option value="4/2014">April 2014
                                                                            </option>
                                                                            <option value="3/2014">March 2014
                                                                            </option>
                                                                            <option value="2/2014">February 2014
                                                                            </option>
                                                                            <option value="1/2014">January 2014
                                                                            </option>
                                                                            <option value="12/2013">December
                                                                                2013</option>
                                                                            <option value="11/2013">November
                                                                                2013</option>
                                                                            <option value="10/2013">October 2013
                                                                            </option>
                                                                            <option value="9/2013">September
                                                                                2013</option>
                                                                            <option value="8/2013">August 2013
                                                                            </option>
                                                                            <option value="7/2013">July 2013
                                                                            </option>
                                                                            <option value="6/2013">June 2013
                                                                            </option>
                                                                            <option value="5/2013">May 2013
                                                                            </option>
                                                                            <option value="4/2013">April 2013
                                                                            </option>
                                                                            <option value="3/2013">March 2013
                                                                            </option>
                                                                            <option value="2/2013">February 2013
                                                                            </option>
                                                                            <option value="1/2013">January 2013
                                                                            </option>
                                                                            <option value="12/2012">December
                                                                                2012</option>
                                                                            <option value="11/2012">November
                                                                                2012</option>
                                                                            <option value="10/2012">October 2012
                                                                            </option>
                                                                            <option value="9/2012">September
                                                                                2012</option>
                                                                            <option value="8/2012">August 2012
                                                                            </option>
                                                                            <option value="7/2012">July 2012
                                                                            </option>
                                                                            <option value="6/2012">June 2012
                                                                            </option>
                                                                            <option value="5/2012">May 2012
                                                                            </option>
                                                                            <option value="4/2012">April 2012
                                                                            </option>
                                                                            <option value="3/2012">March 2012
                                                                            </option>
                                                                            <option value="2/2012">February 2012
                                                                            </option>
                                                                            <option value="1/2012">January 2012
                                                                            </option>
                                                                            <option value="12/2011">December
                                                                                2011</option>
                                                                            <option value="11/2011">November
                                                                                2011</option>
                                                                            <option value="10/2011">October 2011
                                                                            </option>
                                                                            <option value="9/2011">September
                                                                                2011</option>
                                                                            <option value="8/2011">August 2011
                                                                            </option>
                                                                            <option value="7/2011">July 2011
                                                                            </option>
                                                                            <option value="6/2011">June 2011
                                                                            </option>
                                                                            <option value="5/2011">May 2011
                                                                            </option>
                                                                            <option value="4/2011">April 2011
                                                                            </option>
                                                                            <option value="3/2011">March 2011
                                                                            </option>
                                                                            <option value="2/2011">February 2011
                                                                            </option>
                                                                            <option value="1/2011">January 2011
                                                                            </option>
                                                                            <option value="12/2010">December
                                                                                2010</option>
                                                                            <option value="11/2010">November
                                                                                2010</option>
                                                                            <option value="10/2010">October 2010
                                                                            </option>
                                                                            <option value="9/2010">September
                                                                                2010</option>
                                                                            <option value="8/2010">August 2010
                                                                            </option>
                                                                            <option value="7/2010">July 2010
                                                                            </option>
                                                                            <option value="6/2010">June 2010
                                                                            </option>
                                                                            <option value="5/2010">May 2010
                                                                            </option>
                                                                            <option value="4/2010">April 2010
                                                                            </option>
                                                                            <option value="3/2010">March 2010
                                                                            </option>
                                                                            <option value="2/2010">February 2010
                                                                            </option>
                                                                            <option value="1/2010">January 2010
                                                                            </option>
                                                                            <option value="12/2009">December
                                                                                2009</option>
                                                                            <option value="11/2009">November
                                                                                2009</option>
                                                                            <option value="10/2009">October 2009
                                                                            </option>
                                                                            <option value="9/2009">September
                                                                                2009</option>
                                                                            <option value="8/2009">August 2009
                                                                            </option>
                                                                            <option value="7/2009">July 2009
                                                                            </option>
                                                                            <option value="6/2009">June 2009
                                                                            </option>
                                                                            <option value="5/2009">May 2009
                                                                            </option>
                                                                            <option value="4/2009">April 2009
                                                                            </option>
                                                                            <option value="3/2009">March 2009
                                                                            </option>
                                                                            <option value="2/2009">February 2009
                                                                            </option>
                                                                            <option value="1/2009">January 2009
                                                                            </option>
                                                                            <option value="12/2008">December
                                                                                2008</option>
                                                                            <option value="11/2008">November
                                                                                2008</option>
                                                                            <option value="10/2008">October 2008
                                                                            </option>
                                                                            <option value="9/2008">September
                                                                                2008</option>
                                                                            <option value="8/2008">August 2008
                                                                            </option>
                                                                            <option value="7/2008">July 2008
                                                                            </option>
                                                                            <option value="6/2008">June 2008
                                                                            </option>
                                                                            <option value="5/2008">May 2008
                                                                            </option>
                                                                            <option value="4/2008">April 2008
                                                                            </option>
                                                                            <option value="3/2008">March 2008
                                                                            </option>
                                                                            <option value="2/2008">February 2008
                                                                            </option>
                                                                            <option value="1/2008">January 2008
                                                                            </option>
                                                                            <option value="12/2007">December
                                                                                2007</option>
                                                                            <option value="11/2007">November
                                                                                2007</option>
                                                                            <option value="10/2007">October 2007
                                                                            </option>
                                                                            <option value="9/2007">September
                                                                                2007</option>
                                                                            <option value="8/2007">August 2007
                                                                            </option>
                                                                            <option value="7/2007">July 2007
                                                                            </option>
                                                                            <option value="6/2007">June 2007
                                                                            </option>
                                                                            <option value="5/2007">May 2007
                                                                            </option>
                                                                            <option value="4/2007">April 2007
                                                                            </option>
                                                                            <option value="3/2007">March 2007
                                                                            </option>
                                                                            <option value="2/2007">February 2007
                                                                            </option>
                                                                            <option value="1/2007">January 2007
                                                                            </option>
                                                                            <option value="12/2006">December
                                                                                2006</option>
                                                                            <option value="11/2006">November
                                                                                2006</option>
                                                                            <option value="10/2006">October 2006
                                                                            </option>
                                                                            <option value="9/2006">September
                                                                                2006</option>
                                                                            <option value="8/2006">August 2006
                                                                            </option>
                                                                            <option value="7/2006">July 2006
                                                                            </option>
                                                                            <option value="6/2006">June 2006
                                                                            </option>
                                                                            <option value="5/2006">May 2006
                                                                            </option>
                                                                            <option value="4/2006">April 2006
                                                                            </option>
                                                                            <option value="3/2006">March 2006
                                                                            </option>
                                                                            <option value="2/2006">February 2006
                                                                            </option>
                                                                            <option value="1/2006">January 2006
                                                                            </option>
                                                                            <option value="12/2005">December
                                                                                2005</option>
                                                                            <option value="11/2005">November
                                                                                2005</option>
                                                                            <option value="10/2005">October 2005
                                                                            </option>
                                                                            <option value="9/2005">September
                                                                                2005</option>
                                                                            <option value="8/2005">August 2005
                                                                            </option>
                                                                            <option value="7/2005">July 2005
                                                                            </option>
                                                                            <option value="6/2005">June 2005
                                                                            </option>
                                                                            <option value="5/2005">May 2005
                                                                            </option>
                                                                            <option value="4/2005">April 2005
                                                                            </option>
                                                                            <option value="3/2005">March 2005
                                                                            </option>
                                                                            <option value="2/2005">February 2005
                                                                            </option>
                                                                            <option value="1/2005">January 2005
                                                                            </option>
                                                                            <option value="12/2004">December
                                                                                2004</option>
                                                                            <option value="11/2004">November
                                                                                2004</option>
                                                                            <option value="10/2004">October 2004
                                                                            </option>
                                                                            <option value="9/2004">September
                                                                                2004</option>
                                                                            <option value="8/2004">August 2004
                                                                            </option>
                                                                            <option value="7/2004">July 2004
                                                                            </option>
                                                                            <option value="6/2004">June 2004
                                                                            </option>
                                                                            <option value="5/2004">May 2004
                                                                            </option>
                                                                            <option value="4/2004">April 2004
                                                                            </option>
                                                                            <option value="3/2004">March 2004
                                                                            </option>
                                                                            <option value="2/2004">February 2004
                                                                            </option>
                                                                            <option value="1/2004">January 2004
                                                                            </option>
                                                                        </select>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td width="175" class="frmDescriptionBold">
                                                                    </td>
                                                                    <td align="right" class="frmInput">
                                                                        <input type="image"
                                                                            src="assets/images/btnSubmit.gif"
                                                                            name="submit" value="submit" align="middle"
                                                                            alt="Submit">
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </form>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <table width="500" border="0" cellspacing="0" cellpadding="0">
                        <tbody>
                            <tr>
                                <td><img src="assets/images/clear.gif" width="1" height="5"></td>
                            </tr>
                        </tbody>
                    </table>

                </td>
            </tr>
        </tbody>
    </table>

    <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tbody>
            <tr>
                <td height="25"></td>
            </tr>
        </tbody>
    </table>
@endsection
