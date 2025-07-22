@extends('dashboard::layouts.master')
@section('title', 'View Event')

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
<table width="520" border="0" cellspacing="0" cellpadding="0">
    <tbody><tr align="left">
      <td valign="top" colspan="2">
        <table width="99%" border="0" cellspacing="0" cellpadding="0">
          <tbody><tr>
            <td width="1" height="6">&nbsp;</td>
            <td width="677" valign="top" height="6">
              <table width="506" border="0" cellspacing="0" cellpadding="0" height="27">
                <tbody><tr>
                  <td width="168" valign="bottom"><span class="cp">                	
                    <a href="javascript:history.back();"><img src="{{asset('assets/images/backToCalendar.gif')}}" width="121" height="22" border="0"></a></span></td>
                  <td width="110">&nbsp;</td>
                  <td align="right" colspan="3" height="30"><span class="cp">
                       <a href="javascript:void(0)" onclick="printDiv('printable-div')"><img src="{{asset('assets/images/btnPrint.gif')}}" border="0"></a>
                       &nbsp;&nbsp;
                    </span></td>
                </tr>
              </tbody></table>
            </td>
          </tr>
          <tr>
            <td width="1">&nbsp;</td>
            <td width="677" valign="top">
              <div align="center"></div>
              <table id="printable-div" width="99%" border="1" cellspacing="0" cellpadding="0" bgcolor="#D6E0EE" bordercolor="#FFFFFF">
                <tbody><tr>
                  <td height="20" bgcolor="#AECAEB">
                    <div align="left" class="cp"><img src="{{asset('assets/images/clear.gif')}}" width="10" height="9">{{$eventDetails['date']}}</div>
                  </td>
                </tr>
                <tr>
                  <td width="80%" valign="top">
                    <blockquote>
                      <p><span class="tpc"><br><u>{{$eventDetails['time']}}</u> - {{$eventDetails['title']}}</span><br>
                            <span class="cp">{{$eventDetails['description']}}<br>
                                <span class="cp"><b>Client:</b> {{$eventDetails['client']}}<br>
                                <span class="cp"><b>Assigned To:</b> {{$eventDetails['eventAssignUsers']}}<br>			
                                <span class="cp"><b>Ends:</b> {{$eventDetails['end_date']}}</span>
                            <br><br>							
                            @if (!empty($eventDetails['remindersArray']))
                                @foreach ($eventDetails['remindersArray'] as $key=> $reminder)
                                <table>
                                    <tbody>
                                        <tr>
                                            <td class="cp" valign="top" width="75"><b>Reminder {{$key+1}}:</b></td>
                                            <td class="cp">{{$reminder['daysPrior']}} day(s) prior ({{$reminder['reminderDate']}})
                                            <br><b>{{$reminder['reminderTitle']}}</b>
                                            <br>{{$reminder['reminderDesc']}}<br>
                                            Assigned To: {{$reminder['reminderAssignUsers']}}	</td>
                                        </tr>
                                    </tbody>
                                </table>
                                @endforeach
                            @endif
                            
                            <br>
                    </span></span></span></p></blockquote>
                    <table width="100%">
                        <tbody><tr align="right">
                          <td width="100%" valign="top" align="right">
                              <a href="{{route('event.edit',$eventDetails['eventId'])}}">
                                  <img src="{{asset('assets/images/btnEdit.gif')}}" border="0">
                              </a>
                          </td>
                          <td width="5">
                              <img src="{{asset('assets/images/clear.gif')}}" border="0" width="5">
                          </td>
                          <td width="100%" valign="top" align="right">
                            <form method="post" action="{{route('event.destroy',$eventDetails['eventId'])}}" id="delete_{{$eventDetails['eventId']}}">
                                {{ method_field('DELETE') }}
                                {{  csrf_field() }}
                                  <img src="{{asset('assets/images/btnDelete.gif')}}" border="0" onclick="deleteData({{$eventDetails['eventId']}})">
                            </form>
                          </td>
                          <td width="10">
                              <img src="{{asset('assets/images/clear.gif')}}" border="0" width="10">
                          </td>
                        </tr>
                    </tbody></table>
                  </td>
                </tr>
            </tbody></table>
              <div align="left"><span class="cp"></span></div>
            </td>
          </tr>
        </tbody></table>
      </td>
    </tr>
  </tbody></table>

  <script>

    function deleteData(id) {
      if (confirm("Are you sure you want to delete it?")) {
        document.getElementById("delete_" + id).submit();
      } else {
        return false;
      }
    }

    function printDiv(divId) {
        // Get all elements
        var originalContents = document.body.innerHTML;

        // Hide all other elements
        var printContents = document.getElementById(divId).innerHTML;
        
        document.body.innerHTML = printContents;

        // Trigger print
        window.print();

        // Restore the original content
        document.body.innerHTML = originalContents;
    }
</script>

@endsection