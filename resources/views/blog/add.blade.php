@foreach($admin as $admins)
        {{ $admins->category_id }}
        {{ $admins->title }}
        {{ $admins->body }}
        {{ $admins->file }}
        {{ $admins->reply }}
        <abbr title="{{ $admins->dateFormatted(true) }}">{{ $admins-> dateFormatted() }}</abbr>
@endforeach
