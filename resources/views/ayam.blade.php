<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
</head>

<body>

@foreach($return as $idoc_cat => $doc_cat)
<h2>{{$idoc_cat}}</h2>
    @foreach($doc_cat as $idoc_field=>$doc_field)
        <table>
        @foreach($doc_field as $isub_doc_field => $sub_doc_field)
            @if($isub_doc_field === 'header')
                <thead>
                    <tr>
                        @foreach($sub_doc_field as $ival=>$val)
                            <th>{{$val}}</th>
                        @endforeach
                    </tr>
                </thead>
            @else
                <tbody>
                    <tr>
                        @foreach($sub_doc_field as $ival=>$val)
                            <td>{{$val}}</td>
                        @endforeach
                    </tr>
                </tbody>
            @endif
        @endforeach
        </table>
    @endforeach
@endforeach
</body>

</html>
