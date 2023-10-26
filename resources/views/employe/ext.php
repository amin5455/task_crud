 <!-- @foreach($employe as $item)
    <tr>
      <td>{{ $loop->iteration }}</td>
      <td>{{ $item->name }}</td>
      <td>{{ $item->email }}</td>
      <td>{{ $item->address }}</td>
      <td>{{ $item->mobile }}</td>
      <td>
        <a href="{{ url('/employe/' . $item->id) }}" class="btn btn-info">veiw</a>
        <a href="{{ url('/employe/' . $item->id . '/edit') }}" class="btn btn-secondary">Edit</a>
        <form method="POST" action="{{ url('/employe' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
        {{ method_field('DELETE') }}
        {{ csrf_field() }}
        <button type="submit" class="btn btn-danger" onclick="return confirm(&quot; Confirm delete?&quot;)">Delete</button> 

      </form>
      </td>

    </tr>-->