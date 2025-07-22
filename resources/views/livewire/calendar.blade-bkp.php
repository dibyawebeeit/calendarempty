<div>
    <style>
    .calender-main{ }
    .calender-main button{ border:0; background: none; text-decoration: underline; color: rgb(51, 102, 153); }
    .calendarsmal{ text-align:left;}
    .calendarsmal span{ 
      background: #6699CC;
  
      display: inline-block;
      line-height: 17px;
      padding: 0 2px;}
    .text-blue-500{ text-align:center; display: block;}
    @media print {
    body * {
        visibility: hidden;
    }
    #calendarToPrint, #calendarToPrint * {
        visibility: visible;
    }
    #calendarToPrint {
        position: absolute;
        left: 0;
        top: 0;
    }
}
  </style>
      

      @if ($viewBy == 1)
        {{-- Month (Printer Friendly) --}}
        <table width="100%" border="0">
            <tr>
                <td>
                    <b>{{ strtoupper(Carbon\Carbon::create($currentYear, $currentMonth)->format('F Y')) }}</b>
                </td>
                <td align="right" colspan="3" height="20"><span class="cp">
                    <a href="javascript:void(0)" onclick="printDiv('printable-month')"><img src="{{asset('assets/images/btnPrint.gif')}}" border="0"></a>
                    &nbsp;&nbsp;
                 </span></td>
                <td align="right">
                    <a href="#" wire:click="previousMonth"><font color="#336699">&lt;&lt; Previous Month</font></a> |
                    <a href="#" wire:click="nextMonth"><font color="#336699">Next Month &gt;&gt;</font></a>
                </td>
            </tr>
          </table>
    
        <br>
    
        <div id="printable-month">
        @forelse($events as $date => $dayEvents)
            <table width="100%" border="0" cellspacing="1" cellpadding="0" bgcolor="#FFFFFF" style="margin-bottom: 20px;">
                <tr>
                    <td bgcolor="#AECAEB" height="20">
                        <div class="cp">
                            <img src="{{ asset('images/clear.gif') }}" width="10" height="9">
                            - {{ \Carbon\Carbon::parse($date)->format('j M (l)') }}
                        </div>
                    </td>
                </tr>
                <tr bgcolor="#D6E0EE">
                    <td>
                        <blockquote>
                            @foreach($dayEvents as $event)
                                <p>
                                    <span class="tpc">
                                        <br>
                                        <a href="{{ route('event.show', $event['id']) }}"><u>{{ $event['time'] }}</u></a>
                                        -
                                        <a href="{{ route('event.show', $event['id']) }}" class="linkevent">{{ $event['title'] }}</a>
                                        <br>
                                        <span class="cp">
                                            @if(isset($event['client']))<b>Client:</b> {{ $event['client'] }}<br>@endif
                                            @if(isset($event['assigned_to']))<b>Assigned To:</b> {{ $event['assigned_to'] }}<br>@endif
                                            <b>Ends:</b> {{ $event['end'] }}
                                        </span>
                                    </span>
                                </p>
                            @endforeach
                        </blockquote>
                    </td>
                </tr>
            </table>
        @empty
            <p>No events found for this month.</p>
        @endforelse
        </div>

      @elseif($viewBy == 2)
            {{-- Week View  --}}
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr class="cp">
                    <td align="right" colspan="3" height="30">
                        <a href="javascript:void(0)" onclick="printDiv('printable-week')"><img src="{{asset('assets/images/btnPrint.gif')}}" border="0"></a>
                        
                    </td>
                </tr>
                <tr class="cp">
                    <td width="33%">
                        <a href="#" wire:click="previousWeek">
                            <font color="#336699">&lt;&lt; Previous Week</font>
                        </a>
                    </td>
                    <td width="33%" align="center">
                        <b>{{ strtoupper($currentDate->format('F Y')) }}</b>
                    </td>
                    <td width="33%" align="right">
                        <a href="#" wire:click="nextWeek">
                            <font color="#336699">Next Week &gt;&gt;</font>
                        </a>
                    </td>
                </tr>
            </table>
            
            <table id="printable-week" width="100%" border="1" cellspacing="0" cellpadding="0" bgcolor="#D6E0EE" bordercolor="#FFFFFF">
                <tr bgcolor="#AECAEB">
                    @foreach(['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'] as $day)
                        <td width="14%" height="22" class="cp" align="center">{{ $day }}</td>
                    @endforeach
                </tr>
                <tr>
                    @for($i = 0; $i < 7; $i++)
                        @php
                            $date = $currentDate->copy()->addDays($i);
                            $formatted = $date->format('Y-m-d');
                        @endphp
                        <td valign="top" height="164" class="calendarsmal">
                            <table width="100%" cellspacing="1" cellpadding="2" class="calendarsmal">
                                <tr>
                                    <td bgcolor="#6699CC">
                                        <div align="center" class="calendarsmal">
                                            <font size="-3" class="calendarsmal">{{ $date->format('j') }}</font>
                                        </div>
                                    </td>
                                    <td class="calendarsmal">&nbsp;</td>
                                </tr>
                                @if(!empty($events[$formatted]))
                                    @foreach($events[$formatted] as $event)
                                        <tr>
                                            <td>&nbsp;</td>
                                            <td valign="top" class="calendar">
                                                <a href="{{ route('event.show', $event['id']) }}">
                                                    <span class="calendarbold">{{ $event['time'] }}</span>
                                                </a><br>
                                                <span class="calendarbold">
                                                    <a href="{{ route('event.show', $event['id']) }}" class="linkevent">
                                                        {{ $event['title'] }}
                                                    </a><br>
                                                    @if($event['client'])
                                                        <span class="cp"><b>Client:</b> {{ $event['client'] }}</span><br>
                                                    @endif
                                                </span>
                                                <br>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                            </table>
                        </td>
                    @endfor
                </tr>
            </table>
            
      @else
          {{-- Month View --}}
          <!-- Navigation to previous and next month -->
        <table width="520" border="0" cellspacing="0" cellpadding="0" height="20" class="calender-main">
            <tbody>
                <tr class="cp">
                    <td width="33%">
                        <button wire:click="previousMonth" class="text-blue-600">&lt;&lt; Previous Month</button>
                    </td>
                    <td width="33%" align="center">
                        <b>{{ Carbon\Carbon::create($currentYear, $currentMonth, 1)->format('F Y') }}</b>
                    </td>
                    <td width="33%" align="right">
                        <button wire:click="nextMonth" class="text-blue-600">Next Month &gt;&gt;</button>
                    </td>
                </tr>
            </tbody>
        </table>

        <!-- Calendar Grid -->
        <table width="520" border="1" cellspacing="0" cellpadding="0" height="400" bgcolor="#D6E0EE" bordercolor="#FFFFFF">
            <tbody>
                <tr bgcolor="#AECAEB">
                    @foreach(['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'] as $day)
                        <td width="70" height="22" class="cp" align="center">{{ $day }}</td>
                    @endforeach
                </tr>
                <tr>
                    @php
                        // Get the first day of the month and the total number of days in the month
                        $firstDayOfMonth = Carbon\Carbon::create($currentYear, $currentMonth, 1);
                        $dayOfWeek = $firstDayOfMonth->dayOfWeek;
                        $totalDays = $daysInMonth;
                        $day = 1;
                    @endphp

                    <!-- Empty cells before the first day -->
                    @for($i = 0; $i < $dayOfWeek; $i++)
                        <td width="70" height="58">&nbsp;</td>
                    @endfor

                    <!-- Populate the calendar with the days of the month -->
                    @for($i = $dayOfWeek; $i < 7; $i++)
                        <td width="70" valign="top" height="58" class="calendarsmal">
                            <div align="center" class="calendarsmal">
                                <span>{{ $day }}</span>
                                
                                @if (!empty($events))
                                    <!-- Display events if there are any -->
                                    @php
                                        $formattedDate = Carbon\Carbon::create($currentYear, $currentMonth, $day)->format('Y-m-d');
                                    @endphp
                                    @if(isset($events[$formattedDate]))
                                        @foreach($events[$formattedDate] as $event)
                                            <div>
                                                <a href="{{ route('event.show', $event['id']) }}" class="text-blue-500">
                                                    {{ $event['time'] }} <br> {{ $event['title'] }}
                                                </a>
                                            </div>
                                        @endforeach
                                    @endif
                                @endif
                                
                            </div>
                        </td>
                        @php $day++; @endphp
                    @endfor
                </tr>

                <!-- Remaining rows of the calendar -->
                @while($day <= $totalDays)
                    <tr>
                        @for($i = 0; $i < 7; $i++)
                            @if($day <= $totalDays)
                                <td width="70" valign="top" height="58" class="calendarsmal">
                                    <div align="center" class="calendarsmal">
                                        <span>{{ $day }}</span>
                                        @php
                                            $formattedDate = Carbon\Carbon::create($currentYear, $currentMonth, $day)->format('Y-m-d');
                                        @endphp
                                                <!-- Display events if there are any -->
                                                @if(isset($events[$formattedDate]))
                                            @foreach($events[$formattedDate] as $event)
                                                <div class="child-event">
                                                    <a href="{{ route('event.show', $event['id']) }}" class="text-blue-500">
                                                        {{ $event['time'] }} <br> {{ $event['title'] }}
                                                    </a>
                                                </div>
                                            @endforeach
                                        @endif
                                    </div>
                                </td>
                                @php $day++; @endphp
                            @else
                                <td width="70" height="58">&nbsp;</td>
                            @endif
                        @endfor
                    </tr>
                @endwhile
            </tbody>
        </table>

        <table width="520" border="0" cellspacing="0" cellpadding="0" height="20" class="calender-main">
            <tbody>
                <tr class="cp">
                    <td width="33%">
                        <button wire:click="previousMonth" class="text-blue-600">&lt;&lt; Previous Month</button>
                    </td>
                    <td width="33%" align="center">
                        <b>{{ Carbon\Carbon::create($currentYear, $currentMonth, 1)->format('F Y') }}</b>
                    </td>
                    <td width="33%" align="right">
                        <button wire:click="nextMonth" class="text-blue-600">Next Month &gt;&gt;</button>
                    </td>
                </tr>
            </tbody>
        </table>
      @endif

      
      <script>
        function printDiv(divId) {
            const divContents = document.getElementById(divId).innerHTML;
            const printWindow = window.open('', '', 'height=600,width=800');
            
            printWindow.document.write('<html><head><title>Print</title>');
            printWindow.document.write('<style>@media print { body { font-family: Arial; } }</style>');
            printWindow.document.write('</head><body>');
            printWindow.document.write(divContents);
            printWindow.document.write('</body></html>');
            
            printWindow.document.close(); // required for IE
            printWindow.focus(); // required for IE
            
            setTimeout(function () {
                printWindow.print();
                printWindow.close();
            }, 500);
        }
      </script>

  </div>
  