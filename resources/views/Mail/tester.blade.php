<h1>
<ul>
@foreach ($summary as $detail )
<li>
    {{$detail['email']}}
</li>
@endforeach
</ul>

</h1>