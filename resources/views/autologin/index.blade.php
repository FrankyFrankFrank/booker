@extends('layouts.app')

@section('content')

<table>
  <thead>
    <th>
      Username
    </th>
    <th>
      Email
    </th>
    <th>
      AutoLogin Url
    </th>
  </thead>
  <tbody>
    @foreach($autologins as $login)
      <tr>
        <td>
          {{ $login['name'] }}
        </td>
        <td>
          {{ $login['email'] }}
        </td>
        <td>
          {{ $login['link'] }}
        </td>
      </tr>
    @endforeach
  </tbody>
</table>

@endsection
