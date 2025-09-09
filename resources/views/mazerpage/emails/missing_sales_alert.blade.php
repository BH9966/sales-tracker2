<h3>Missing Sales Alert</h3>
<p>The following users did not submit sales today:</p>
<ul>
    @foreach ($missingSales as $item)
        <li>{{ $item['user']->name }} - Business: {{ $item['business']->name }}</li>
    @endforeach
</ul>
<p>Please follow up accordingly.</p>