<table>
  @foreach($pireps as $p)
    <tr>
      <td style="padding-right: 10px;">
        <span class="title font-fls fw-bolder">{{ $p->ident }}</span>
      </td>
      <td>
        <a class="font-fls fw-bolder" href="{{route('frontend.airports.show', [$p->dpt_airport_id])}}">{{$p->dpt_airport_id}}</a>
        &nbsp;-&nbsp;
        <a class="font-fls fw-bolder" href="{{route('frontend.airports.show', [$p->arr_airport_id])}}">{{$p->arr_airport_id}}</a>
      </td>
      <td class="font-fls">
        {{ optional($p->aircraft)->ident }}
      </td>
    </tr>
  @endforeach
</table>
