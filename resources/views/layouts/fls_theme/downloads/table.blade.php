<table class="table table-sm table-borderless text-start align-middle mb-0">
  @foreach($files as $file)
    <tr>
      <th class="db-font-montbold blue-fls">
        <a href="{{ route('frontend.downloads.download', [$file->id]) }}" target="_blank">{{ $file->name }}</a>
      </th>
      <td class="text-end db-font-heebo">
        @if(Theme::getSetting('download_counts') && $file->download_count > 0)
          {{ $file->download_count.' '.trans_choice('common.download', $file->download_count) }}
        @endif
      </td>
    </tr>
    @if($file->description)
      <tr>
        <td class="db-font-heebo" colspan="2">&bull; {{ $file->description }}</td>
      </tr>
    @endif
  @endforeach
</table>