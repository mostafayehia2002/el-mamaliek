
<x-mail::message>
    <div style="background-color: #f4f4f4; padding: 20px; font-family: Arial, sans-serif;">
        <h2 style="color: #333;">{{ ' طلب '. $type}}</h2>
        <p style="color: #666;"> <strong>{{ $user }}</strong> قام:</p>
        <p style="color: #666;">بشراء منتج <strong>{{ $product }}</strong> في انتظار الموافقة</p>
        <x-mail::button :url="$url">
         مشاهدة
        </x-mail::button>
            <p style="color: #888;"> شكرا علي استخدامك موقعنا مع تحياتي </p>
        <p style="color: #888;"> {{ config('app.name') }}</p>
    </div>
</x-mail::message>
