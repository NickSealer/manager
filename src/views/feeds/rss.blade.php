@section('canonical', route('feeds.rss'))
@section('title', 'RSS')
@section('description', 'RSS Feeds')
@section('og-type', '')
@section('og-image', url('/'))

<rss version="2.0" xmlns:atom="http://www.w3.org/2005/Atom">
  <channel>
    @foreach ($items as $item)
    <item>
      <title>{{ $item->name }}</title>
      <category>{{ $item->name ? $item->name : $item->product_type }}</category>
      <Description> {{ $item->description }} </Description>
      <image>
        <url>{{ url('/').Storage::url($item->picture) }}</url>
        <title>{{ $item->slug }}</title>
        <link>{{ url('/') }}</link>
      </image>
      <pubDate>{{ date('D, d M Y H:i:s', strtotime($item->created_at)) }} GMT</pubDate>
      <link>{{ $item->category_id ? url('articles/'.$item->slug) : url('solutions/'.$item->product_type) }}</link>
      <atom:link href="{{ $item->category_id ? url('articles/'.$item->slug) : url('solutions/'.$item->product_type) }}" rel="self" type="application/rss+xml"/>
    </item>
    @endforeach
  </channel>
</rss>
