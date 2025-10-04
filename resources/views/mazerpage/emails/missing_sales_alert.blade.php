<h3>Missing Sales Alert</h3>
<p>The following users did not submit sales today:</p>
<ul>
    @forelse ($missingSales as $item)
    <li>{{ $item['user']->name }} — Business: {{ $item['business']->name }}</li>
@empty
    <li> All users recorded sales today.</li>
@endforelse
</ul>
<p>Please follow up accordingly.</p>