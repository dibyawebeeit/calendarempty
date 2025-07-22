@extends('dashboard::layouts.master')
@section('title', 'Event Calendar')

@section('content')
    <table width="100%" border="0" cellspacing="0" cellpadding="0" height="34">
        <tbody>
            <tr>
                <td valign="top" width="27"><img src="{{ asset('assets/images/cornerSmall.jpg') }}" width="25"
                        height="30">
                </td>
                <td colspan="2" width="439">
                    <table width="97%" border="0" cellspacing="0" cellpadding="0"
                        background="{{ asset('assets/images/blueBarTab.jpg') }}">
                        <tbody>
                            <tr>
                                <td height="12" width="67%">
                                    <div align="left"><img src="{{ asset('assets/images/blueBarStart.jpg') }}"
                                            width="36" height="15"><img
                                            src="{{ asset('assets/images/eventsCalHdr.jpg') }}"></div>
                                </td>
                                <td height="12" width="33%" align="right"><img
                                        src="{{ asset('assets/images/blueBarTail.jpg') }}" width="144" height="15">
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
        </tbody>
    </table>

    <livewire:calendar />

    {{-- <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
            <td><img src="{{ asset('assets/images/clear.gif') }}" width="1" height="50"></td>
        </tr>
    </table>
    <table width="520" border="0" cellspacing="0" cellpadding="0" height="20">
        <tbody>
            <tr class="cp">
                <td width="33%">
                    <a href="eventsNav.php?month=2&amp;year=2025" target="leftFrame" onclick="javascript:previous.submit()">
                        <font color="#336699">&lt;&lt; Previous Month</font>
                    </a>
                </td>
                <td width="33%" align="center">
                    <b>MARCH 2025</b>
                </td>
                <td width="33%" align="right">
                    <a href="eventsNav.php?month=4&amp;year=2025" target="leftFrame" onclick="javascript:next.submit()">
                        <font color="#336699">Next Month &gt;&gt;</font>
                    </a>
                </td>
            </tr>
        </tbody>
    </table>
    <table width="520" border="1" cellspacing="0" cellpadding="0" height="400" bgcolor="#D6E0EE"
        bordercolor="#FFFFFF">
        <tbody>
            <tr bgcolor="#AECAEB">
                <td width="70" height="22" class="cp" align="center">Sun</td>
                <td width="70" height="22" class="cp" align="center">Mon</td>
                <td width="70" height="22" class="cp" align="center">Tue</td>
                <td width="70" height="22" class="cp" align="center">Wed</td>
                <td width="70" height="22" class="cp" align="center">Thu</td>
                <td width="70" height="22" class="cp" align="center">Fri</td>
                <td width="70" height="22" class="cp" align="center">Sat</td>
            </tr>
            <tr>
                <td width="70" valign="top" height="58">&nbsp; </td>
                <td width="70" valign="top" height="58">&nbsp; </td>
                <td width="70" valign="top" height="58">&nbsp; </td>
                <td width="70" valign="top" height="58">&nbsp; </td>
                <td width="70" valign="top" height="58">&nbsp; </td>
                <td width="70" valign="top" height="58">&nbsp; </td>

                <td width="70" height="58" valign="top" class="calendarsmal">
                    <table width="70" border="0" cellspacing="1" cellpadding="0" height="14"
                        class="calendarsmal">
                        <tbody>
                            <tr>
                                <td width="10" height="8" bgcolor="#6699CC">
                                    <div align="center" class="calendarsmal">
                                        <font size="-3" class="calendarsmal">1</font>
                                    </div>
                                </td>
                                <td width="66" height="8" class="calendarsmal">&nbsp;</td>
                            </tr>
                        </tbody>
                    </table>
                </td>

            </tr>

            <tr>

                <td width="70" height="58" valign="top" class="calendarsmal">
                    <table width="70" border="0" cellspacing="1" cellpadding="0" height="14"
                        class="calendarsmal">
                        <tbody>
                            <tr>
                                <td width="10" height="8" bgcolor="#6699CC">
                                    <div align="center" class="calendarsmal">
                                        <font size="-3" class="calendarsmal">2</font>
                                    </div>
                                </td>
                                <td width="66" height="8" class="calendarsmal">&nbsp;</td>
                            </tr>
                        </tbody>
                    </table>
                </td>

                <td width="70" height="58" valign="top" class="calendarsmal">
                    <table width="70" border="0" cellspacing="1" cellpadding="0" height="14"
                        class="calendarsmal">
                        <tbody>
                            <tr>
                                <td width="10" height="8" bgcolor="#6699CC">
                                    <div align="center" class="calendarsmal">
                                        <font size="-3" class="calendarsmal">3</font>
                                    </div>
                                </td>
                                <td width="66" height="8" class="calendarsmal">&nbsp;</td>
                            </tr>
                        </tbody>
                    </table>
                </td>

                <td width="70" height="58" valign="top" class="calendarsmal">
                    <table width="70" border="0" cellspacing="1" cellpadding="0" height="14"
                        class="calendarsmal">
                        <tbody>
                            <tr>
                                <td width="10" height="8" bgcolor="#6699CC">
                                    <div align="center" class="calendarsmal">
                                        <font size="-3" class="calendarsmal">4</font>
                                    </div>
                                </td>
                                <td width="66" height="8" class="calendarsmal">&nbsp;</td>
                            </tr>
                        </tbody>
                    </table>
                </td>

                <td width="70" height="58" valign="top" class="calendarsmal">
                    <table width="70" border="0" cellspacing="1" cellpadding="0" height="14"
                        class="calendarsmal">
                        <tbody>
                            <tr>
                                <td width="10" height="8" bgcolor="#6699CC">
                                    <div align="center" class="calendarsmal">
                                        <font size="-3" class="calendarsmal">5</font>
                                    </div>
                                </td>
                                <td width="66" height="8" class="calendarsmal">&nbsp;</td>
                            </tr>
                        </tbody>
                    </table>
                </td>

                <td width="70" height="58" valign="top" class="calendarsmal">
                    <table width="70" border="0" cellspacing="1" cellpadding="0" height="14"
                        class="calendarsmal">
                        <tbody>
                            <tr>
                                <td width="10" height="8" bgcolor="#6699CC">
                                    <div align="center" class="calendarsmal">
                                        <font size="-3" class="calendarsmal">6</font>
                                    </div>
                                </td>
                                <td width="66" height="8" class="calendarsmal">&nbsp;</td>
                            </tr>
                        </tbody>
                    </table>
                </td>

                <td width="70" height="58" valign="top" class="calendarsmal">
                    <table width="70" border="0" cellspacing="1" cellpadding="0" height="14"
                        class="calendarsmal">
                        <tbody>
                            <tr>
                                <td width="10" height="8" bgcolor="#6699CC">
                                    <div align="center" class="calendarsmal">
                                        <font size="-3" class="calendarsmal">7</font>
                                    </div>
                                </td>
                                <td width="66" height="8" class="calendarsmal">&nbsp;</td>
                            </tr>
                        </tbody>
                    </table>
                </td>

                <td width="70" height="58" valign="top" class="calendarsmal">
                    <table width="70" border="0" cellspacing="1" cellpadding="0" height="14"
                        class="calendarsmal">
                        <tbody>
                            <tr>
                                <td width="10" height="8" bgcolor="#6699CC">
                                    <div align="center" class="calendarsmal">
                                        <font size="-3" class="calendarsmal">8</font>
                                    </div>
                                </td>
                                <td width="66" height="8" class="calendarsmal">&nbsp;</td>
                            </tr>
                        </tbody>
                    </table>
                </td>

            </tr>

            <tr>

                <td width="70" height="58" valign="top" class="calendarsmal">
                    <table width="70" border="0" cellspacing="1" cellpadding="0" height="14"
                        class="calendarsmal">
                        <tbody>
                            <tr>
                                <td width="10" height="8" bgcolor="#6699CC">
                                    <div align="center" class="calendarsmal">
                                        <font size="-3" class="calendarsmal">9</font>
                                    </div>
                                </td>
                                <td width="66" height="8" class="calendarsmal">&nbsp;</td>
                            </tr>
                        </tbody>
                    </table>
                </td>

                <td width="70" height="58" valign="top" class="calendarsmal">
                    <table width="70" border="0" cellspacing="1" cellpadding="0" height="14"
                        class="calendarsmal">
                        <tbody>
                            <tr>
                                <td width="10" height="8" bgcolor="#6699CC">
                                    <div align="center" class="calendarsmal">
                                        <font size="-3" class="calendarsmal">10</font>
                                    </div>
                                </td>
                                <td width="66" height="8" class="calendarsmal">&nbsp;</td>
                            </tr>
                        </tbody>
                    </table>
                </td>

                <td width="70" height="58" valign="top" class="calendarsmal">
                    <table width="70" border="0" cellspacing="1" cellpadding="0" height="14"
                        class="calendarsmal">
                        <tbody>
                            <tr>
                                <td width="10" height="8" bgcolor="#6699CC">
                                    <div align="center" class="calendarsmal">
                                        <font size="-3" class="calendarsmal">11</font>
                                    </div>
                                </td>
                                <td width="66" height="8" class="calendarsmal">&nbsp;</td>
                            </tr>
                        </tbody>
                    </table>
                </td>

                <td width="70" height="58" valign="top" class="calendarsmal">
                    <table width="70" border="0" cellspacing="1" cellpadding="0" height="14"
                        class="calendarsmal">
                        <tbody>
                            <tr>
                                <td width="10" height="8" bgcolor="#6699CC">
                                    <div align="center" class="calendarsmal">
                                        <font size="-3" class="calendarsmal">12</font>
                                    </div>
                                </td>
                                <td width="66" height="8" class="calendarsmal">&nbsp;</td>
                            </tr>
                        </tbody>
                    </table>
                </td>

                <td width="70" height="58" valign="top" class="calendarsmal">
                    <table width="70" border="0" cellspacing="1" cellpadding="0" height="14"
                        class="calendarsmal">
                        <tbody>
                            <tr>
                                <td width="10" height="8" bgcolor="#6699CC">
                                    <div align="center" class="calendarsmal">
                                        <font size="-3" class="calendarsmal">13</font>
                                    </div>
                                </td>
                                <td width="66" height="8" class="calendarsmal">&nbsp;</td>
                            </tr>
                        </tbody>
                    </table>
                </td>

                <td width="70" height="58" valign="top" class="calendarsmal">
                    <table width="70" border="0" cellspacing="1" cellpadding="0" height="14"
                        class="calendarsmal">
                        <tbody>
                            <tr>
                                <td width="10" height="8" bgcolor="#6699CC">
                                    <div align="center" class="calendarsmal">
                                        <font size="-3" class="calendarsmal">14</font>
                                    </div>
                                </td>
                                <td width="66" height="8" class="calendarsmal">&nbsp;</td>
                            </tr>
                        </tbody>
                    </table>
                </td>

                <td width="70" height="58" valign="top" class="calendarsmal">
                    <table width="70" border="0" cellspacing="1" cellpadding="0" height="14"
                        class="calendarsmal">
                        <tbody>
                            <tr>
                                <td width="10" height="8" bgcolor="#6699CC">
                                    <div align="center" class="calendarsmal">
                                        <font size="-3" class="calendarsmal">15</font>
                                    </div>
                                </td>
                                <td width="66" height="8" class="calendarsmal">&nbsp;</td>
                            </tr>
                        </tbody>
                    </table>
                </td>

            </tr>

            <tr>

                <td width="70" height="58" valign="top" class="calendarsmal">
                    <table width="70" border="0" cellspacing="1" cellpadding="0" height="14"
                        class="calendarsmal">
                        <tbody>
                            <tr>
                                <td width="10" height="8" bgcolor="#6699CC">
                                    <div align="center" class="calendarsmal">
                                        <font size="-3" class="calendarsmal">16</font>
                                    </div>
                                </td>
                                <td width="66" height="8" class="calendarsmal">&nbsp;</td>
                            </tr>
                        </tbody>
                    </table>
                </td>

                <td width="70" height="58" valign="top" class="calendarsmal">
                    <table width="70" border="0" cellspacing="1" cellpadding="0" height="14"
                        class="calendarsmal">
                        <tbody>
                            <tr>
                                <td width="10" height="8" bgcolor="#6699CC">
                                    <div align="center" class="calendarsmal">
                                        <font size="-3" class="calendarsmal">17</font>
                                    </div>
                                </td>
                                <td width="66" height="8" class="calendarsmal">&nbsp;</td>
                            </tr>
                        </tbody>
                    </table>
                </td>

                <td width="70" height="58" valign="top" class="calendarsmal">
                    <table width="70" border="0" cellspacing="1" cellpadding="0" height="14"
                        class="calendarsmal">
                        <tbody>
                            <tr>
                                <td width="10" height="8" bgcolor="#6699CC">
                                    <div align="center" class="calendarsmal">
                                        <font size="-3" class="calendarsmal">18</font>
                                    </div>
                                </td>
                                <td width="66" height="8" class="calendarsmal">&nbsp;</td>
                            </tr>
                        </tbody>
                    </table>
                </td>

                <td width="70" height="58" valign="top" class="calendarsmal">
                    <table width="70" border="0" cellspacing="1" cellpadding="0" height="14"
                        class="calendarsmal">
                        <tbody>
                            <tr>
                                <td width="10" height="8" bgcolor="#6699CC">
                                    <div align="center" class="calendarsmal">
                                        <font size="-3" class="calendarsmal">19</font>
                                    </div>
                                </td>
                                <td width="66" height="8" class="calendarsmal">&nbsp;</td>
                            </tr>
                        </tbody>
                    </table>
                </td>

                <td width="70" height="58" valign="top" class="calendarsmal">
                    <table width="70" border="0" cellspacing="1" cellpadding="0" height="14"
                        class="calendarsmal">
                        <tbody>
                            <tr>
                                <td width="10" height="8" bgcolor="#6699CC">
                                    <div align="center" class="calendarsmal">
                                        <font size="-3" class="calendarsmal">20</font>
                                    </div>
                                </td>
                                <td width="66" height="8" class="calendarsmal">&nbsp;</td>
                            </tr>
                        </tbody>
                    </table>
                </td>

                <td width="70" height="58" valign="top" class="calendarsmal">
                    <table width="70" border="0" cellspacing="1" cellpadding="0" height="14"
                        class="calendarsmal">
                        <tbody>
                            <tr>
                                <td width="10" height="8" bgcolor="#6699CC">
                                    <div align="center" class="calendarsmal">
                                        <font size="-3" class="calendarsmal">21</font>
                                    </div>
                                </td>
                                <td width="66" height="8" class="calendarsmal">&nbsp;</td>
                            </tr>
                        </tbody>
                    </table>
                </td>

                <td width="70" height="58" valign="top" class="calendarsmal">
                    <table width="70" border="0" cellspacing="1" cellpadding="0" height="14"
                        class="calendarsmal">
                        <tbody>
                            <tr>
                                <td width="10" height="8" bgcolor="#6699CC">
                                    <div align="center" class="calendarsmal">
                                        <font size="-3" class="calendarsmal">22</font>
                                    </div>
                                </td>
                                <td width="66" height="8" class="calendarsmal">&nbsp;</td>
                            </tr>
                        </tbody>
                    </table>
                </td>

            </tr>

            <tr>

                <td width="70" height="58" valign="top" class="calendarsmal">
                    <table width="70" border="0" cellspacing="1" cellpadding="0" height="14"
                        class="calendarsmal">
                        <tbody>
                            <tr>
                                <td width="10" height="8" bgcolor="#6699CC">
                                    <div align="center" class="calendarsmal">
                                        <font size="-3" class="calendarsmal">23</font>
                                    </div>
                                </td>
                                <td width="66" height="8" class="calendarsmal">&nbsp;</td>
                            </tr>
                        </tbody>
                    </table>
                </td>

                <td width="70" height="58" valign="top" class="calendarsmal">
                    <table width="70" border="0" cellspacing="1" cellpadding="0" height="14"
                        class="calendarsmal">
                        <tbody>
                            <tr>
                                <td width="10" height="8" bgcolor="#6699CC">
                                    <div align="center" class="calendarsmal">
                                        <font size="-3" class="calendarsmal">24</font>
                                    </div>
                                </td>
                                <td width="66" height="8" class="calendarsmal">&nbsp;</td>
                            </tr>
                        </tbody>
                    </table>
                </td>

                <td width="70" height="58" valign="top" class="calendarsmal">
                    <table width="70" border="0" cellspacing="1" cellpadding="0" height="14"
                        class="calendarsmal">
                        <tbody>
                            <tr>
                                <td width="10" height="8" bgcolor="#6699CC">
                                    <div align="center" class="calendarsmal">
                                        <font size="-3" class="calendarsmal">25</font>
                                    </div>
                                </td>
                                <td width="66" height="8" class="calendarsmal">&nbsp;</td>
                            </tr>
                        </tbody>
                    </table>
                </td>

                <td width="70" height="58" valign="top" class="calendarsmal">
                    <table width="70" border="0" cellspacing="1" cellpadding="0" height="14"
                        class="calendarsmal">
                        <tbody>
                            <tr>
                                <td width="10" height="8" bgcolor="#6699CC">
                                    <div align="center" class="calendarsmal">
                                        <font size="-3" class="calendarsmal">26</font>
                                    </div>
                                </td>
                                <td width="66" height="8" class="calendarsmal">&nbsp;</td>
                            </tr>
                        </tbody>
                    </table>
                </td>

                <td width="70" height="58" valign="top" class="calendarsmal">
                    <table width="70" border="0" cellspacing="1" cellpadding="0" height="14"
                        class="calendarsmal">
                        <tbody>
                            <tr>
                                <td width="10" height="8" bgcolor="#6699CC">
                                    <div align="center" class="calendarsmal">
                                        <font size="-3" class="calendarsmal">27</font>
                                    </div>
                                </td>
                                <td width="66" height="8" class="calendarsmal">&nbsp;</td>
                            </tr>
                        </tbody>
                    </table>
                </td>

                <td width="70" height="58" valign="top" class="calendarsmal">
                    <table width="70" border="0" cellspacing="1" cellpadding="0" height="14"
                        class="calendarsmal">
                        <tbody>
                            <tr>
                                <td width="10" height="8" bgcolor="#6699CC">
                                    <div align="center" class="calendarsmal">
                                        <font size="-3" class="calendarsmal">28</font>
                                    </div>
                                </td>
                                <td width="66" height="8" class="calendarsmal">&nbsp;</td>
                            </tr>
                        </tbody>
                    </table>
                </td>

                <td width="70" height="58" valign="top" class="calendarsmal">
                    <table width="70" border="0" cellspacing="1" cellpadding="0" height="14"
                        class="calendarsmal">
                        <tbody>
                            <tr>
                                <td width="10" height="8" bgcolor="#6699CC">
                                    <div align="center" class="calendarsmal">
                                        <font size="-3" class="calendarsmal">29</font>
                                    </div>
                                </td>
                                <td width="66" height="8" class="calendarsmal">&nbsp;</td>
                            </tr>
                        </tbody>
                    </table>
                </td>

            </tr>

            <tr>

                <td width="70" height="58" valign="top" class="calendarsmal">
                    <table width="70" border="0" cellspacing="1" cellpadding="0" height="14"
                        class="calendarsmal">
                        <tbody>
                            <tr>
                                <td width="10" height="8" bgcolor="#6699CC">
                                    <div align="center" class="calendarsmal">
                                        <font size="-3" class="calendarsmal">30</font>
                                    </div>
                                </td>
                                <td width="66" height="8" class="calendarsmal">&nbsp;</td>
                            </tr>
                        </tbody>
                    </table>
                </td>

                <td width="70" height="58" valign="top" class="calendarsmal">
                    <table width="70" border="0" cellspacing="1" cellpadding="0" height="14"
                        class="calendarsmal">
                        <tbody>
                            <tr>
                                <td width="10" height="8" bgcolor="#6699CC">
                                    <div align="center" class="calendarsmal">
                                        <font size="-3" class="calendarsmal">31</font>
                                    </div>
                                </td>
                                <td width="66" height="8" class="calendarsmal">&nbsp;</td>
                            </tr>
                            <tr>
                                <td width="10" height="31">&nbsp;</td>
                                <td width="66" height="31" valign="top" class="calendar"><a
                                        href="eventDetails.php?id=638">
                                        <span class="calendarbold">11:00 am</span></a><br>
                                    <span class="calendarbold"><a href="eventDetails.php?id=638" class="linkevent">Cesar
                                            Chavez Day<br>

                                            <br></a></span>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </td>

                <td width="70" valign="top" height="58">&nbsp; </td>

                <td width="70" valign="top" height="58">&nbsp; </td>

                <td width="70" valign="top" height="58">&nbsp; </td>

                <td width="70" valign="top" height="58">&nbsp; </td>

                <td width="70" valign="top" height="58">&nbsp; </td>

            </tr>
        </tbody>
    </table>

    <table width="520" border="0" cellspacing="0" cellpadding="0" height="20">
        <tbody>
            <tr class="cp">
                <td width="33%">
                    <a href="eventsNav.php?month=2&amp;year=2025" target="leftFrame"
                        onclick="javascript:previous.submit()">
                        <font color="#336699">&lt;&lt; Previous Month</font>
                    </a>
                </td>
                <td width="33%" align="center">
                    <b>MARCH 2025</b>
                </td>
                <td width="33%" align="right">
                    <a href="eventsNav.php?month=4&amp;year=2025" target="leftFrame" onclick="javascript:next.submit()">
                        <font color="#336699">Next Month &gt;&gt;</font>
                    </a>
                </td>
            </tr>
        </tbody>
    </table>

    <form action="" method="get" name="previous">
        <input type="hidden" name="month" value="2">
        <input type="hidden" name="year" value="2025">
        <input type="hidden" name="today" value="0">
    </form>
    <form action="" method="get" name="next">
        <input type="hidden" name="month" value="4">
        <input type="hidden" name="year" value="2025">
        <input type="hidden" name="today" value="0">
    </form>

    <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
            <td height="25"></td>
        </tr>
    </table> --}}
@endsection
